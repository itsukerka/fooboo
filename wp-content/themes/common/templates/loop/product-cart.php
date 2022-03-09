<?php

	$cart_item_key = $args['key'];
	$cart_item = $args['item'];
	
	$_pf = new WC_Product_Factory();
	$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product = $_pf->get_product( $product_id );
	// Вариации товара
	$attributes = [];
	if ( $product->is_type( 'variable' ) ) {
		$attributes = $product->get_variation_attributes();
		$attribute_keys = array_keys( $attributes );
	}
	
	if ( $product && $product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $product->is_visible() ? $product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
?>
<div class="ui-product <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
	
	<div class="wrapper">
		<div class="col-left">
			<div class="product-thumbnail">
				<?php
					$thumbnail = '<div data-lazy="image" data-src="'.wp_get_attachment_image_url( $product->image_id, 'full' ).'"></div>';					
					if ( ! $product_permalink ) {
						echo $thumbnail; // PHPCS: XSS ok.
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
					}
				?>
			</div>
		</div>
		<div class="col-middle">
			<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
				<?php
					if ( ! $product_permalink ) {
						echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
					} else {
						echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $product->get_name() ), $cart_item, $cart_item_key ) );
					}
				?>
			</div>
			<div class="product-params">
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
				<?php ?>
				<div class="item">
					<div class="ui--product-select" data-id="<?php echo $cart_item_key;?>" data-attribute="<?php echo $attribute_name;?>">
						<label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label>
						<?php
							wc_dropdown_variation_attribute_options(
								array(
									'options'   => $options,
									'attribute' => $attribute_name,
									'product'   => $product,
									'selected' => $_product->attributes[$attribute_name]
								)
							);
						?>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="item">
					<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
							if ( $product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input(
									array(
										'cart_item_key' => $cart_item_key,
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $product->get_max_purchase_quantity(),
										'min_value'    => '0',
										'product_name' => $product->get_name(),
									),
									$product,
									false
								);
							}
							
							echo apply_filters( 'woocommerce_quantity_input', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
					</div>
				</div>
			</div>
			<div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
				<?php
					echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
				?>
			</div>
			<div class="l-mt-auto lm-hide"><div class="ui-button ui-button--2"><span class="icon"><span class="icon--favorite"></span></span></div></div>
		</div>
		<div class="col-right">
			<div class="product-remove">
				<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span class="icon--times"></span></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_html__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $product->get_sku() )
						),
						$cart_item_key
					);
				?>
			</div>
			<div class="l-mt-auto lm-show"><div class="ui-button ui-button--2"><span class="icon"><span class="icon--favorite"></span></span></div></div>
		</div>
	</div>

</div>
<?php
	}
?>