<?php
add_action( 'woocommerce_before_shop_loop', 'add_variations_in_shop_page' );

function add_variations_in_shop_page() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 30 );
}

add_action( 'wp', 'remove_default_sorting_storefront' );
  
function remove_default_sorting_storefront() {
   remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
}

add_filter('woocommerce_reset_variations_link', '__return_empty_string');
