<?php
/**
 * SEO Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_general_seo' ) ) :

function news_blog_customize_register_general_seo( $wp_customize ) {
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => esc_html__( 'Breadcrumb Settings', 'news-blog' ),
            'priority' => 40,
            'panel'    => 'theme_options',
        )
    );
    
    $wp_customize->add_setting( 
        'enable_breadcrumb', 
        array(
            'default'           => news_blog_default_settings('enable_breadcrumb'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Toggle_Control( 
			$wp_customize,
			'enable_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => esc_html__( 'Enable Breadcrumb', 'news-blog' ),
                'description' => esc_html__( 'Show breadcrumb in inner pages.', 'news-blog' ),
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => news_blog_default_settings('home_text'),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => esc_html__( 'Breadcrumb Home Text', 'news-blog' ),
        )
    );  
    /** SEO Settings Ends */
    
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_general_seo' );