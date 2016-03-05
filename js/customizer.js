/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a, .site-description' ).css( 'color', to );
		} );
	} );
	// Theme Links
	$('.wp-full-overlay-sidebar-content').prepend('<a style="margin-top: 5px;margin-bottom: 5px; margin-left: 87px;"href="http://enwil.com/themes/willingness-gold/" class="button" target="_blank">{pro}</a>'.replace('{pro}',willingness_customizer_obj.pro));
	$('.wp-full-overlay-sidebar-content').prepend('<a style="margin-top: 5px;margin-bottom: 5px; margin-left: 106px;"href="http://enwil.com/themes/willingness/" class="button" target="_blank">{info}</a>'.replace('{info}',willingness_customizer_obj.info));
} )( jQuery );