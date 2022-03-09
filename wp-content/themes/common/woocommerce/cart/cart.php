<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
<div class="woocommerce--cart-wrapper">
	<div class="col-left">
		
			<?php do_action( 'woocommerce_before_cart_table' ); ?>
			
			<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<div class="wrapper">
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>
					<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$args = [
								'key' => $cart_item_key,
								'item' => $cart_item
							];
							get_template_part('templates/loop/product-cart', get_post_format(), $args);
						}
					?>
					
					<?php do_action( 'woocommerce_cart_contents' ); ?>
					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</div>
			</div>
			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		
	</div>
	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
	
	<div class="col-right">
		<div class="section">
			<div class="section-title lm-hide">
				<h2 class="label">Summary</h2>
			</div>
			<div class="section-content">
			<?php if ( wc_coupons_enabled() ) { ?>
			<div class="ui-input coupon">
				<label for="coupon_code"><?php esc_html_e( '', 'woocommerce' ); ?></label> 
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Your promocode', 'woocommerce' ); ?>" /> 
				<button type="submit" class="ui-button ui-button--1" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply', 'woocommerce' ); ?></button>
				<?php do_action( 'woocommerce_cart_coupon' ); ?>
			</div>
			<?php } ?>
			
			
			<?php
				/**
				* Cart collaterals hook.
				*
				* @hooked woocommerce_cross_sell_display
				* @hooked woocommerce_cart_totals - 10
				*/
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>
		</div>
		<button type="submit" class="hidden" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><span class="label"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></span></button>
		
		<?php do_action( 'woocommerce_cart_actions' ); ?>
		
		<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
	</div>
	
	<?php do_action( 'woocommerce_after_cart' ); ?>
</div>
</form>