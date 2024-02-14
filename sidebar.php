<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Funeral
 */

// Checks if there's a widget area with id sidebar-1
if( is_active_sidebar( 'sidebar-blog' ) ){ ?>
	<div class="uk-width-1-4@m">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</div>	
<?php } ?>
