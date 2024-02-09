<?php
/**
 * News Blog functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Best_Shop
 */

if ( ! function_exists( 'news_blog_default_settings' ) ) :

function news_blog_default_settings($setting_name){
    
	$values = array (

        'address_title' => '',
        'address' => '',
        'mail_title' => '',
        'mail_description' => '',
        'phone_title' => esc_html__('Call:', 'news-blog'),
        'phone_number' => '',
        
        'home_header_sections' => 'tags,marquee,header_post',
        'home_body_sections' => 'slider,blog,post_1,post_2,post_3,post_4',
        'home_footer_sections' => 'footer_post_1,footer_post_2',
        
        'woo_category_title' => esc_html__('Top Categories', 'news-blog'),
        
        'heading_font' => 'PT Serif',
        'body_font' => 'Nunito Sans',
        'footer_copyright' => '',
        
        'primary_color' => '#2c63fd',
        'secondary_color' => '#32B9A5',
        
        'woo_bar_color' => '#fff',
        'woo_bar_bg_color' => '#2c63fd',
        
        'menu_text_color' => '#fff',
        'menu_bg_color' => '#0065d8',
        'text_color' => '#0c0c0c',
        
        'topbar_bg_color' => '#2c63fd',
        'topbar_text_color' => '#fff',
        
        'preloader_enabled' => false,
        
        'logo_width' => '130',
        
        'layout_width' => '1280',
        
        'enable_search' => true,
        'ed_social_links' => true,
        'social_links' => '',
        
        'header_layout' => 'woocommerce-bar',
        'hide_product_cat_search' => false,
        'menu_layout' => 'default',
        'header_banner_img' => '',
        
        'enable_sticky_menu' => false, 
        'enable_back_to_top' => true, 
        'enable_popup_cart' => true,
        
        'enable_top_bar' => true,        
        'top_bar_left_content' => 'datetime',
        'top_bar_left_text' => esc_html__('edit top bar text', 'news-blog'),
        'top_bar_right_content' => 'menu_social',
        'enable_top_bar_datetime' => true,
        
        'page_sidebar_layout' => 'no-sidebar',
        'post_sidebar_layout' => 'right-sidebar',
        'layout_style' => 'right-sidebar',
        'woo_sidebar_layout' => 'left-sidebar',        
        
        'post_page_note_text' => '',
        'enable_post_author' => false,
        'enable_post_date' => false,
        'enable_banner_comments' => false,
        'enable_post_read_calc' => false,
        'read_words_per_minute' => 200,
        'related_post_title' => esc_html__( 'Similar Posts', 'news-blog' ),
        'home_text' => esc_html__( 'Home', 'news-blog' ),
        
        'enable_breadcrumb' => true,
                
        'enable_banner_section' => 'static_banner',
        'banner_title' => esc_html__( 'Donec Cras Ut Eget Justo Nec Semper Sapien Viverra Ante', 'news-blog' ),
        'banner_content' => esc_html__( 'Structured gripped tape invisible moulded cups for sauppor firm hold strong powermesh front liner sport detail.', 'news-blog' ),
        'banner_btn_label' => esc_html__( 'Read More', 'news-blog' ),
        'banner_link' => '#',
        'banner_btn_two_label' => esc_html__( 'About Us', 'news-blog' ),
        'banner_btn_two_link' => '#',
        
        'enable_newsletter_section' => true,
        'newsletter_shortcode' => '',
        
        'blog_section_title' => esc_html__( 'Blog Posts', 'news-blog' ),
        
        'footer_text_color' => '#eee',
        'footer_color' => '#000',
        'footer_link' => 'https://gradientthemes.com/',
        'footer_img' => '',
        
        'subscription_shortcode' => '',
        
        
        //news home sections
        'home_body_layout'	=> 'right-sidebar',        
        //header
        'hs_tags_count'	=> 15,
        'hs_tags_title'=> esc_html__('Tags','news-blog'),
        'hs_marquee_cat'=> 0,
        'hs_marquee_title'=> esc_html__('Breaking News','news-blog'),
        'hs_marquee_count'=>  10,

        'hs_header_post_1_cat'=> 0,
        'hs_header_post_1_layout'=> 1,
        'hs_header_post_1_count'=> 3,
        'hs_header_post_1_col'=> 'col-md-4 col-sm-4 col-lg-4 col-xs-12',
        'hs_header_post_1_title'=> esc_html__('Header Post 1','news-blog'),

        'hs_slider_1_cat'=>  0,
        'hs_slider_count'=> 3,
        
        //double sections
        'hs_double_cat_1'=> 0,
        'hs_double_layout_1'=> 4,
        'hs_double_count_1'=> 6,
        'hs_double_col_1'=>  'col-md-12 col-sm-12 col-lg-12 col-xs-12',
        'hs_double_title_1'=> esc_html__('Post column 1','news-blog'), 
        
        'hs_double_cat_2'=> 0,
        'hs_double_layout_2'=> 4,
        'hs_double_count_2'=> 6,
        'hs_double_col_2'=>  'col-md-12 col-sm-12 col-lg-12 col-xs-12',
        'hs_double_title_2'=> esc_html__('Post column 2','news-blog'),        

        //post 1 - 4
        'hs_post_1_cat'=> 0,
        'hs_post_1_layout'=> 1,
        'hs_post_1_count'=> 6,
        'hs_post_1_col'=>  'col-md-6 col-sm-6 col-lg-6 col-xs-12',
        'hs_post_1_title'=> esc_html__('Post Section 1','news-blog'),
        
         //post 1 - 4
        'home_section_blog_navigation_title'=>  esc_html__('Post with Navigation','news-blog'),    

        'hs_post_2_cat'=> 0,
        'hs_post_2_layout'=> 3,
        'hs_post_2_count'=> 6,
        'hs_post_2_col'=>  'col-md-6 col-sm-6 col-lg-6 col-xs-12',
        'hs_post_2_title'=> esc_html__('Post Section 2','news-blog'),


        'hs_post_3_cat'=> 0,
        'hs_post_3_layout'=> 4,
        'hs_post_3_count'=> 8,
        'hs_post_3_col'=>  'col-md-6 col-sm-6 col-lg-6 col-xs-12',
        'hs_post_3_title'=> esc_html__('Post Section 3','news-blog'),
        

        'hs_post_4_cat'=> 0,
        'hs_post_4_layout'=> 1,
        'hs_post_4_count'=> 3,
        'hs_post_4_col'=>  'col-md-4 col-sm-4 col-lg-4 col-xs-12',
        'hs_post_4_title'=> esc_html__('Post Section 4','news-blog'),
        
        //footer posts
        'hs_footer_post_1_cat'=> 0,
        'hs_footer_post_1_layout'=> 1,
        'hs_footer_post_1_count'=> 3,
        'hs_footer_post_1_col'=>  'col-md-4 col-sm-4 col-lg-4 col-xs-12',
        'hs_footer_post_1_title'=> esc_html__('Footer Post Section 1','news-blog'),

        'hs_footer_post_2_cat'=> 0,
        'hs_footer_post_2_layout'=> 2,
        'hs_footer_post_2_count'=> 4,
        'hs_footer_post_2_col'=> 'col-md-3 col-sm-3 col-lg-3 col-xs-12',
        'hs_footer_post_2_title'=> esc_html__('Footer Post Section 2','news-blog'),
        
        
    );
    
    $output = apply_filters('news_blog_settings', $values);
    if(array_key_exists($setting_name, $output)){
	   return $output[$setting_name];        
    } else {
        return "";        
    }
}

endif;

/**
 * Custom fonts and colours
 */

function news_blog_custom_css() {
?>
	<style type="text/css" id="custom-theme-colors" >
        :root {
            --gbl-primary-color: <?php echo esc_html(news_blog_get_setting('primary_color')); ?> ;
            --gbl-secondary-color: <?php echo esc_html(news_blog_get_setting('secondary_color')); ?> ;
            --gbl-primary-font: <?php echo esc_html(news_blog_get_setting('heading_font')).', Serif'; ?> ;
            --gbl-secondary-font: <?php echo esc_html(news_blog_get_setting('body_font')).', Sans Serif'; ?> ;
            --logo-width: <?php echo absint(news_blog_get_setting('logo_width')); ?> ;
            --header-text-color: <?php echo esc_html('#'.get_header_textcolor()); ?> ;            
            --footer-color: <?php echo esc_html(news_blog_get_setting('footer_color')); ?> ;
            --footer-text-color: <?php echo esc_html(news_blog_get_setting('footer_text_color')); ?> ;
            --content-width: <?php echo absint(news_blog_get_setting('layout_width')).'px'; ?> ;
            --woo-bar-color: <?php echo esc_html(news_blog_get_setting('woo_bar_color')); ?> ;  
            --woo-bar-bg-color: <?php echo esc_html(news_blog_get_setting('woo_bar_bg_color')); ?> ;
            --menu-text-color: <?php echo esc_html(news_blog_get_setting('menu_text_color')); ?> ;  
            --menu-bg-color: <?php echo esc_html(news_blog_get_setting('menu_bg_color')); ?> ;  
            --text-color: <?php echo esc_html(news_blog_get_setting('text_color')); ?> ;
            --topbar-bg-color: <?php echo esc_html(news_blog_get_setting('topbar_bg_color')); ?> ;
            --topbar-text-color: <?php echo esc_html(news_blog_get_setting('topbar_text_color')); ?> ;
            --e-global-color-primary: <?php echo esc_html(news_blog_get_setting('primary_color')); ?> ;
            
        }
        .site-branding img.custom-logo {
            max-width:<?php echo esc_html(news_blog_get_setting('logo_width')); ?>px ;    
        }
        @media (min-width: 1024px) {
            #masthead {
                background-image:url('<?php echo esc_url( get_header_image() ); ?>');
                background-size: cover;
                background-position: center center;
            }
        }
        body.custom-background-image .site, 
        body.custom-background-color .site,
        .mobile-navigation {
            background-color: <?php echo esc_html('#'.get_background_color()); ?>;
        }
        .site-footer {
            background:url("<?php echo esc_url(news_blog_get_setting('footer_img')); ?>") ;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        
        .site-footer .footer-overlay {
            background-color:<?php echo esc_attr(news_blog_get_setting('footer_color')); ?>;
        }
                
	</style>
<?php
}
add_action( 'wp_head', 'news_blog_custom_css' );


/* 
 * Get default setting if no saved settings 
 */

if ( ! function_exists( 'news_blog_get_setting' ) ) :

function news_blog_get_setting($setting_name){
    
    return get_theme_mod($setting_name, news_blog_default_settings($setting_name)); 
    
}

endif;


$news_blog_theme_data = wp_get_theme();
if( ! defined( 'news_blog_VERSION' ) ) define( 'news_blog_VERSION', $news_blog_theme_data->get( 'Version' ) );
if( ! defined( 'news_blog_NAME' ) ) define( 'news_blog_NAME', $news_blog_theme_data->get( 'Name' ) );

if ( ! function_exists( 'news_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function news_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on News Blog, use a find and replace
		 * to change 'news-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'news-blog', get_template_directory() . '/languages' );

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
        // Add featured image sizes
        add_image_size('news-blog-slider-full', 1280, 720, true); // width, height, crop
        add_image_size('news-blog-featured', 1024, 0, false); // width, height, crop
        add_image_size('news-blog-medium', 720, 530, true); // width, height, crop
        add_image_size('news-blog-medium-square', 350, 350, true); // width, height, crop
        
        
        /*
        * Enable support for Post Formats on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/post-formats/
        */
        add_theme_support( 'post-formats', array( 'image','audio', 'video', 'gallery' ) );
        

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'news-blog' ),
				'footer-menu'  => esc_html__( 'Footer Menu', 'news-blog' ),
                'top-bar-right-menu'  => esc_html__( 'Top Bar Right Menu', 'news-blog' ),
                'top-bar-left-menu'  => esc_html__( 'Top Bar Left Menu', 'news-blog' ),
			)
		);

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
				'news_blog_custom_background_args',
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
		add_theme_support(
			'custom-logo',
			array(
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size( 'news_blog_popular_posts', 447, 367, true );
		add_image_size( 'news_blog_archive', 420, 345, true );
		add_image_size( 'news_blog_editor', 446, 297, true );

	}
endif;
add_action( 'after_setup_theme', 'news_blog_setup' );

if( ! function_exists( 'news_blog_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'news_blog_content_width', 820 );
}
endif;
add_action( 'after_setup_theme', 'news_blog_content_width', 0 );

if( ! function_exists( 'news_blog_scripts' ) ) :

/**
 * Enqueue scripts and styles.
 */
function news_blog_scripts() {

	wp_enqueue_style( 'news-blog-google-fonts', news_blog_google_fonts_url(), array(), null );
    
    wp_enqueue_style( 'news-blog-bootstrap', get_template_directory_uri().'/css/bootstrap.css', array() );
    wp_enqueue_script( 'news-blog-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );


	wp_enqueue_style( 'news-blog-style', get_stylesheet_uri() );
	wp_style_add_data( 'news-blog-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'news-blog-navigation', get_template_directory_uri() . '/inc/assets/js/navigation.js', array(), news_blog_VERSION, true );

	wp_enqueue_script( 'news-blog-model', get_template_directory_uri() . '/js/modal.js', array(), news_blog_VERSION, true );
    
	wp_enqueue_script( 'news-blog--marquee', get_template_directory_uri() . '/js/jquery.marquee.js', array('jquery') );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'news-blog-custom', get_template_directory_uri() . '/js/custom.js',array( 'jquery' ), '', true );
		
}
endif;
add_action( 'wp_enqueue_scripts', 'news_blog_scripts' );



if ( ! function_exists( 'news_blog_admin_scripts' ) ) :
/**
 * Enqueue admin css
*/
function news_blog_admin_scripts() {
	wp_enqueue_style( 'news-blog-admin-style', get_template_directory_uri() . '/inc/assets/css/admin.css', array(),	news_blog_VERSION );
    
    //custom widget js
    wp_register_script( 'news-blog-custom-widgets', get_template_directory_uri().'/js/widget.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'news-blog-custom-widgets' );


}
endif;
add_action( 'admin_enqueue_scripts', 'news_blog_admin_scripts' );

/**
 * Elemenor Widget enqueue script
 */

add_action('elementor/editor/before_enqueue_scripts', function() {

    wp_register_script( 'news-blog-custom-widgets', get_template_directory_uri().'/js/widget.js', array( 'jquery' ), true );
	wp_enqueue_script( 'news-blog-custom-widgets' );

});

if( ! function_exists( 'news_blog_google_fonts_url' ) ) :
/**
 * Register google font.
 */
function news_blog_google_fonts_url() {
    $fonts_url = '';

  		/*
		 * Translators: If there are characters in your language that are not
		 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$typography = _x( 'on', 'Open Sans font: on or off', 'news-blog' ); 
	
		if ( 'off' !== $typography ) {
			$font_families = array();
			
			$font_families[] = news_blog_get_setting('heading_font').':300,300i,400,400i,700,700i';
			$font_families[] = news_blog_get_setting('body_font').':300,300i,400,400i,500,500i,600,600i';
			
	 
			$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);
			
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			
			
		} 

    return esc_url( $fonts_url );
}
endif;



if( ! function_exists( 'news_blog_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
	function news_blog_body_classes( $classes ) {

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if(  is_archive() || is_search() ){
			$classes[] = 'layout-grid';
		}

		if( get_background_image() ) {
			$classes[] = 'custom-background-image';
		}
		
		// Adds a class of custom-background-color to sites with a custom background color.
		if( get_background_color() != 'ffffff' ) {
			$classes[] = 'custom-background-color';
		}
        
        if( news_blog_get_setting('hide_product_cat_search')){
            $classes[] = 'hide-woo-search-cat';
        }
        
        if( !news_blog_get_setting('enable_sticky_menu')){
            $classes[] = 'disable-sticky-menu';
        }        

		$classes[] = news_blog_sidebar_layout();
        

		return $classes;
	}
endif;
add_filter( 'body_class', 'news_blog_body_classes' );

if( ! function_exists( 'news_blog_pingback_header' ) ) :
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function news_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
endif;
add_action( 'wp_head', 'news_blog_pingback_header' );

if ( ! function_exists( 'news_blog_widgets_init' ) ) :
/**
 * News Blog Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Best_Shop
 */
function news_blog_widgets_init(){    
    $sidebars = array(
        'sidebar-1'   => array(
            'name'        => __( 'Sidebar', 'news-blog' ),
            'id'          => 'sidebar-1', 
            'description' => __( 'Default Sidebar', 'news-blog' ),
        ),
        'woo-sidebar'   => array(
            'name'        => __( 'WooCommerce Sidebar', 'news-blog' ),
            'id'          => 'woo-sidebar', 
            'description' => __( 'WooCommerce Sidebar', 'news-blog' ),
        ),        
        'header-widget'      => array(
            'name'        => __( 'Homepage Advertisement', 'news-blog' ),
            'id'          => 'header-widget',
            'description' => __( 'Place an "Image" widget for advertisement in the homepage. Recommended image size is 1440px by 230px.', 'news-blog' ),
        ),
        'advanced-footer-widget-1'=> array(
            'name'        => __( 'Footer One', 'news-blog' ),
            'id'          => 'advanced-footer-widget-1', 
            'description' => __( 'Add footer one widgets here.', 'news-blog' ),
        ),
        'advanced-footer-widget-2'=> array(
            'name'        => __( 'Footer Two', 'news-blog' ),
            'id'          => 'advanced-footer-widget-2', 
            'description' => __( 'Add footer two widgets here.', 'news-blog' ),
        ),
        'advanced-footer-widget-3'=> array(
            'name'        => __( 'Footer Three', 'news-blog' ),
            'id'          => 'advanced-footer-widget-3', 
            'description' => __( 'Add footer three widgets here.', 'news-blog' ),
        ),
        'advanced-footer-widget-4'=> array(
            'name'        => __( 'Footer Four', 'news-blog' ),
            'id'          => 'advanced-footer-widget-4', 
            'description' => __( 'Add footer four widgets here.', 'news-blog' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name"><span>',
    		'after_title'   => '</span></h2>',
    	) );
    }

}
endif;
add_action( 'widgets_init', 'news_blog_widgets_init' );

/**
 * Custom Header
 */

 if ( ! function_exists( 'news_blog_custom_header_setup' ) ) :
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses news_blog_header_style()
 */
function news_blog_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'news_blog_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '#000000',
				'width'              => 1920,
				'height'             => 760,
				'flex-height'        => true,
				'video'         	 => true,
				'wp-head-callback'   => 'news_blog_header_style',
			)
		)
	);
	
}
endif;
add_action( 'after_setup_theme', 'news_blog_custom_header_setup' );

/**
 * Here we are displaying the header video in:
 * 1. Single page conditionally via: `is_page()` function
 * 2. Single post page conditionally via: `is_single()` function
 */
function news_blog_video_header_pages( $active ) {
    if ( is_home() || is_page() || is_single() ) {
        return true;
    }

    return false;
}

add_filter( 'is_header_video_active', 'news_blog_video_header_pages' );

/*
 * Header style
 */
if ( ! function_exists( 'news_blog_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see news_blog_custom_header_setup().
	 */
	function news_blog_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
        <?php       
        
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-tags2.php';

//require get_template_directory() . '/inc/widgets/product-slider.php';
//require get_template_directory() . '/inc/widgets/product-category-grid.php';
//require get_template_directory() . '/inc/widgets/tabbed-product-category.php';
//require get_template_directory() . '/inc/widgets/product-grid.php';
//require get_template_directory() . '/inc/widgets/tabbed-product-by-attribute.php';
//require get_template_directory() . '/inc/widgets/cat-list.php';

/**
 * Post slider widget
 */
require get_template_directory() . '/inc/widgets/post-slider.php';


/**
 * CTA Banner
 */
require get_template_directory() . '/inc/widgets/header-media.php';


/**
 * Newsletter
 */
require get_template_directory() . '/inc/widgets/newsletter.php';


/**
 * Social links
 */
require get_template_directory() . '/inc/widgets/social.php';


/***************
 * News / Post *
 ***************/
require get_template_directory() . '/inc/widgets/news.php';

/**
 * News / Post
 */
require get_template_directory() . '/inc/widgets/author.php';


/**
 * News Tags
 */
require get_template_directory() . '/inc/widgets/news-tags.php';

/**
 * News Marquee
 */
require get_template_directory() . '/inc/widgets/news-marquee.php';




/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

if (class_exists('WP_Customize_Control')) {
    
    /**
     * Custom Controls
     */
    require get_template_directory() . '/inc/controlset/custom-control.php';

    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/customizer/customizer.php';
   
}

/**
 *Partial refresh functions
 */
require get_template_directory() . '/inc/customizer/partial-refresh.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * TGM Plugin activation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( news_blog_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woo-functions.php';    
}

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

add_filter( 'news_blog_header_video_settings', 'news_blog_header_video_settings');
function news_blog_header_video_settings( $settings ) {
  $settings['l10n'] = array(
    'pause'      => __( 'Pause video', 'news-blog' ),
    'play'       => __( 'Start video', 'news-blog'),
    'pauseSpeak' => __( 'Video paused', 'news-blog'),
    'playSpeak'  => __( 'Video playing.', 'news-blog'),
  );
  return $settings;
}

/*
 * Header Style
 */

$news_blog_header_layout = array(   
    'customizer-setting'=> array(
    	 'value'     => 'customizer-setting',
    	 'label'     => __( 'Use Customizer Header Layout', 'news-blog' ),
   	),
    'woocommerce-bar'     => array(
    	 'value'     => 'woocommerce-bar',
    	 'label'     => __( 'Show WooCommerce Options Bar', 'news-blog' ),
    ),
    'transparent-header' => array(
         'value'     => 'transparent-header',
    	 'label'     => __( 'Transparent Header', 'news-blog' ),
    ),
);

function news_blog_get_header_style(){
    global $post;
    $layout = 'customizer-setting';
      if ($post){
          $layout = get_post_meta( $post->ID, '_news_blog_header_layout', true );
          if ($layout == 'transparent-header' && ( !is_page() )) {
              $layout = 'default';
          }
          return $layout;
      } else {
          return 'default';
      }
}

/*
 * Get category name and to an array once and reuse in widgets
 */
$news_blog_product_categories = array() ;

if(!class_exists('news_blog_Category_Item')) { 
class news_blog_Category_Item {
	public $image_url;
	public $link;
	public $name;
	public $count;
	public $id;
 }
}

function news_blog_set_all_product_categories () {
				$product_args = array(
						'taxonomy' => 'product_cat',
						'orderby' => 'date',
						'order' => 'ASC',
						'show_count' => 1,
						'pad_counts' => 0,
						'hierarchical' => 1,
						'title_li' => '',
						'hide_empty' => 1,
				);
				
				global $news_blog_product_categories;
				$news_blog_product_categories = array() ;

				$all_categories = get_categories($product_args);
				
				
				foreach ($all_categories as $cat) {

					$item = new news_blog_Category_Item();
					$item->name = ($cat->cat_name) ;
					$item->count = absint($cat->count);
					$item->id = ($cat->term_id);
					
					$thumbnail_id = get_term_meta($item->id, 'thumbnail_id', true);
										
					$item->image_url = wp_get_attachment_url($thumbnail_id);
					$item->link = esc_url(get_term_link($cat->slug, 'product_cat'));
					
					array_push($news_blog_product_categories, $item );				
				
				}
				
}


add_action( 'news_blog_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );


add_action( 'admin_enqueue_scripts', 'news_blog_load_admin_style' );
function news_blog_load_admin_style() {
    wp_enqueue_style( 'news_blog_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}


/**
 * Add cart to navigation menu
 */
function news_blog_add_search_form_to_menu($items, $args) {

  // If this isn't the main navbar menu, do nothing
  if(  !($args->theme_location == 'primary-menu') )
    return $items;
  // On main menu: put styling around search and append it to the menu items
  global $woocommerce;
  
  $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">'.
  			'<a id="woo-cart-menu-item"  class="cart-contents" href=""></a></li>'; 
  return $items;
}



if(class_exists('woocommerce')) {
	add_filter('wp_nav_menu_items', 'news_blog_add_search_form_to_menu', 10, 2); 
}


function news_blog_count_post_visits() {
   if( is_single() ) {
      global $post;
      $views = get_post_meta( $post->ID, 'my_post_viewed', true );
      if( $views == '' ) {
         update_post_meta( $post->ID, 'my_post_viewed', '1' );   
      } else {
         $views_no = intval( $views );
         update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
      }
   }
}
add_action( 'wp_head', 'news_blog_count_post_visits' );



/* 
 * code to add cart, back to top popup 
 */
add_action('wp_footer', 'news_blog_scroll_options');
function news_blog_scroll_options(){
    
    if(class_exists('WooCommerce') && is_product() && news_blog_get_setting('enable_popup_cart')) { ?>
    <div class="addtocart_btn">
        <?php 
            global $product;
            $news_blog_prod_id = $product->get_id(); 
            echo wp_kses_post(do_shortcode("[add_to_cart id=$news_blog_prod_id show_price='false' style='border:0px;padding:0px']")); 
        ?>
    </div>

    <?php } if(news_blog_get_setting('enable_back_to_top')) { ?>
    <div class="backtotop" style="bottom: 25px;" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  class="bi bi-arrow-up" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
    </svg></div>

<?php }
    
}


if($pagenow == 'index.php' || $pagenow == 'themes.php'){
    
    if ( isset( $_GET['hide_admin_notice'] ) ) {
         update_option('news_blog_hide_admin_notice', 'dismiss--notice');
    } else {
        $news_blog_notice = get_option('news_blog_hide_admin_notice', '');
        if ($news_blog_notice != 'dismiss--notice' || $news_blog_notice == '') {	
          add_action( 'admin_notices', 'news_blog_admin_notice_info' );
        }
    }
    
}

function news_blog_admin_notice_info() {
    
    $class = 'notice notice-info is-dismissible';
    $message = __( 'Appearance -> Customize -> Front page - Select posts as front page view. Edit home page sections and content.', 'news-blog' );
    $dismiss = __( 'Dismiss', 'news-blog');
    $tutorial = __( 'Theme tutorial', 'news-blog');
    if (function_exists('news_blog_pro_textdomain')){
        $tutorial = __( 'Theme Tutorial', 'news-blog');
    }
    printf( '<div class="%1$s"> <p> 
	
	<a class="news-blog-btn-get-started button button-primary news-blog-button-padding" href="#" data-name="" data-slug="" >'.esc_html__("Install Demos ... ","news-blog").'</a>	
	<a class="button button-primary news-blog-button-padding" target="_blank" href="'.esc_url( "https://wordpress.gradientthemes.com/blog/docs/news-blog-theme-tutorial/" ).'" ><b>'.$tutorial.'</b></a>
	<span>%2$s</span>&nbsp;&nbsp; <em><a href="?hide_admin_notice" target="_self"  class="dismiss-notice">%3$s</a></em> </p></div>', esc_attr( $class ), esc_html( $message ), esc_html( $dismiss ) ); 

}


function new_blog_post_page($title){
/* The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Best_Shop
 */
if($title) {
    echo '<div class="mag-sec-title">';
        echo '<h3 class="post-widget-title"><div>'.esc_html($title).'</div></h3>';
    echo '</div>';
}
news_blog_author_box(); ?>					
<div class="content-wrap-main">
    <?php if ( have_posts() ) : 
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            /*
             * Include the Post Type specific template for the content by get_post_type() fuction
             */
            get_template_part( 'template-parts/content', get_post_type() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</div>
<?php 
  news_blog_nav();
  get_template_part( 'template-parts/pagination' );                       
}

