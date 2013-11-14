<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package willingness
 */
?>

	</div><!-- #main -->
	
	<div id="footer-sidebar" class="container">




	<!--footer sidebar-->
	<div id="footer-1" class="footer-sidebar" role="complementary">
		<ul class="foo">	
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>
	</div><!-- #footer-sidebar -->

	<div id="footer-2" class="footer-sidebar" role="complementary">
		<ul class="foo">	
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>
	</div><!-- #footer-sidebar -->

	<div id="footer-3" class="footer-sidebar" role="complementary">
		<ul class="foo">	
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>
	</div><!-- #footer-sidebar -->

	<div id="footer-4" class="footer-sidebar" role="complementary">
		<ul class="foo">	
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php endif; ?>
	</div><!-- #footer-sidebar -->
		
		</div>
		

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="site-info">
			<?php do_action( 'willingness_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'willingness' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'willingness' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'Willingness' ), '<a href="'.esc_url( 'http://enwil.com/willingness' ).'" rel="designer">willingness</a>','Manish Suwal' ); ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>

