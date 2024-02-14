<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Funeral
 */

get_header();
?>

<div id="primary" class="content-area">
	<div class="uk-container uk-margin-top">
		<div class="uk-margin-remove" uk-grid>
			<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>
				<div class="uk-width-3-4@m uk-padding-remove">
						<main id="main" class="site-main ">

							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );

								//the_post_navigation();

							endwhile; // End of the loop.
							?>

						</main><!-- #main -->
				</div>
				
					<?php get_sidebar('sidebar-blog'); ?>
		</div><!-- grid -->
			
	<?php
				} else { ?>


			<main id="main" class="site-main ">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					//the_post_navigation();

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->

	<?php } ?>

	</div><!-- .uk-container -->

</div><!-- #primary -->

<?php
get_footer();
