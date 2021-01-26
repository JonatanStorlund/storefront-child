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

//Hide Price Range for WooCommerce Variable Products
add_filter( 'woocommerce_variable_sale_price_html', 
'lw_variable_product_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 
'lw_variable_product_price', 10, 2 );

function lw_variable_product_price( $v_price, $v_product ) {

// Product Price
$prod_prices = array( $v_product->get_variation_price( 'min', true ), 
$v_product->get_variation_price( 'max', true ) );
$prod_price = $prod_prices[0]!==$prod_prices[1] ? sprintf(__('From: %1$s', 'woocommerce'), 
wc_price( $prod_prices[0] ) ) : wc_price( $prod_prices[0] );

// Regular Price
$regular_prices = array( $v_product->get_variation_regular_price( 'min', true ), 
$v_product->get_variation_regular_price( 'max', true ) );
sort( $regular_prices );
$regular_price = $regular_prices[0]!==$regular_prices[1] ? sprintf(__('From: %1$s','woocommerce')
, wc_price( $regular_prices[0] ) ) : wc_price( $regular_prices[0] );

if ( $prod_price !== $regular_price ) {
$prod_price = '<del>'.$regular_price.$v_product->get_price_suffix() . '</del> <ins>' . 
$prod_price . $v_product->get_price_suffix() . '</ins>';
}
return $prod_price;
}

//Hide “From:$X”
add_filter('woocommerce_get_price_html', 'lw_hide_variation_price', 10, 2);
function lw_hide_variation_price( $v_price, $v_product ) {
$v_product_types = array( 'variable');
if ( in_array ( $v_product->product_type, $v_product_types )) {
return '';
}
// return regular price
return $v_price;
}

add_filter( 'the_title', 'shorten_woo_product_title', 10, 2 );
function shorten_woo_product_title( $title, $id ) {
    if ( ! is_singular( array( 'product' ) ) && get_post_type( $id ) === 'product' ) {
        return wp_trim_words( $title, 4, '...' ); // change last number to the number of words you want
    } else {
        return $title;
    }
}

function winwar_add_product_excerpt_into_archive() {
    global $product;
    $smallKcal = get_field('small_portion_kcal', $product->ID);
    $smallProtein = get_field('small_portion_protein', $product->ID);
    $largeKcal = get_field('large_portion_kcal', $product->ID);
    $largeProtein = get_field('large_portion_protein', $product->ID);

      if ( $product->is_type( 'variable' ) ) {
        echo '<div class="macro-container">';
        echo '<div class="macro-container__box">';
        echo '<h4 class="macro-container__box-title">Kcal</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro">'. strstr($largeKcal, '.', true) . ' / ' . strstr($smallKcal, '.', true) .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '<div class="macro-container__box">';
        echo '<h4 class="macro-container__box-title">Protein</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro small-protein">'. strstr($largeProtein, '.', true) . ' / ' . strstr($smallProtein, '.', true) .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
   }

   add_action( 'woocommerce_after_shop_loop_item_title', 'winwar_add_product_excerpt_into_archive', 234 );

   add_filter( 'storefront_handheld_footer_bar_links', 'jk_remove_handheld_footer_links' );
        function jk_remove_handheld_footer_links( $links ) {
            unset( $links['search'] );

            return $links;
    }