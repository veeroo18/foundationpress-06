<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fp6
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<div class="row">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'foundation-6' ); ?></h1>
		</div>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="row"><?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'foundation-6' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
			<?php elseif ( is_search() ) : ?>
			
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foundation-6' ); ?></p>
				<?php
					get_search_form();
			
			else : ?>
			
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'foundation-6' ); ?></p>
				<?php
					get_search_form();
			
			endif; ?></div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
