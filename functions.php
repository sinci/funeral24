<?php
/**
 * Funeral functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Funeral
 */

if ( ! function_exists( 'funeral_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function funeral_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Funeral, use a find and replace
		 * to change 'funeral' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'funeral', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' 		=> esc_html__( 'Primary', 'funeral' ),
			'sidebar-menu' 	=> esc_html__( 'Sidebar Menu', 'funeral' ),
			'footer-menu' 	=> esc_html__( 'Footer Menu', 'funeral' ),
		) );

		
/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'funeral_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);
	
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'funeral_setup' );

/**
 * Changes the class on the custom logo in the header.php
 */
function helpwp_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'uk-navbar-item uk-logo', $html );
	return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function funeral_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'funeral_content_width', 640 );
}
add_action( 'after_setup_theme', 'funeral_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function funeral_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-Blog', 'funeral' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s uk-padding">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header-Candle', 'funeral' ),
		'id'            => 'header-candle',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header-Phone', 'funeral' ),
		'id'            => 'header-phone',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header-Phone-Mobile', 'funeral' ),
		'id'            => 'header-phone-mobile',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer-1', 'funeral' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer-2', 'funeral' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer-3', 'funeral' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'funeral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="uk-h3">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'funeral_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function funeral_scripts() {

	wp_enqueue_style( 'uikit-min', get_template_directory_uri() . '/css/uikit.min.css' );
	wp_enqueue_style( 'uikit-trl-min', get_template_directory_uri() . '/css/uikit-rtl.min.css' );

	// Main CSS
	wp_enqueue_style( 'funeral-style', get_stylesheet_directory_uri() . '/style.css' );


	wp_enqueue_script( 'funeral-custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );
	wp_enqueue_script( 'funeral-uikit', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'funeral-icons', get_template_directory_uri() . '/js/uikit-icons.min.js', array('funeral-uikit'), '20151215', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'funeral_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Main Menu
 */
require get_template_directory() . '/inc/wp-custom-nav-walker.php';

/**
 * Plugin Activation
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Search Form Style
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="uk-search uk-search-default" action="' . home_url( '/' ) . '" >
   	<a href="'. esc_attr__( 'Search' ) .'" class="uk-search-icon-flip" uk-search-icon></a>
	<input class="uk-search-input" type="search" placeholder="'. esc_attr__( 'Search' ) .'" value="' . get_search_query() . '" name="s" id="s">
	</form>';
	
    return $form;
}
add_filter( 'get_search_form', 'my_search_form', 100 );

// SVG Support
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


// Footer Credits - Footer Info
if ( ! class_exists( '' ) ) {
	include( dirname( __FILE__ ) . '/inc/class-footer-credits.php' );
}
/**
 * Load the plugin.
 */
$footer_credits = new Cedaro_Footer_Credits();
add_action( 'after_setup_theme', array( $footer_credits, 'register_hooks' ) );

if ( ! function_exists( 'funeral_credits' ) ) :

/**
 * Theme credits text.
 */
function themename_credits() {
	$text = sprintf( __( '%s', 'funeral' ),
		'funeral theme by <a href="http://www.sinci.at/" target="_blank">sinci</a>'
	);

	echo apply_filters( 'footer_credits', $text );
}
endif;

/**
 * Gutenberg Editor
 */
function mytheme_add_editor_styles() {
    add_editor_style( '/css/style-editor.css' );
}
add_action( 'admin_init', 'mytheme_add_editor_styles' );

add_theme_support( 'align-wide' );
add_theme_support( 'wp-block-styles' );
add_theme_support('editor-styles');
add_theme_support( 'responsive-embeds' );

/**
 * Read More
 */
function modify_read_more_link() {
    return '<a class="uk-button uk-button-primary uk-margin uk-margin-remove-top" href="' . get_permalink() . '">Weiterlesen</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


// Remove Header-Image Customizer
add_action( "customize_register", "funeral_theme_customize_register" );
function funeral_theme_customize_register( $wp_customize ) {
 $wp_customize->remove_control("header_image");
}

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}
// Numbered Pagination END

// Custom Font Google Disable
add_filter( 'asl_custom_fonts', 'remove_asl_gf', 10, 1);
function remove_asl_gf( $imports ) {
    return array();
}











