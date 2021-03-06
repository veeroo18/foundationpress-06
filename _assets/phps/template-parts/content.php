<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fp6
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="row">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php foundation_6_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'foundation-6' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foundation-6' ),
					'after'  => '</div>',
				) );
			?></div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="row">
			<?php foundation_6_entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
