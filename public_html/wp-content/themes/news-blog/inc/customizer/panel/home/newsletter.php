<?php
/**
 * Newsletter Settings
 * 
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_newsletter_frontpage_settings' ) ) :

function news_blog_newsletter_frontpage_settings( $wp_customize ){
    
	$wp_customize->add_section( 'news_blog_newsletter', 
	    array(
	        'title'         => esc_html__( 'Newsletter Section', 'news-blog' ),
	        'priority'      => 30,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    /** Hide Newsletter Section */
    $wp_customize->add_setting( 
        'enable_newsletter_section', 
        array(
            'default'           => news_blog_default_settings('enable_newsletter_section'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_newsletter_section',
            array(
                'section'     => 'news_blog_newsletter',
                'label'	      => esc_html__( 'Hide Newsletter Section', 'news-blog' ),
                'description' => esc_html__( 'Enable to hide newsletter section.', 'news-blog' ),
            )
        )
    );

    $wp_customize->add_setting(
        'newsletter_shortcode',
        array(
            'default'           => news_blog_default_settings('newsletter_shortcode'),
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'newsletter_shortcode',
        array(
            'label'             => esc_html__( 'Newsletter Shortcode', 'news-blog' ),
            'description'       => esc_html__( 'Please download Blossom Themes Email Newsletter and place the shortcode for newsletter section', 'news-blog' ),
            'type'              => 'text',
            'section'           => 'news_blog_newsletter',
        )
    );
}
endif;
add_action( 'customize_register', 'news_blog_newsletter_frontpage_settings' );