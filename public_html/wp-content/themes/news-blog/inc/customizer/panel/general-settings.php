<?php
/**
 * General Settings
 * 
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_theme_options' ) ) :
    
function news_blog_customize_register_theme_options( $wp_customize ) {
	
    /** General Settings Settings */
    $wp_customize->add_panel( 
        'theme_options',
            array(
            'priority'    => 6,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'THEME OPTIONS', 'news-blog' ),
        ) 
    );    
 
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_theme_options' );