<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fp6
 */
?>
	<a class="exit-off-canvas"></a>
		</div><!-- .row -->
	</div><!-- #content -->
  </div>
</div>
<!-- off canvas menu wrapper -->
	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info row">
			<div class="medium-4 columns">
				<p>
					<a href="<?php echo esc_url( __( 'http://abtl.co.in/', 'fp5' ) ); ?>"><?php printf( __( '- All &copy; Copyrights Reserved %s', 'fp5' ), bloginfo('name') ); ?></a>
				</p>
			</div>
			<div class="medium-4 columns">
				<?php /* printf( __( '<p>developed: %1$s by %2$s</p>', 'fp5' ), 'fp5', '<a href="http://v-render.com/" rel="designer">v-render.com</a>' ); */ ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>
