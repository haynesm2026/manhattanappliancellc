<?php
/**
 * VW Construction Estate functions and definitions
 *
 * @package VW Construction Estate
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */

if ( ! function_exists( 'vw_construction_estate_setup' ) ) :

function vw_construction_estate_setup() {

	$GLOBALS['content_width'] = apply_filters( 'vw_construction_estate_content_width', 640 );
	
	load_theme_textdomain( 'vw-construction-estate', get_template_directory() . '/languages' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('vw-construction-estate-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-construction-estate' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_construction_estate_font_url() ) );
	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'vw_construction_estate_activation_notice' );
	}

}
endif;
add_action( 'after_setup_theme', 'vw_construction_estate_setup' );

// Notice after Theme Activation
function vw_construction_estate_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing VW Construction Estate theme. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Construction Estate theme.', 'vw-construction-estate' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=vw_construction_estate_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-construction-estate' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function vw_construction_estate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-construction-estate' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-construction-estate' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-construction-estate' ),
		'description'   => __( 'Appears on page sidebar', 'vw-construction-estate' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'vw-construction-estate' ),
		'description'   => __( 'Appears on page sidebar', 'vw-construction-estate' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-construction-estate' ),
		'description'   => __( 'Appears on footer 1', 'vw-construction-estate' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-construction-estate' ),
		'description'   => __( 'Appears on footer 2', 'vw-construction-estate' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-construction-estate' ),
		'description'   => __( 'Appears on footer 3', 'vw-construction-estate' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-construction-estate' ),
		'description'   => __( 'Appears on footer 4', 'vw-construction-estate' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'vw-construction-estate' ),
		'description'   => __( 'Appears on topbar', 'vw-construction-estate' ),
		'id'            => 'social-icon',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-construction-estate' ),
		'description'   => __( 'Appears on shop page', 'vw-construction-estate' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-construction-estate' ),
		'description'   => __( 'Appears on single product page', 'vw-construction-estate' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'vw_construction_estate_widgets_init' );

/* Theme Font URL */
function vw_construction_estate_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Poppins';
	$font_family[] = 'Libre+Baskerville';
	$font_family[] = 'Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i';	
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> 		rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function vw_construction_estate_scripts() {
	wp_enqueue_style( 'vw-construction-estate-font', vw_construction_estate_font_url(), array() );
	wp_enqueue_style( 'vw-construction-estate-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'vw-construction-estate-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-style', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
	wp_enqueue_style( 'vw-construction-estate-basic-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/inline-style.php' );
	wp_add_inline_style( 'vw-construction-estate-basic-style',$vw_construction_estate_custom_css );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );	
	wp_enqueue_style( 'vw-construction-estate-customcss', esc_url(get_template_directory_uri()) . '/css/custom.css' );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'jquery-superfish-js', esc_url(get_template_directory_uri()) . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'vw-construction-estate-customscripts', esc_url(get_template_directory_uri()) . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'vw-construction-estate-bootstrapscripts', esc_url(get_template_directory_uri()) . '/js/bootstrap.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vw_construction_estate_scripts' );

/**
 * Enqueue block editor style
 */
function vw_construction_estate_block_editor_styles() {
	wp_enqueue_style( 'vw-construction-estate-font', vw_construction_estate_font_url(), array() );
    wp_enqueue_style( 'vw-construction-estate-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', esc_url(get_template_directory_uri()).'/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'vw_construction_estate_block_editor_styles' );

define('VW_CONSTRUCTION_ESTATE_FREE_THEME_DOC',__('https://www.vwthemesdemo.com/docs/free-vw-construction-estate/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_SUPPORT',__('https://wordpress.org/support/theme/vw-construction-estate/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_REVIEW',__('https://wordpress.org/support/theme/vw-construction-estate/reviews/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_BUY_NOW',__('https://www.vwthemes.com/themes/premium-construction-wordpress-theme/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_LIVE_DEMO',__('https://vwthemes.net/vw-construction-estate-pro/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_PRO_DOC',__('https://www.vwthemesdemo.com/docs/vw-construction-estate-pro/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_FAQ',__('https://www.vwthemes.com/faqs/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_CONTACT',__('https://www.vwthemes.com/contact/','vw-construction-estate'));
define('VW_CONSTRUCTION_ESTATE_CREDIT',__('https://www.vwthemes.com/themes/free-construction-wordpress-theme/','vw-construction-estate'));

if ( ! function_exists( 'vw_construction_estate_credit' ) ) {
	function vw_construction_estate_credit(){
		echo "<a href=".esc_url(VW_CONSTRUCTION_ESTATE_CREDIT)." target='_blank'>".esc_html__('Construction WordPress Theme','vw-construction-estate')."</a>";
	}
}

function vw_construction_estate_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/

function vw_construction_estate_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function vw_construction_estate_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function vw_construction_estate_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_construction_estate_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Excerpt Limit Begin */
function vw_construction_estate_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_construction_estate_loop_columns');
	if (!function_exists('vw_construction_estate_loop_columns')) {
	function vw_construction_estate_loop_columns() {
		return get_theme_mod( 'vw_construction_estate_products_per_row', '3' ); 
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_construction_estate_products_per_page' );
function vw_construction_estate_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_construction_estate_products_per_page',9);
}

function vw_construction_estate_logo_title_hide_show(){
	if(get_theme_mod('vw_construction_estate_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_construction_estate_tagline_hide_show(){
	if(get_theme_mod('vw_construction_estate_tagline_hide_show') == '1' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Social Social Widgets */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/get-started/get-started.php';

/* typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Plugin Activation */
require get_template_directory() . '/inc/get-started/plugin-activation.php';