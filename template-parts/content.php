<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Funeral
 */

?>

<article id="post-<?php the_ID(); ?>" class="blog" <?php post_class(); ?>>
<?php funeral_post_thumbnail(); ?>


	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="uk-article-title uk-margin-top">', '</h1>' );
		else :
			the_title( '<h2 class="uk-article-title uk-margin-top"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta uk-text-small">
				<?php
				funeral_posted_on();
				funeral_entry_footer();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'funeral' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'funeral' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

<?php if (is_single ()) : ?>
	<footer class="entry-footer">
		<?php funeral_entry_footerb(); ?>
	</footer><!-- .entry-footer -->

<?php endif; ?>
	 
</article><!-- #post-<?php the_ID(); ?> -->