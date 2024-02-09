<?php
/**
 * Social Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_header' ) ) :

function news_blog_customize_register_header( $wp_customize ) {
    
    

    /*--------------------------
     * SOCIAL LINKS SECTION
     --------------------------*/
    
    $wp_customize->add_section(
        'social_settings',
        array(
            'panel'     => 'theme_options',
            'title'         => esc_html__( 'Header Settings', 'news-blog' ),
            'priority'  => 11,
        )
    );
    
    /*----------------
     * HEADER STYLE
     -----------------*/ 
    
    $wp_customize->add_setting( 'header_layout', array(
          'capability' => 'edit_theme_options',
          'default' => news_blog_default_settings('header_layout'),
          'sanitize_callback' => 'news_blog_sanitize_radio',
    ) );
    
    
    $wp_customize->add_control( 'header_layout', array(
          'type' => 'radio',
          'section' => 'social_settings', // Add a default or your own section
          'label' => __( 'Header Style' ,'news-blog' ),
          'description' => __( 'Select Header Layout. You can customize each page header by editing each page settings.' , 'news-blog' ),
          'choices' => array(
              'default' => __( 'Default Header' , 'news-blog'),
              'woocommerce-bar' => __( 'WooCommerce Bar' , 'news-blog'),
              'transparent-header' => __( 'Transparent Header' , 'news-blog'),          
          ),
        
    ) );
    
    
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_2', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_2', array(
              'label'	    => esc_html__( 'More options in Pro version:- Change WooCommerce options bar color and text color', 'news-blog' ),
              'section' => 'social_settings',
              'settings' => 'header_lbl_2',
          )));
     }
    
    /*------------
     * WOO BAR COLOR
     ------------*/
    // woocommerce bar text color
    $wp_customize->add_setting( 
        'woo_bar_color', 
        array(
            'default'           => news_blog_default_settings('woo_bar_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woo_bar_color', array(
        'label'	    => esc_html__( 'WooCommerce Bar Text Color', 'news-blog' ),
        'section' => 'social_settings',
        'settings' => 'woo_bar_color',
        'active_callback' => 'news_blog_pro'
    ))); 
    
    // woocommerce bar color
    $wp_customize->add_setting( 
        'woo_bar_bg_color', 
        array(
            'default'           => news_blog_default_settings('woo_bar_bg_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woo_bar_bg_color', array(
        'label'	    => esc_html__( 'WooCommerce Bar Background Color', 'news-blog' ),
        'section' => 'social_settings',
        'settings' => 'woo_bar_bg_color',
        'active_callback' => 'news_blog_pro'
        
    )));
    

    /** Enable/ Disable WooCommerce search category ist */
    $wp_customize->add_setting( 
        'hide_product_cat_search', 
        array(
            'default'           => news_blog_default_settings('hide_product_cat_search'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'hide_product_cat_search',
            array(
                'section'     => 'social_settings',
                'label'	      => esc_html__( 'Hide Product Categories', 'news-blog' ),
                'description' => esc_html__( 'Hide product categories in WooCommerce Bar Product search.', 'news-blog' ),
            )
        )
    );
    
    
    //Category title
	$wp_customize->add_setting(
		'woo_category_title',
		array(
			'default'           => news_blog_default_settings('woo_category_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'woo_category_title',
		array(
			'section'           => 'social_settings',
			'label'             => __( 'WooCommerce Bar Category Title', 'news-blog' ),
			'type'              => 'text',
		)
	);
    
    $wp_customize->selective_refresh->add_partial( 'woo_category_title', array(
	'selector' => '#masthead .categories-menu',
    ) );  
    
    
    /*----------------
     * MENU STYLE
     -----------------*/ 
    
    $wp_customize->add_setting( 'menu_layout', array(
          'capability' => 'edit_theme_options',
          'default' => news_blog_default_settings('menu_layout'),
          'sanitize_callback' => 'news_blog_sanitize_radio',
    ) );
    
    
    $wp_customize->add_control( 'menu_layout', array(
          'type' => 'radio',
          'section' => 'social_settings', // Add a default or your own section
          'label' => __( 'Menu Style / Layout' ,'news-blog' ),
          'description' => __( 'Select Menu Layout. Change header text color from color section. Full with menu color can be given from below.' , 'news-blog' ),
          'choices' => array(
              'default' => __( 'Default Menu' , 'news-blog'),
              'full_width' => __( 'Full Width Menu & Top Banner' , 'news-blog'),
          ),
        
    ) );
    
    //check whether top bar enabled
    function news_blog_is_fullwidth_menu_enabled( $control ) {
        return ($control->manager->get_setting( 'menu_layout' )->value() === 'full_width' );
    } 
    
    
    // menu text color
    $wp_customize->add_setting( 
        'menu_text_color', 
        array(
            'default'           => news_blog_default_settings('menu_text_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
        'label'	    => esc_html__( 'Full Wdith Menu Text Color', 'news-blog' ),
        'section' => 'social_settings',
        'settings' => 'menu_text_color',
        'active_callback' => 'news_blog_is_fullwidth_menu_enabled',
    )));
    
    // menu bg color
    $wp_customize->add_setting( 
        'menu_bg_color', 
        array(
            'default'           => news_blog_default_settings('menu_bg_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bg_color', array(
        'label'	    => esc_html__( 'Menu Background Color', 'news-blog' ),
        'section' => 'social_settings',
        'settings' => 'menu_bg_color',
        'active_callback' => 'news_blog_is_fullwidth_menu_enabled',
    )));   
    
    
     /*-------------
     * BANNER IMAGE 
     ---------------*/    
    $wp_customize->add_setting( 'header_banner_img', array(
        'capability' => 'edit_theme_options',
        //'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_banner_img', array(
        'label' => __( 'Upload/Select Banner' , 'news-blog'),
        'section' => 'social_settings',
        'settings' => 'header_banner_img',
        'button_labels' => array(// All These labels are optional
                    'select' => __( 'Select Banner' , 'news-blog'),
                    'remove' => __( 'Remove Banner' , 'news-blog'),
                    'change' => __( 'Change Banner' , 'news-blog'),
                    ),
        'active_callback' => 'news_blog_is_fullwidth_menu_enabled',
    )));    
    

    /** Enable Search */
    $wp_customize->add_setting( 
        'enable_search', 
        array(
            'default'           => news_blog_default_settings('enable_search'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox',
        ) 
    );
    
    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_search',
            array(
                'section'     => 'social_settings',
                'label'	      => esc_html__( 'Enable Menu Search Icon', 'news-blog' ),
                'description' => esc_html__( 'Enable to show Search icon in Menu.', 'news-blog' ),
            )
        )
    );
    
  
    

    
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_header' );
