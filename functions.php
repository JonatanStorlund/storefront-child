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
$path = get_template_directory() . '-child/';

include $path . 'woocommerce/shop.php';
include $path . 'woocommerce/single-product-filters.php';
include $path . 'woocommerce/woocommerce-checkout.php';
include $path . 'woocommerce/postcode-checker.php';
include $path . 'woocommerce/polylangstrings.php';

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
						<?php if(get_field('hero_link')['url']) {?>
						<button class="hero-wrapper__left-box-button"><?php echo get_field('hero_link')['title'] ?></button>
						<?php } ?>
					</div>
				</div>
			</div>
        </a>

        <div class="hero-wrapper section-inner medium mobile alignfull">
            <h1 class="hero-wrapper__left-box-title"><?php echo get_field('hero_title') ?></h1>
            <?php if(get_field('hero_link')['url']) {?>
            <button class="hero-wrapper__left-box-button"><?php echo get_field('hero_link')['title'] ?></button>
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
    wp_enqueue_script( 'storefront-child-scripts', get_stylesheet_directory_uri() . '/assets/scripts/hide-show-on-scroll.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'translate-scripts', get_stylesheet_directory_uri() . '/assets/scripts/translate.js', array( 'jquery' ),'',true );
}

add_action( 'wp_enqueue_scripts', 'storefront_child_scripts' );
