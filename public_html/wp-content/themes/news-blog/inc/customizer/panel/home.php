<?php
/**
 * Front Page Settings
 * 
 * @package Best_Shop
 */
if ( ! function_exists( 'news_blog_customize_register_frontpage' ) ) :

function news_blog_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'Front Page Settings', 'news-blog' ),
            'description' => esc_html__( 'Static Home Page settings.', 'news-blog' ),
        )
    );    
      
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_frontpage' );