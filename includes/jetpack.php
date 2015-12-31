<?php
/**
* Jetpack Compatibility File
* See: http://jetpack.me/
*
* @package Swell Lite
* @since Swell Lite 1.0
*/

/**
* Add support for Jetpack's Featured Content and Infinite Scroll
*/
function swell_lite_jetpack_setup() {

	// See: http://jetpack.me/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'infinite-container',
		'wrapper'			=> false,
		'render' 			=> 'swell_lite_render_IS',
		'footer_widgets' 	=> array( 'footer' ),
		'footer'         	=> 'wrap',
	) );
}
add_action( 'after_setup_theme', 'swell_lite_jetpack_setup' );

/**
* Infinite Scroll: function for rendering posts
*/
function swell_lite_render_IS() {
	if ( is_home() ) {
		get_template_part( 'content/loop', 'blog' );
	} else {
		get_template_part( 'content/loop', 'archive' );
	}
}