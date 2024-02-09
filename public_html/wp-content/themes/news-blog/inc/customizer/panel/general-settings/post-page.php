<?php
/**
 * Miscellaneous Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'news_blog_customize_register_post_page_settings' ) ) :

function news_blog_customize_register_post_page_settings( $wp_customize ) {

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => esc_html__( 'Post Settings', 'news-blog' ),
            'priority' => 20,
            'panel'    => 'theme_options',
        )
    );

    /** Line break */
    $wp_customize->add_setting(
        'post_page_note_text',
        array(
            'default'           => news_blog_default_settings('post_page_note_text'),
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new news_blog_Notice_Control( 
            $wp_customize,
            'post_page_note_text',
            array(
                'section'	  => 'post_page_settings',
                'label'       => esc_html__( 'Single Post Settings', 'news-blog' )                
            )
        )
    ); 
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'enable_post_author', 
        array(
            'default'           => news_blog_default_settings('enable_post_author'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide Author', 'news-blog' ),
                'description' => esc_html__( 'Enable / Disable author below post title.', 'news-blog' ),
            )
        )
    );

    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'enable_post_date', 
        array(
            'default'           => news_blog_default_settings('enable_post_date'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide Posted Date', 'news-blog' ),
                'description' => esc_html__( 'Enable / Disable posted date below post title.', 'news-blog' ),
            )
        )
    );
    
    /** Hide Comment count in Banner meta */
    $wp_customize->add_setting( 
        'enable_banner_comments', 
        array(
            'default'           => news_blog_default_settings('enable_banner_comments'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_banner_comments',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide comments', 'news-blog' ),
                'description' => esc_html__( 'Enable / Disable comment number below post title.', 'news-blog' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'enable_post_read_calc', 
        array(
            'default'           => news_blog_default_settings('enable_post_read_calc'),
            'sanitize_callback' => 'news_blog_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new news_blog_Toggle_Control( 
            $wp_customize,
            'enable_post_read_calc',
            array(
                'section'     => 'post_page_settings',
                'label'       => esc_html__( 'Hide Post Reading Calculation', 'news-blog' ),
                'description' => esc_html__( 'Enable / Disable post reading calculation.', 'news-blog' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'read_words_per_minute', 
        array(
            'default'           => news_blog_default_settings('read_words_per_minute'),
            'sanitize_callback' => 'news_blog_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(          
        'read_words_per_minute',
        array(
            'section'     => 'post_page_settings',
            'label'       => esc_html__( 'Read Words Per Minute', 'news-blog' ),
            'type'        => 'number',
            'input_attrs'     => array(
                'min'   => 100,
                'max'   => 1000,
                'step'  => 10,
            ) ,
            'description'     => esc_html__( 'An estimated reading time encourages users to read through to the end of a post, since they know how much time it will take.', 'news-blog' ),
        )
    );

    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => news_blog_default_settings('related_post_title'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => esc_html__( 'Related Posts Section Title', 'news-blog' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector'        => '.additional-post h3.post-title',
        'render_callback' => 'news_blog_related_posts_title',
    ) );

}
endif;
add_action( 'customize_register', 'news_blog_customize_register_post_page_settings' );