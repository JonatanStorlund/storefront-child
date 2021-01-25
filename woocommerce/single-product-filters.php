<?php
 function filter_woocommerce_short_description( $post_post_excerpt ) {
   if ( !is_shop() ) {
     global $product;

     $post_post_excerpt = "<div class='wp-block-pb-accordion-item c-accordion__item js-accordion-item' data-initially-open='false' data-click-to-close='true' data-auto-close='true' data-scroll='false' data-scroll-offset='0'>
     <h3 id='at-67843' class='c-accordion__title js-accordion-controller' role='button' tabindex='0' aria-controls='ac-67843' aria-expanded='false'>"
     . pll__('More Details', 'sijomealprep') .
     "</h3>
     <div id='ac-67843' class='c-accordion__content' hidden='hidden'>
     <p>
     . $product->short_description .
     </p>
     </div>
     </div>";
   }

  return $post_post_excerpt;
};

// add the filter
add_filter( 'woocommerce_short_description', 'filter_woocommerce_short_description', 10, 1 );


// Remove additional info tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

// Remove SKU
function sv_remove_product_page_skus( $enabled ) {
  if ( ! is_admin() && is_product() ) {
      return false;
  }

  return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

 function action_woocommerce_before_main_content() {
	$smallKcal = get_field('small_portion_kcal', $product->ID);
	$smallProtein = get_field('small_portion_protein', $product->ID);
	$largeKcal = get_field('large_portion_kcal', $product->ID);
  $largeProtein = get_field('large_portion_protein', $product->ID);

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
};

add_action( 'woocommerce_single_product_summary', 'action_woocommerce_before_main_content', 10, 2 );