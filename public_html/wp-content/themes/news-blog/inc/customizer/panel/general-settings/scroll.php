<?php
/**
 * SEO Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_scroll' ) ) :

function news_blog_customize_register_scroll( $wp_customize ) {
    
    
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_4', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_4', array(
              'label'	    => esc_html__( 'More options in Pro version:- Sticky menu.', 'news-blog' ),
              'section' => 'scroll_settings',
              'settings' => 'header_lbl_4',
          )));
     }    
    
    /** Scroll Settings */
    $wp_customize->add_section(
        'scroll_settings',
        array(
            'title'    => esc_html__( 'Scroll', 'news-blog' ),
            'priority' => 60,
            'panel'    => 'theme_options',
        )
    );
    
    $wp_customize->add_setting( 
        'enable_sticky_menu', 
        array(
            'default'           => news_blog_default_settings('enable_sticky_menu'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Toggle_Control( 
			$wp_customize,
			'enable_sticky_menu',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Sticky Menu', 'news-blog' ),
                'description' => esc_html__( 'Show Sticky Meny.', 'news-blog' ),
                'active_callback'   => 'news_blog_pro'
			)
		)
	);
    
    // Back to top
    $wp_customize->add_setting( 
        'enable_back_to_top', 
        array(
            'default'           => news_blog_default_settings('enable_back_to_top'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Toggle_Control( 
			$wp_customize,
			'enable_back_to_top',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Scroll to Top Button', 'news-blog' ),
                'description' => esc_html__( 'Enable the back to top button while scroll to bottom.', 'news-blog' ),
			)
		)
	);
    
    // Popup Cart
    $wp_customize->add_setting( 
        'enable_popup_cart', 
        array(
            'default'           => news_blog_default_settings('enable_popup_cart'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Toggle_Control( 
			$wp_customize,
			'enable_popup_cart',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Popup Add to cart', 'news-blog' ),
                'description' => esc_html__( 'Display add to cart button at the end of the product page.', 'news-blog' ),
			)
		)
	);    
    
    
}
endif;
add_action( 'customize_register', 'news_blog_customize_register_scroll' );