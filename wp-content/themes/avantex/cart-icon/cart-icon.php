<?php
/**
 * Place a cart icon with the number of items and total cost in the menu bar.
 *
 * @package avantex
 */

if ( get_theme_mod( 'avantex-woo-cart-show' ) === 1 ) {
	add_filter( 'wp_nav_menu_items', 'avantex_menucart', 10, 2 );
}
function avantex_menucart( $menu, $args ) {
	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location.
	if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'avantex_active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location ) {
		return $menu;
	}
	ob_start();
		global $woocommerce;
		$viewing_cart        = __( 'View your shopping cart', 'avantex' );
		$start_shopping      = __( 'Start shopping', 'avantex' );
		$cart_url            = wc_get_cart_url();
		$shop_page_url       = get_permalink( wc_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents       = sprintf( _n( '%d item', '%d items', $cart_contents_count, 'avantex' ), $cart_contents_count );
		$cart_total          = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart.
		// if ( $cart_contents_count > 0 ) {.
	if ( $cart_contents_count == 0 ) {
		$avantex_menu_item = '<div class="menu-item shopping-cart"><a class="wcmenucart-contents cart-icon" href="' . $shop_page_url . '" title="' . $start_shopping . '">';
	} else {
		$avantex_menu_item = '<div class="menu-item shopping-cart"><a class="wcmenucart-contents cart-icon" href="' . $cart_url . '" title="' . $viewing_cart . '">';
	}
		$avantex_menu_item .= '<i class="fas fa-bag-shopping cart-icon-pos" aria-hidden="true"></i></a>';
	if ( $cart_contents_count > 0 ) {
		$avantex_menu_item .= '<a href="' . $cart_url . '" class="cart-total">' . $cart_contents_count . '</a>';
	}
			// $avantex_menu_item .= $cart_contents . ' - ' . $cart_total;
			$avantex_menu_item .= '</div>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart.
		// }.
		echo esc_html( $avantex_menu_item );
	$social = ob_get_clean();
	return $menu . $social;
}

