<?php

/**
 * Google Fonts Option.
 * @package Best_Shop
 */
    
function news_blog_customize_register_font( $wp_customize ) {
    
    
    /** contact Page Settings */
    $wp_customize->add_section( 
        'google_font_settings',
         array(
            'priority'    => 47,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Fonts', 'news-blog' ),
            'description' => __( 'Customize Fonts.', 'news-blog' ),
            'panel'    => 'theme_options',
        ) 
    );
    
    
    
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_3', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_3', array(
              'label'	    => esc_html__( 'More options in Pro version:- Change Heading font', 'news-blog' ),
              'section' => 'google_font_settings',
              'settings' => 'header_lbl_3',
          )));
     }
    
    
	$wp_customize->add_setting(
		'heading_font',
		array(
			'default'           => news_blog_default_settings('heading_font'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'heading_font',
		array(
			'section'           => 'google_font_settings',
			'label'             => __( 'Heading Font Family:', 'news-blog' ),
			'type'              => 'text',
            'active_callback'   => 'news_blog_pro'
		)
	);

    //2
	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => news_blog_default_settings('body_font'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'body_font',
		array(
			'section'           => 'google_font_settings',
			'label'             => __( 'Body Font Family:', 'news-blog' ),
			'type'              => 'text',
		)
	);



}

add_action( 'customize_register', 'news_blog_customize_register_font' );


