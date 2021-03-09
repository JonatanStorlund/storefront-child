<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

add_action( 'init', 'woa_add_hero_image_init' );

function woa_add_hero_image_init () {

   add_action( 'storefront_before_content', 'woa_add_hero_image', 5 );

}

function woa_add_hero_image() {
   if ( is_front_page() ) :

      ?>
		<!-- hero banner -->
		<?php if (get_field('hero_title')) { ?>
		<a class="hero-link" href="<?php echo get_field('hero_link')['url'] ?>">
			<div class="hero-wrapper desktop" style="background-image: url(<?php echo get_field('hero_image')['url']?>)">
				<div class="hero-wrapper__left-box hero-wrapper__box desktop">
					<div>
						<h1 class="hero-wrapper__left-box-title"><?php echo get_field('hero_title') ?></h1>

                        <?php if(get_field('hero_offer')) {?>
                            <div class="hero-offer is-logged-in">
                                <h2>
                                    <?php echo get_field('hero_offer') ?>
                                </h2>
                                <p class="hero-offer-disclaimer">
                                    <?php echo get_field('hero_offer_disclaimer') ?>
                                </p>
                            </div>
						<?php } ?>

                        <div style="display: flex;">
						<?php if(get_field('hero_link')['url']) {?>
						    <a style="margin-right: 10px" class="button has-green-background-color" href="<?php echo get_field('hero_link')['url'] ?>" class="hero-wrapper__left-box-a"><?php echo get_field('hero_link')['title'] ?></a>
						<?php } ?>
                        <?php if(get_field('hero_link_two')['url']) {?>
						    <a class="button is-logged-in" href="<?php echo get_field('hero_link_two')['url'] ?>" class="hero-wrapper__left-box-a"><?php echo get_field('hero_link_two')['title'] ?></a>
						<?php } ?>
                        </div>
					</div>
				</div>
			</div>
        </a>

        <div class="hero-wrapper section-inner medium mobile alignfull">
            <h1 class="hero-wrapper__left-box-title"><?php echo get_field('hero_title') ?></h1>
            <?php if(get_field('hero_offer')) {?>
                <div class="hero-offer is-logged-in">
                    <h2>
                        <?php echo get_field('hero_offer') ?>
                    </h2>
                    <p class="hero-offer-disclaimer">
                        <?php echo get_field('hero_offer_disclaimer') ?>
                    </p>
                </div>
            <?php } ?>
            <?php if(get_field('hero_link')['url']) {?>
            <a class="button has-green-background-color" href="<?php echo get_field('hero_link')['url'] ?>" class="hero-wrapper__left-box-a"><?php echo get_field('hero_link')['title'] ?></a>
        <?php } ?>
        <?php if(get_field('hero_link_two')['url']) {?>
            <a class="button is-logged-in" href="<?php echo get_field('hero_link_two')['url'] ?>" class="hero-wrapper__left-box-a"><?php echo get_field('hero_link_two')['title'] ?></a>
        <?php } ?>
        </div>
		<?php
        }
   endif;

}

function add_custom_editor_colors() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Green', 'storefront-child' ),
            'slug' => 'green',
            'color' => '#399e5a',
        ),
        array(
            'name' => __( 'Blue', 'storefront-child' ),
            'slug' => 'blue',
            'color' => '#224870',
        ),
        array(
            'name' => __( 'White', 'storefront-child' ),
            'slug' => 'white',
            'color' => '#e7ecef',
        ),
        array(
            'name' => __( 'Black', 'storefront-child' ),
            'slug' => 'black',
            'color' => '#333333',
        ),
        array(
            'name' => __( 'Gray', 'storefront-child' ),
            'slug' => 'gray',
            'color' => '#6d6d6d',
        ),
    ) );
}

add_action( 'after_setup_theme', 'add_custom_editor_colors' );


function storefront_child_scripts() {
    wp_enqueue_script( 'main-script', get_stylesheet_directory_uri() . '/assets/scripts/main.js', array( 'jquery' ), rand(),true );
}

add_action( 'wp_enqueue_scripts', 'storefront_child_scripts' );


// Woocommerce polylang register strings start //
add_action('init', function() {
	pll_register_string(  'sijomealprep',  'Pickup from', 'sijomealprep');
	pll_register_string(  'sijomealprep',  'Pickup info', 'sijomealprep');
	pll_register_string(  'sijomealprep',  'Till menyn', 'sijomealprep');
	pll_register_string(  'sijomealprep',  '<p>Gratis frakt om du köper för ', 'sijomealprep');
	pll_register_string(  'sijomealprep',  ' mer!</p>', 'sijomealprep');
	pll_register_string( 'sijomealprep-postcode-checker', 'postkod checker title', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'postkod check button', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'we can offer homedelivery', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'sorry but you can pickup', 'sijomealprep-postcode-checker');
	pll_register_string( 'sijomealprep-postcode-checker', 'try again', 'sijomealprep-postcode-checker');
	pll_register_string('sijomealprep', 'Milkfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Glutenfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Eggfree', 'sijomealprep');
	pll_register_string('sijomealprep', 'Vegan', 'sijomealprep');
	pll_register_string('sijomealprep', 'Available', 'sijomealprep');
	pll_register_string('sijomealprep', 'Sold Out', 'sijomealprep');
	pll_register_string('sijomealprep', 'Select options', 'woocommerce');
	pll_register_string('sijomealprep', 'More Details', 'woocommerce');
	pll_register_string('sijomealprep', 'Get free shipping if you order ', 'sijomealprep-freeshipping-notice');
	pll_register_string('sijomealprep', ' more!', 'sijomealprep-freeshipping-notice');
	pll_register_string('sijomealprep', 'Continue Shopping', 'sijomealprep-freeshipping-notice');
	pll_register_string('sijomealprep', 'Proceed to pay', 'woocommerce-checkout');
	pll_register_string('sijomealprep', 'Register', 'sijomealprep');
	pll_register_string('sijomealprep', 'No account?', 'sijomealprep');
	pll_register_string('sijomealprep', 'Select Size', 'sijomealprep');
	pll_register_string('sijomealprep', 'Already have an account?', 'sijomealprep');
	pll_register_string('sijomealprep', 'Sign in', 'sijomealprep');
	pll_register_string('sijomealprep', 'Choose payment method', 'sijomealprep');
});


// Woocommerce polylang register strings end //

// Woocommerce postcode checker start //
function render_postcode_checker( $atts ){
	ob_start();
	echo '<div id="postcode-checker" class="postcode-checker box-shadow">';
	echo '<h3 class="postcode-checker-title">'; echo pll__('postkod checker title', 'sijomealprep-postcode-checker');
	echo '</h3>';
	echo '<input class="postcode-checker-input" type="number">';
	echo '<button type="button" class="postcode-checker-button">'; echo pll__('postkod check button', 'sijomealprep-postcode-checker');
	echo '</button>';
	echo '<p class="postcode-checker-msg msg-we-deliver">'; echo pll__('we can offer homedelivery', 'sijomealprep-postcode-checker');
	echo '</p>';
	echo '<p class="postcode-checker-msg msg-we-dont">'; echo pll__('sorry but you can pickup', 'sijomealprep-postcode-checker');
	echo '</p>';
	echo '<p class="postcode-checker-msg msg-tryagain">'; echo pll__('try again', 'sijomealprep-postcode-checker');
	echo '</p>';
  echo '</div>';
	?>

	<script>
	jQuery(function($) {
		const $checkerWrapper = $('.postcode-checker');
		const $checkerInput = $('.postcode-checker-input');
		const $msgDeliver = $('.msg-we-deliver');
		const $msgDont = $('.msg-we-dont');
		const $msgTryagain = $('.msg-tryagain');
		const $checkerButton = $('.postcode-checker-button');

		$msgDeliver.hide();
		$msgDont.hide();
		$msgTryagain.hide();

		$checkerButton.mousedown(function(e) {
			e.preventDefault()
			const zipcodeIncluded = $checkerInput.val().match(/^(666|667|68|679|678|677|676|674|673|672|671|669|668|6659|6658|6656|6655|6654|6653|651|652|653|656|6571|6573)/);

			if ($checkerInput.val().length === 5 && typeof Number) {
				if (zipcodeIncluded) {
					$msgDeliver.show();
					$msgDont.hide();
					$msgTryagain.hide();
				} else {
					$msgDont.show();
					$msgDeliver.hide();
					$msgTryagain.hide();
				}
			} else {
				$msgTryagain.show();
				$msgDeliver.hide();
				$msgDont.hide();
				setTimeout(() => {
					$msgDeliver.hide();
					$msgDont.hide();
					$msgTryagain.hide();
				}, 2000);
			}
		})

		$checkerInput.keypress(function(event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					$checkerButton.mousedown();
				}
		});
	});
	</script>
	<?php
	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}

add_shortcode( 'postcode_checker', 'render_postcode_checker' );

// function add_postcode_checker() {
//  	echo do_shortcode("[postcode_checker]");
// }

// Woocommerce postcode checker end //

// Woocommerce shop start //
add_action( 'woocommerce_before_shop_loop', 'add_variations_in_shop_page' );

function add_variations_in_shop_page() {
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
        echo '<div class="macro-container__box kcal">';
        echo '<h4 class="macro-container__box-title">Kcal</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro large-cal">'. $largeKcal .'</h4>';
        echo '<h4 class="macro-container__box-macro small-cal">'. $smallKcal .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '<div class="macro-container__box protein">';
        echo '<h4 class="macro-container__box-title">Protein</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro small-protein large-protein">'. $largeProtein .'</h4>';
        echo '<h4 class="macro-container__box-macro small-protein small-protein">'. $smallProtein .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<h6 class="select-size">' . pll__('Select Size', 'sijomealprep-postcode-checker') . '</h6>';
      } else {
        echo '<div class="macro-container">';
        echo '<div class="macro-container__box kcal">';
        echo '<h4 class="macro-container__box-title">Kcal</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro">'. $smallKcal .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '<div class="macro-container__box protein">';
        echo '<h4 class="macro-container__box-title">Protein</h4>';
        echo '<div class="macro-container__box-container">';
        echo '<h4 class="macro-container__box-macro small-protein">'. $smallProtein .'</h4>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
   }

   add_action( 'woocommerce_after_shop_loop_item_title', 'winwar_add_product_excerpt_into_archive', 10 );

   add_filter( 'storefront_handheld_footer_bar_links', 'jk_remove_handheld_footer_links' );
        function jk_remove_handheld_footer_links( $links ) {
            unset( $links['search'] );

            return $links;
    }

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 20 );
// Woocommerce shop end //

// Woocommerce single product filters start //
 function filter_woocommerce_short_description( $post_post_excerpt ) {
   if ( !is_shop() ) {
     global $product;

     if ($product->short_description) {
       $post_post_excerpt = "<div class='wp-block-pb-accordion-item c-accordion__item js-accordion-item' data-initially-open='false' data-click-to-close='true' data-auto-close='true' data-scroll='false' data-scroll-offset='0'>
       <h3 id='at-67843' class='c-accordion__title js-accordion-controller' role='button' tabindex='0' aria-controls='ac-67843' aria-expanded='false'>"
       . pll__('More Details', 'sijomealprep') .
       "</h3>
       <div id='ac-67843' class='c-accordion__content' hidden='hidden'>$product->short_description</div>
       </div>";
     }
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

  global $product; 

 function action_woocommerce_before_main_content() {
	$smallKcal = get_field('small_portion_kcal', $product->ID);
	$smallProtein = get_field('small_portion_protein', $product->ID);
	$largeKcal = get_field('large_portion_kcal', $product->ID);
  $largeProtein = get_field('large_portion_protein', $product->ID);

    echo '<div class="macro-container">';
    echo '<div class="macro-container__box kcal">';
    echo '<h4 class="macro-container__box-title">Kcal</h4>';
    echo '<div class="macro-container__box-container">';
    echo '<h4 class="macro-container__box-macro large-cal">'. $largeKcal .'</h4>';
    echo '<h4 class="macro-container__box-macro small-cal">'. $smallKcal .'</h4>';
    echo '</div>';
    echo '</div>';
    echo '<div class="macro-container__box protein">';
    echo '<h4 class="macro-container__box-title">Protein</h4>';
    echo '<div class="macro-container__box-container">';
    echo '<h4 class="macro-container__box-macro small-protein large-protein">'. $largeProtein .'</h4>';
    echo '<h4 class="macro-container__box-macro small-protein small-protein">'. $smallProtein .'</h4>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
};

add_action( 'woocommerce_single_product_summary', 'action_woocommerce_before_main_content', 10, 2 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
// Woocommerce single product filters end //

// Woocommerce checkout start //
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
			if ('wpll-shipping-method' === $rate->method_id ) {
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
add_action('woocommerce_before_checkout_form', 'bbloomer_free_shipping_cart_notice', 10, 2);

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

add_action( 'woocommerce_checkout_before_customer_details', 'add_postcode_checker', 20 );
function add_postcode_checker() {
    echo do_shortcode('[postcode_checker]');
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
    $shipping_method_pickup ='wpll-shipping-method';
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
            $('.billing-dynamic_pickup').toggleClass('hide_pickup', $('#shipping_method_0_wpll-shipping-method[value="wpll-shipping-method"]').is(':checked'));
            });
        });
    </script>
    <?php
    endif;
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
add_action( 'woocommerce_before_checkout_billing_form', 'woocommerce_order_review', 10 );

// Woocommerce checkout end //

// Woocommerce my account start //
function hook_css() {
  if ( is_user_logged_in() ) {
  ?>
      <style>
          .is-logged-in {
              display: none !important;
          }
      </style>
  <?php
  } else {
      ?>
      <style>
          .is-logged-out {
              display: none !important;
          }
      </style>
  <?php
  }
}
add_action('wp_head', 'hook_css');

add_action( 'woocommerce_after_customer_login_form', function() {
  echo '<div class="no-account-wrapper">';
  echo '<h3 class="no-account-title">' . pll__('No account?', 'sijomealprep') . '</h3>';
  echo '<button class="button alt register-button">' . pll__('Register', 'sijomealprep') . '</button>';
  echo '<h3 class="has-account-title">' . pll__('Already have an account?', 'sijomealprep') . '</h3>';
  echo '<button class="button alt sign-in-button">' . pll__('Sign in', 'sijomealprep') . '</button>';
  echo '</div>';
} );

// Woocommerce my account end //

//Change the 'Billing details' checkout label to 'Contact Information'
function wc_billing_field_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
    case 'Faktureringsadress' :
    $translated_text = __( 'Leverans-/ faktureringsuppgifter', 'woocommerce' );
    break;
    case 'Laskutusosoite' :
    $translated_text = __( 'Toimitus-/ laskutustiedot', 'woocommerce' );
    break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

add_action( 'woocommerce_review_order_before_payment', 'wc_privacy_message_below_checkout_button' );

function wc_privacy_message_below_checkout_button() {
   echo '<h2>' . pll__('Choose payment method', 'sijomealprep') . '</h2>';
}

function storefront_credit() {
    ?>
    <div class="site-info">
        © SiJo Ab <?php echo Date("Y") ?>
    </div><!-- .site-info -->
    <?php
}

function kia_display_order_data( $order_id ){
    $order = wc_get_order( $order_id );
    $pickup_location = $order->get_meta( '_wpll_pickup_lcoation_name' );
    $is_svenskan = strpos($pickup_location, 'Svenskagården') !== false;
    $is_gym365 = strpos($pickup_location, 'Gym') !== false;

    if ($is_svenskan || $is_gym365 ) {
        ?>
        <h2><?php echo pll__('Pickup info', 'sijomealprep'); ?></h2>
        <table class="shop_table shop_table_responsive additional_info">
            <tbody>
                <tr>
                    <td style="text-align:left; padding-left: 0"><?php echo pll__('Pickup from', 'sijomealprep'); ?>
                    <?php echo $order->get_meta( '_wpll_pickup_lcoation_name' ); ?></td>
                </tr>
            </tbody>
        </table>
    <?php
    }
}
add_action( 'woocommerce_thankyou', 'kia_display_order_data', 20 );
add_action( 'woocommerce_view_order', 'kia_display_order_data', 20 );

function kia_display_email_order_meta( $order, $sent_to_admin ) {
    $pickup_location = $order->get_meta( '_wpll_pickup_lcoation_name' );
    $is_svenskan = strpos($pickup_location, 'Svenskagården') !== false;
    $is_gym365 = strpos($pickup_location, 'Gym') !== false;

    if( $is_svenskan || $is_gym365 ) {
    echo '<strong>' . pll__('Pickup from', 'sijomealprep') . ' ' . $pickup_location . '</strong></br></br>';
    }
}
add_action('woocommerce_email_order_meta', 'kia_display_email_order_meta', 30, 3 );

function example_custom_order_fields( $fields, $order ) {
    $new_fields = array();
    $pickup_location = $order->get_meta( '_wpll_pickup_lcoation_name' );
    $is_svenskan = strpos($pickup_location, 'Svenskagården') !== false;
    $is_gym365 = strpos($pickup_location, 'Gym') !== false;

    if( $is_svenskan || $is_gym365 ) {
        $new_fields['_wpll_pickup_lcoation_name'] = array(
            'label' => pll__('Pickup from', 'sijomealprep'),
            'value' => get_post_meta( $order->id, '_wpll_pickup_lcoation_name', true )
        );
    }

    return array_merge( $fields, $new_fields );
}
add_filter( 'wcdn_order_info_fields', 'example_custom_order_fields', 10, 2 );
