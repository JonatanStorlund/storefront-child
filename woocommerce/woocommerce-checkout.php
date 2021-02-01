<?php
function hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is present.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}

	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it's present.
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}

	return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );


// Prefill info if logged in
add_action('woocommerce_checkout_process', function () {
  if (!is_user_logged_in() && $_POST['billing_email'] && $_POST['createaccount'] == 1) {
      $user = get_user_by('email', $_POST['billing_email']);
      if ($user) wp_set_current_user($user->ID);
  }
});

add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice' );
add_action('woocommerce_before_checkout_form', 'bbloomer_free_shipping_cart_notice');

  function bbloomer_free_shipping_cart_notice() {
    $min_amount = 60; //change this to your free shipping threshold
    $current = (WC()->cart->total - WC()->cart->shipping_total);

     if ( $current < $min_amount ) {
      $added_text = pll__('Get free shipping if you order ', 'sijomealprep-freeshipping-notice') . wc_price( $min_amount - $current ) . pll__(' more!', 'sijomealprep-freeshipping-notice');
      $return_to = wc_get_page_permalink( 'shop' );
      $notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), pll__('Continue Shopping', 'sijomealprep-freeshipping-notice'), $added_text );
      echo '<div class="free-shipping-notice-wrapper">';
      wc_print_notice( $notice, 'notice' );
      echo '</div>';
   }
  }

  // define the woocommerce_applied_coupon callback
function update_woocommerce_notice() {
  $min_amount = 60;
  $current = (WC()->cart->total - WC()->cart->shipping_total);
  ?>
  <script type="text/javascript">
    jQuery(function($) {
			$('.free-shipping-notice-wrapper .woocommerce-Price-amount').html(<?php echo $min_amount - $current ?> + ' €')
		});
  </script>
  <?php
};

// add the action
add_action( 'woocommerce_applied_coupon', 'update_woocommerce_notice', 10, 1 );

function disable_shipping_calc_on_cart( $show_shipping ) {
  if( is_cart() ) {
      return false;
  }
  return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

add_filter( 'woocommerce_checkout_fields', 'hide_local_pickup_method' );

function hide_local_pickup_method( $fields_pickup ) {
    // change below for the method
    $shipping_method_pickup ='local_pickup:7';
    // change below for the list of fields. Add (or delete) the field name you want (or don’t want) to use
    $hide_fields_pickup = array( 'billing_company', 'billing_country', 'billing_postcode', 'billing_address_1', 'billing_address_2' , 'billing_city', 'billing_state');

    $chosen_methods_pickup = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping_pickup = $chosen_methods_pickup[0];

    foreach($hide_fields_pickup as $field_pickup ) {
        if ($chosen_shipping_pickup == $shipping_method_pickup) {
            $fields_pickup['billing'][$field_pickup]['required'] = false;
            $fields_pickup['billing'][$field_pickup]['class'][] = 'hide_pickup';
        }
        $fields_pickup['billing'][$field_pickup]['class'][] = 'billing-dynamic_pickup';
    }
    return $fields_pickup;
}
// Local Pickup - hide fields
add_action( 'wp_head', 'local_pickup_fields', 999 );
function local_pickup_fields() {
    if (is_checkout()) :
    ?>
    <style>
        .hide_pickup {display: none!important;}
    </style>
    <script>
        jQuery( function( $ ) {
            if ( typeof woocommerce_params === 'undefined' ) {
                return false;
            }
            $('body').on('updated_checkout', function () {
            $('.billing-dynamic_pickup').toggleClass('hide_pickup', $('#shipping_method_0 [value="local_pickup:7"]').is(':selected') || $('#shipping_method_0 [value="local_pickup:12"]').is(':selected'));
            });
        });
    </script>
    <?php
    endif;
}

add_filter('woocommerce_update_order_review_fragments', 'websites_depot_order_fragments_split_shipping', 10, 1);

function websites_depot_order_fragments_split_shipping($order_fragments) {

	ob_start();
	websites_depot_woocommerce_order_review_shipping_split();
	$websites_depot_woocommerce_order_review_shipping_split = ob_get_clean();

	$order_fragments['.websites-depot-checkout-review-shipping-table'] = $websites_depot_woocommerce_order_review_shipping_split;

	return $order_fragments;

}

// We'll get the template that just has the shipping options that we need for the new table
function websites_depot_woocommerce_order_review_shipping_split( $deprecated = false ) {
	wc_get_template( 'shipping-order-review.php', array( 'checkout' => WC()->checkout() ) );
}


// Hook the new table in before the customer details - you can move this anywhere you'd like. Dropping the html into the checkout template files should work too.
add_action('woocommerce_checkout_before_customer_details', 'websites_depot_move_new_shipping_table', 5);

function websites_depot_move_new_shipping_table() {
	echo '<div class="shop_table websites-depot-checkout-review-shipping-table"></div>';
}
