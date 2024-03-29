<?php
/**
 * Footer Setting
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_footer' ) ) :

function news_blog_customize_register_footer( $wp_customize ) {
    
    
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_5', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_5', array(
              'label'	    => esc_html__( 'More options in Pro version:- Remove/edit default gradientthemes header link.', 'news-blog' ),
              'section' => 'footer_settings',
              'settings' => 'header_lbl_5',
          )));
     }  
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => esc_html__( 'Footer Settings', 'news-blog' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
            'panel'    => 'theme_options',
            'description' => __( 'Customize footer copyright and link. Footer link can be changed in Pro version.', 'news-blog' ),

        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => news_blog_default_settings('footer_copyright'),
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => esc_html__( 'Footer Copyright Text', 'news-blog' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector'        => '.footer-bottom .site-info .copy-right',
        'render_callback' => 'news_blog_get_footer_copyright',
    ) );
    
    
    //Link
    
    $wp_customize->add_setting(
        'footer_link',
        array(
            'default'           => news_blog_default_settings('footer_link'),
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
    'footer_link',
    array(
        'label'       => esc_html__( 'Footer Link', 'news-blog' ),
        'section'     => 'footer_settings',
        'type'        => 'url',
        'active_callback' => 'news_blog_pro',
    )
    );

    $wp_customize->selective_refresh->add_partial( 'footer_link', array(
    'selector'        => '.footer-bottom .site-info .link',
    'render_callback' => 'news_blog_get_footer_copyright',
    
    ) );
    
    
    // Footer    
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'     => news_blog_default_settings('footer_color'),
            'transport'   => 'refresh',				
            'sanitize_callback' => 'news_blog_sanitize_rgba_color',
        )
    );

    $wp_customize->add_control(
        new news_blog_Alpha_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label'         =>  __('Footer Background','news-blog' ),
                'section'       => 'footer_settings',					
                'settings'      => 'footer_color',
                'description'   =>  __('Drag alpha slider for transparency.', 'news-blog'),
                'show_opacity'  => true,
            )
        )
    );		

    
     
    // Footer text
    $wp_customize->add_setting( 
        'footer_text_color', 
        array(
            'default'           => news_blog_default_settings('footer_text_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'label'	    => esc_html__( 'Footer Text Color', 'news-blog' ),
        'section' => 'footer_settings',
        'settings' => 'footer_text_color'
 
    )));   
    
    

     /*-------------
     * BG IMAGE 
     ---------------*/    
    $wp_customize->add_setting( 'footer_img', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_img', array(
        'label' => __( 'Add Background Image' , 'news-blog'),
        'section' => 'footer_settings',
        'settings' => 'footer_img',
        'button_labels' => array(// All These labels are optional
                    'select' => __( 'Select Image' , 'news-blog'),
                    'remove' => __( 'Remove Image' , 'news-blog'),
                    'change' => __( 'Change Image' , 'news-blog'),
                    )
    )));
    
    

        
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_footer' );