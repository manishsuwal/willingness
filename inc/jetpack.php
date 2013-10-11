<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package willingness
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function willingness_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'willingness_jetpack_setup' );
