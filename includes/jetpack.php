<?php
/**
* Jetpack Compatibility File
* See: http://jetpack.me/
*
* @package Swell
* @since Swell 1.0
*/

/**
* Add support for Jetpack's Featured Content and Infinite Scroll
*/
function swell_jetpack_setup() {

	// See: http://jetpack.me/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'infinite-container',
		'wrapper'			=> false,
		'posts_per_page' 	=> 10,
		'render' 			=> 'swell_render_IS',
		'footer_widgets' 	=> array( 'footer' ),
		'footer'         	=> 'wrap',
	) );
}
add_action( 'after_setup_theme', 'swell_jetpack_setup' );

/**
* Infinite Scroll: function for rendering posts
*/
function swell_render_IS() {
	get_template_part( 'loop', 'blog' );
}