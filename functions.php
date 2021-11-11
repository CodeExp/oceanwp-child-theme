<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

/**
 * Add Fonts to OceanWP
 * /
// Add custom font to font settings
function ocean_add_custom_fonts() {
	return array( '' ); // You can add more then 1 font to the array!
}
/* */

/**
 * Add Font Group to Elementor
 * /
add_filter( 'elementor/fonts/groups', 'prefix_elementor_custom_fonts_group', 10, 1 );
function prefix_elementor_custom_fonts_group( $font_groups ) {

	$font_groups['theme_fonts'] = __( 'Theme Fonts' );
	return $font_groups;
}
/* */

/**
 * Add Group Fonts to Elementor
 * /
add_filter( 'elementor/fonts/additional_fonts', 'prefix_elementor_custom_fonts', 10, 1 );
function prefix_elementor_custom_fonts( $additional_fonts ) {
    
	$additional_fonts[''] = 'theme_fonts'; // You can add more then 1 font to the array!
	return $additional_fonts;
}
/* */
