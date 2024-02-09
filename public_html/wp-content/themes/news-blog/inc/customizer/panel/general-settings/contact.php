<?php

/**
 * Contact Page Theme Option.
 * @package Best_Shop
 */
    
function news_blog_customize_register_contact_details( $wp_customize ) {
    
    
    /** contact Page Settings */
    $wp_customize->add_section( 
        'contact_page_settings',
         array(
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Contacts', 'news-blog' ),
            'description' => __( 'Customize contact section details', 'news-blog' ),
            'panel'    => 'theme_options',
        ) 
    );
    
    
	$wp_customize->add_setting(
		'address_title',
		array(
			'default'           => news_blog_default_settings('address_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'address_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Address Title', 'news-blog' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'address',
		array(
			'default'           => news_blog_default_settings('address'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'address',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Address', 'news-blog' ),
			'type'              => 'text',
		)
	);
    



	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           =>  news_blog_default_settings('mail_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Mail Title', 'news-blog' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'mail_description',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'mail_description',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Email Address(es)', 'news-blog' ),
			'description'		=> __( 'Add multiple emails by seperating it with comma.', 'news-blog' ), 
			'type'              => 'text',
		)
	);

       
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           =>  news_blog_default_settings('phone_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Phone Title', 'news-blog' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => news_blog_default_settings('phone_number'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Phone Number(s)', 'news-blog' ),
			'description'       => __( 'Add multiple phone number seperating with comma', 'news-blog' ),
			'type'              => 'text',
		)
	);
    

}

add_action( 'customize_register', 'news_blog_customize_register_contact_details' );


