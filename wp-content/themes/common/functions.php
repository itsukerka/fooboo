<?php
	//
	// COMMON FUNCTIONS 
	//

	require_once __DIR__ . '/inc/default_settings.php';
	
	function login_assets(){
		wp_enqueue_style("style-admin", $common_site->siteurl."/wp-content/themes/common/assets/css/admin.css");	
	}

	// Заменяем классическую смену количества товара
	function woocommerce_quantity_input($data = null) {
		global $product;
		if (!$data) {
			$defaults = array(
				'input_name'   => 'quantity',
				'input_value'   => '1',
				'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
				'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
				'step'         => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
				'style'         => apply_filters( 'woocommerce_quantity_style', 'float:left;', $product )
			);
		} else {
			$cart_item_key = $data['cart_item_key'];
			$defaults = array(
				'input_name'   => $data['input_name'],
				'input_value'   => $data['input_value'],
				'step'         => apply_filters( 'cw_woocommerce_quantity_input_step', '1', $product ),
				'max_value'     => apply_filters( 'cw_woocommerce_quantity_input_max', '', $product ),
				'min_value'     => apply_filters( 'cw_woocommerce_quantity_input_min', '', $product ),
				'style'         => apply_filters( 'cw_woocommerce_quantity_style', 'float:left;', $product )
			);
		}
		if ( ! empty( $defaults['min_value'] ) )
			
			$min = $defaults['min_value'];
		
		else $min = 1;
		
		
		
		if ( ! empty( $defaults['max_value'] ) )
			
			$max = $defaults['max_value'];
		
		else $max = 15;
		
		
		
		if ( ! empty( $defaults['step'] ) )
			
			$step = $defaults['step'];
		
		else $step = 1;
		
		$options = '';
		for ( $count = $min; $count <= $max; $count = $count+$step ) {
			$selected = $count === $defaults['input_value'] ? ' selected' : '';
			$options .= '<option value="' . $count . '"'.$selected.'>' . $count . '</option>';
		}
		echo '<div class="ui--product-select" data-id="'.$cart_item_key.'" data-attribute="quantity" style="' . $defaults['style'] . '">
				<label for="quantity">Amount: </label>
				<select id="quantity" name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product Description', 'woocommerce' ) . '" class="cw_qty select2-init">' . $options . '</select>
			</div>';
	}
	
	//Редактируем селекты вариаций продукта как нам надо
	add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'remove_start_option', 10, 2 );
	function remove_start_option( $html, $args ){
		// Удаляем пустую опцию
		$html = str_replace('<option value="">Выбрать опцию</option>', '', $html);
		$html = str_replace('class=""', 'class="select2-init" data-template="'.$args['attribute'].'_template"', $html);
		return $html;
	}
	
	 
	
	//
	// Обновление товара в корзине
	//
	
	add_action('wp_ajax_update_cart_item', 'update_cart_item');
	add_action('wp_ajax_nopriv_update_cart_item', 'update_cart_item');
	
	function update_cart_item(){
		if(isset($_POST['data'])){
			global $woocommerce;
			global $wp_query;
			global $post;
	
			$data = json_decode(str_replace('\\', '', $_POST['data']), false);
			if($data->attribute == 'quantity'){
				$woocommerce->cart->cart_contents[$data->id]['quantity'] = $data->value;
				$woocommerce->cart->set_quantity($data->id, intval($data->value));
			} else {
				$product_id = $woocommerce->cart->cart_contents[$data->id]['product_id'];
				$quantity = $woocommerce->cart->cart_contents[$data->id]['quantity'];
				$product = wc_get_product( $product_id );
				$variation_id = $woocommerce->cart->cart_contents[$data->id]['variation_id'];
				$_variation = $woocommerce->cart->cart_contents[$data->id]['variation'];
				$variation = [];
				foreach($_variation as $key => $value){
					$variation[end(explode('attribute_', $key))] = $value;
				}
				
				$variation[$data->attribute] = $data->value;
				$_variation['attribute_'.$data->attribute] = $data->value;
				
				$WC_Product_Data_Store_CPT = new WC_Product_Data_Store_CPT();
				$variation_id = $WC_Product_Data_Store_CPT->find_matching_product_variation( $product, $_variation );
				
				$woocommerce->cart->add_to_cart( $product_id, $quantity, $variation_id);
				$woocommerce->cart->remove_cart_item( $data->id );
				//$woocommerce->cart->cart_contents[$data->id]['variation']['attribute_'.$data->attribute] = $data->value;
				//$woocommerce->cart->set_session();
			}
			$wp_query = new WP_Query('pagename=cart&post_type=page');
			$post = $wp_query->posts[0];
			require( locate_template( 'templates/single/cart.php' ) );
			//get_template_part('templates/single/cart', get_post_format());
			exit;
		}
	}
	