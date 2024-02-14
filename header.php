<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Funeral
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="tm-page">
	<header id="masthead" class="site-header">
		<div class="uk-container uk-padding-small uk-visible@m">
			<div class="uk-grid header-top" uk-grid>
				<div class="uk-width-1-3 uk-padding-remove-left logo-desktop">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$funeral_description = get_bloginfo( 'description', 'display' );
					if ( $funeral_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $funeral_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<div class="uk-width-1-3">
						<div class="uk-flex uk-flex-center uk-margin-top">
							<?php 
							if( is_active_sidebar( 'header-candle' ) ){ ?>
								<?php dynamic_sidebar( 'header-candle' ); ?>
							<?php } ?>
						</div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-flex uk-flex-center uk-margin-top">
						<?php 
						if( is_active_sidebar( 'header-phone' ) ){ ?>
							<?php dynamic_sidebar( 'header-phone' ); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="uk-navbar-container" uk-sticky>
			<div class="uk-container">
				<nav class="uk-navbar uk-visible@m" uk-navbar>
					<div class="uk-navbar-left">
						<?php wp_nav_menu( array(
							'menu'              => 'menu-1',
							'theme_location'    => 'menu-1',
							'depth'             => 3,
							'container'         => '',
							'menu_class'        => 'uk-navbar-nav',
							'fallback_cb'       => 'your_themename_top_menu::fallback',
							'walker'            => new your_themename_top_menu())
						); ?>  

					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>

		<!-- Header Mobile -->
		<nav class="uk-navbar mobile uk-padding-remove uk-hidden@m" uk-sticky>
			<div class="uk-navbar-left">
				<a class="uk-navbar-toggle" uk-toggle="target:#offcanvas-slide">
					<span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
				</a>
			</div>
			<div class="uk-navbar-center">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a class="uk-navbar-item uk-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a class="uk-navbar-item uk-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$funeral_description = get_bloginfo( 'description', 'display' );
					if ( $funeral_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $funeral_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div> 
			<div class="uk-navbar-right">
				<?php 
					if( is_active_sidebar( 'header-phone-mobile' ) ){ ?>
					<?php dynamic_sidebar( 'header-phone-mobile' ); ?>
				<?php } ?>
			</div>
		</nav>

	</header><!-- #masthead -->

<div id="content" class="site-content">

