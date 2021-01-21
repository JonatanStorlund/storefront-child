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
