<?php
/**
 * U3A_DEMO functions and definitions
 *
 * @link 
 *
 * @package U3A_DEMO
 */

if ( ! function_exists( 'U3A_DEMO_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function U3A_DEMO_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on U3A_DEMO, use a find and replace
		 * to change 'U3A_DEMO' to the name of your theme in all the template files.
		 */
                /**
		 *    Require Once
		 */
                
                
                
		load_theme_textdomain( 'U3A_DEMO', get_template_directory() . '/languages' );

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
                 add_image_size( 'U3A_DEMO-full-bleed', 2000, 1200, true );
                 add_image_size( 'U3A_DEMO-full-bleed', 800, 450, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Header','U3A_DEMO' ),
                        'social' => esc_html__( 'Social Media Menu','U3A_DEMO' ),
                    'menu-3' => esc_html__( 'top menu','U3A_DEMO' ),
                    
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'U3A_DEMO_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
                
                
                // Add theme support for Custom logo
                add_theme_support('custom_logo', array(
                    'width' => 90,
                    'height' => 90,
		    'flex-width' => true,
                    ));
            
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
                
                /* Editor styles */
	add_editor_style( array( 'inc/editor-styles.css', U3A_DEMO_fonts_url() ) );
	}
endif;
add_action( 'after_setup_theme', 'U3A_DEMO_setup' );


/**
 * Register custom fonts.
 */
function U3A_DEMO_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro and PT Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$sans_serif = _x( 'on', 'sans-serif font: on or off', 'U3A_DEMO' );
	$serif = _x( 'on', 'serif font: on or off', 'U3A_DEMO' );

	$font_families = array();

	if ( 'off' !== $sans_serif ) {
		$font_families[] = 'sans-serif:400,400i,700,900';
	}

	if ( 'off' !== $serif ) {
		$font_families[] = 'serif:400,400i,700,700i';
	}


	if ( in_array( 'on', array($sans_serif, $serif) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

function myslug_modify_admin_bar() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('edit');
}

add_action( 'wp_before_admin_bar_render', 'myslug_modify_admin_bar' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function U3A_DEMO_content_width() {
	// This variable is intended to be overruled from themes.
	
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'U3A_DEMO_content_width', 640 );
}
add_action( 'after_setup_theme', 'U3A_DEMO_content_width', 0 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function U3A_DEMO_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 900 <= $width ) {
		$sizes = '(min-width: 900px) 700px, 900px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) ) {
		$sizes = '(min-width: 900px) 600px, 900px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'U3A_DEMO_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function U3A_DEMO_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'U3A_DEMO_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @origin Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function U3A_DEMO_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {

	if ( !is_singular() ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 900px) 90vw, 800px';
		} else {
			$attr['sizes'] = '(max-width: 1000px) 90vw, 1000px';
		}
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'U3A_DEMO_post_thumbnail_sizes_attr', 10, 3 );



/**
 * Register widget area.
 *
 * @link 
 */
function U3A_DEMO_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'U3A_DEMO' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'U3A_DEMO' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'New Sidebar', 'U3A_DEMO' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'U3A_DEMO' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'U3A_DEMO' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add page sidewar widgets here.', 'U3A_DEMO' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'U3A_DEMO' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'U3A_DEMO' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        register_sidebar( array(
	'name' => __( 'Single Post After Content', 'U3A_DEMO' ),
	'id' => 'single-after-content-widget-area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
));
        // category archive - before content widget area
register_sidebar( array(
	'name' => __( 'Category Archive Before Content', 'U3A_DEMO' ),
	'id' => 'category-before-content-widget-area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
));
	
// custom page template - before content widget area
register_sidebar( array(
	'name' => __( 'Widgetized Page Before Content', 'U3A_DEMO' ),
	'id' => 'widgetized-page-before-content-widget-area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
));

// custom page template - after content widget area
register_sidebar( array(
	'name' => __( 'Widgetized Page After Content', 'U3A_DEMO' ),
	'id' => 'widgetized-page-after-content-widget-area',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'
));

}
add_action( 'widgets_init', 'U3A_DEMO_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function U3A_DEMO_scripts() {
    // google font : robotto and slab
    //wp_enqueue_style('U3A_DEMO_bootstrap_css',get_template_directory_uri().'/css/bootstrap.min.css');
    //wp_enqueue_script('U3A_DEMO_bootstrap_js',get_template_directory_uri().'/css/bootstrap.min.js',array('jquery'),'20170710',true);
    
     //wp_enqueue_style( 'U3A_DEMO_bootstrap-cdn-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    //wp_enqueue_script( 'U3A_DEMO_bootstrap-cdn-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );
    
    wp_enqueue_style('U3A_DEMO-fonts','https://fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700&amp;subset=latin-ext" rel="stylesheet');
	wp_enqueue_style( 'U3A_DEMO-style', get_stylesheet_uri() );
        //wp_enqueue_script('jquery');

	wp_enqueue_script( 'U3A_DEMO-navigation', get_template_directory_uri() .'/js/navigation.js', ['jquery'], '20151215', true );
        wp_enqueue_script( 'U3A_DEMO-function', get_template_directory_uri() .'/js/function.js', ['jquery'], '20161201', true );
wp_enqueue_script( 'U3A_DEMO-wpmm', get_template_directory_uri() .'/js/wpmm.js', ['jquery'], '20151215', true );
      
wp_localize_script('U3A_DEMO-navigation','U3A_DEMOScreenReaderText', array(
            'expand' => __('Expand child menu','U3A_DEMO'),
            'collapse' => __('Collapse child menu','U3A_DEMO'),
            ));
        
	wp_enqueue_script( 'U3A_DEMO-skip-link-focus-fix', get_template_directory_uri() .'/js/skip-link-focus-fix.js', array(), '20151215', true );
                if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'U3A_DEMO_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';