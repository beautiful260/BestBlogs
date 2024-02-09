<?php
/**
 * Social Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_social_links' ) ) :

function news_blog_customize_register_social_links( $wp_customize ) {
    

    /** Enable top bar */    
    $wp_customize->add_setting( 
        'enable_top_bar', 
        array(
            'default'           => news_blog_default_settings('enable_top_bar'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Toggle_Control( 
			$wp_customize,
			'enable_top_bar',
			array(
				'section'     => 'header_top',
				'label'	      => esc_html__( 'Enable Top Bar', 'news-blog' ),
                'description' => esc_html__( 'Enable to show top bar above header.', 'news-blog' ),
			)
		)
	);
    
    
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_1', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_1', array(
              'label'	    => esc_html__( 'More options in Pro version:- Change top bar color and text color', 'news-blog' ),
              'section' => 'header_top',
              'settings' => 'header_lbl_1',
          )));
     }
    
    
    // top bar bgcolor
    $wp_customize->add_setting( 
        'topbar_bg_color', 
        array(
            'default'           => news_blog_default_settings('topbar_bg_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_bg_color', array(
        'label'	    => esc_html__( 'Top bar Background Color', 'news-blog' ),
        'section' => 'header_top',
        'settings' => 'topbar_bg_color',
        'active_callback' => 'news_blog_pro'
 
    )));
    
    // top bar text color
    $wp_customize->add_setting( 
        'topbar_text_color', 
        array(
            'default'           => news_blog_default_settings('topbar_text_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_text_color', array(
        'label'	    => esc_html__( 'Top bar Text Color', 'news-blog' ),
        'section' => 'header_top',
        'settings' => 'topbar_text_color',
        'active_callback' => 'news_blog_pro'
 
    )));


    /*--------------------------
     * SOCIAL LINKS SECTION
     --------------------------*/
    
    $wp_customize->add_section(
        'header_top',
        array(
            'panel'     => 'theme_options',
            'title'     => esc_html__( 'Top Bar/Social', 'news-blog' ),
            'priority'  => 10,
        )
    );
    

    /** 
     * Social Share Repeater 
     * */
    $wp_customize->add_setting( 
        new news_blog_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => news_blog_default_settings('social_links'),
                'sanitize_callback' => array( 'news_blog_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'header_top',
				'label'   => esc_html__( 'Social Links', 'news-blog' ),
				'fields'  => array(
                    'news_blog_icon' => array(
                        'type'        => 'select',
                        'label'       => esc_html__( 'Social Media', 'news-blog' ),
                        'choices'     => news_blog_get_svg_icons()
                    ),
                    'news_blog_link' => array(
                        'type'        => 'url',
                        'label'       => esc_html__( 'Link', 'news-blog' ),
                        'description' => esc_html__( 'Example: https://facebook.com', 'news-blog' ),
                    ),
                    'news_blog_checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => esc_html__( 'Open link in new tab', 'news-blog' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__( 'links', 'news-blog' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    
        
    $wp_customize->selective_refresh->add_partial( 'social_links', array(
	'selector' => '#masthead .social-links',
    ) );

    /*--------------------------
     * Top bar content
     --------------------------*/
  
    
    // Left Content
    $wp_customize->add_setting( 'top_bar_left_content', array(
          'capability' => 'edit_theme_options',
          'default' => news_blog_default_settings('top_bar_left_content'),
          'sanitize_callback' => 'news_blog_sanitize_radio',
    ) );

    $wp_customize->add_control( 'top_bar_left_content', array(
          'type' => 'radio',
          'section' => 'header_top', // Add a default or your own section
          'label' => esc_html__( 'Top Bar Left' ,'news-blog' ),
          'description' => esc_html__( 'Select Top Bar Left Content, You can edit menus from customizer menus section or dashboard. ', 'news-blog' ),
          'choices' => array(
              'none' => esc_html__( 'None' , 'news-blog'),
              'text' => esc_html__( 'Text' , 'news-blog'),
              'menu' => esc_html__( 'Menu (edit menus from customizer menus section )' , 'news-blog'),
              'contacts' => esc_html__( 'Contacts (edit contacts from contacts section )' , 'news-blog'),
              'datetime' => esc_html__( 'Date and time' , 'news-blog'),
          ),
        
          'active_callback' => 'news_blog_is_top_bar_enabled',   
        
    ) );
    
    $wp_customize->selective_refresh->add_partial( 'top_bar_left_content', array(
	'selector' => '#masthead .left-menu',
    ) );
    
    //check whether top bar enabled
    function news_blog_is_top_bar_enabled( $control ) {
        return ($control->manager->get_setting( 'enable_top_bar' )->value() );
    }     
    
    //check whether the text option active
    function news_blog_is_top_bar_text_enabled( $control ) {
        return ($control->manager->get_setting( 'top_bar_left_content' )->value() == 'text' && $control->manager->get_setting( 'enable_top_bar' )->value() );
    }    
    
    $wp_customize->add_setting( 'top_bar_left_text', array(
          'capability' => 'edit_theme_options',
          'default' => news_blog_default_settings('top_bar_left_text'),
          'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'top_bar_left_text', array(
        'type' => 'text',
        'section' => 'header_top', // Add a default or your own section
        'label' => __( 'Top Bar Left Text' ,'news-blog'),
        'description' => __( 'Add text to display on top bar left.' ,'news-blog'),
        'active_callback' => 'news_blog_is_top_bar_text_enabled',
    ) );
    
    
    
    
    /* 
     * Top bar right content 
     */
    
    $wp_customize->add_setting( 'top_bar_right_content', array(
          'capability' => 'edit_theme_options',
          'default' => news_blog_default_settings('top_bar_right_content'),
          'sanitize_callback' => 'news_blog_sanitize_radio',
    ) );

    $wp_customize->add_control( 'top_bar_right_content', array(
          'type' => 'radio',
          'section' => 'header_top', // Add a default or your own section
          'label' => __( 'Top Bar Right' ,'news-blog' ),
          'description' => __( 'Select Top Bar Right Content. You can edit menus from customizer menus section or dashboard.' ,'news-blog'),
          'choices' => array(
              'none' => __( 'None','news-blog' ),
              'menu' => __( 'Menu (edit menus from customizer menus section)' ,'news-blog'),
              'social' => __( 'Social (add / remove social links above)' ,'news-blog'),
              'menu_social' => __( 'Menu and Social' ,'news-blog' ),
          ),
        
          'active_callback' => 'news_blog_is_top_bar_enabled',
    ) ); 

    
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_social_links' );
