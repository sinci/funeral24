<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Funeral
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
		<div class="uk-overlay uk-overlay-primary uk-position-cover">
			<div class="uk-position-center">
				<header class="entry-header">
					<?php the_title( '<h1 class="uk-h2 entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>

	<div class="entry-content uk-container uk-margin-top">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'funeral' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'funeral' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
