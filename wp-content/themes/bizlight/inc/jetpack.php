<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Bizlight
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function bizlight_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bizlight_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function bizlight_jetpack_setup
add_action( 'after_setup_theme', 'bizlight_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bizlight_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function bizlight_infinite_scroll_render
