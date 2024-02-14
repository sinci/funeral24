<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Funeral
 */

get_header();
?>

<div id="primary" class="content-area">
	<?php
		if ( is_home() && ! is_front_page() ) :
	?>
	<div class="uk-background-cover uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $page=41 ) ); ?>');">
		<div class="uk-overlay uk-overlay-primary uk-position-cover">
			<div class="uk-position-center">
				<header>
				<h1 class="uk-h2 entry-title"><?php single_post_title(); ?></h1>
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
	<?php
	endif;
	?>

	<div class="uk-container uk-margin-top">
		<div class="uk-margin-remove" uk-grid>
			<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>
			<div class="uk-width-3-4@m uk-padding-remove">
				<main id="main" class="site-main ">

				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					echo '<div class="uk-flex uk-flex-center uk-padding">';
					wpex_pagination();
					echo '</div>';

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div>
			
				<?php get_sidebar('sidebar-blog'); ?>
		</div><!-- grid -->

		<?php
			} else { ?>

			<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</main><!-- #main -->

		<?php } ?>

	</div><!-- .uk-container -->
		
</div><!-- #primary -->
<?php
get_footer();
