<?php
/**
 * Newsletter Settings
 * 
 * @package Best_Shop
 */
if ( !function_exists( 'news_blog_home_page_settings' ) ):

  function news_blog_home_page_settings( $wp_customize ) {

      
    /* home sections order */
    $wp_customize->add_section(
      'home_options',
      array(
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'title' => __( '1. Home Sections settings', 'news-blog' ),
        'description' => __( 'Customize home page sections. 1. You can drag and drop sections to reorder. 2. Cick on section to show/hide ', 'news-blog' ),
      )
    );
      
    /* home sections */
    $wp_customize->add_panel(
      'home_sections',
      array(
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'title' => __( '2. Home Sections contents', 'news-blog' ),
        'description' => __( 'Home Page Sections', 'news-blog' ),
      )
    );
      
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_8', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_8', array(
              'label'	    => esc_html__( 'More options in Pro version:- Sort and change order of header sections', 'news-blog' ),
              'section' => 'home_options',
              'settings' => 'header_lbl_8',
          )));
     }  
      

    // home_header_sections
    $wp_customize->add_setting( 'home_header_sections',
      array(
        'default' => news_blog_default_settings( 'home_header_sections' ),
        'sanitize_callback' => 'news_blog_text_sanitization'
      )
    );
    $wp_customize->add_control( new news_blog_Pill_Checkbox_Custom_Control( $wp_customize, 'home_header_sections',
      array(
        'label' => __( 'Header Sections', 'news-blog' ),
        'description' => esc_html__( 'Enable / disable and sort home sections', 'news-blog' ),
        'section' => 'home_options',
        'input_attrs' => array(
          'sortable' => news_blog_pro(null) ,
          'fullwidth' => true,
        ),
        'choices' => array(
          'tags' => __( 'News Tags', 'news-blog' ),
          'marquee' => __( 'News Marquee', 'news-blog' ),
          'header_post' => __( 'Header Posts', 'news-blog' ),
        )
      )
    ) );


 
    /* NOTE */
     if (!function_exists('news_blog_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_7', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new news_blog_Notice_Control( $wp_customize, 'header_lbl_7', array(
              'label'	    => esc_html__( 'More options in Pro version:- Sort and change order of body sections', 'news-blog' ),
              'section' => 'home_options',
              'settings' => 'header_lbl_7',
          )));
     }       
      
    // home_body_sections
    $wp_customize->add_setting( 'home_body_sections',
      array(
        'default' => news_blog_default_settings( 'home_body_sections' ),
        'sanitize_callback' => 'news_blog_text_sanitization'
      )
    );
    $wp_customize->add_control( new news_blog_Pill_Checkbox_Custom_Control( $wp_customize, 'home_body_sections',
      array(
        'label' => __( 'Body Sections', 'news-blog' ),
        'description' => esc_html__( 'Enable / disable and sort home sections', 'news-blog' ),
        'section' => 'home_options',
        'input_attrs' => array(
          'sortable' => news_blog_pro(null) ,
          'fullwidth' => true,
        ),
        'choices' => array(
          'slider' => __( 'Post Slider', 'news-blog' ),
          'blog' => __( 'Blog posts with Navigation', 'news-blog' ),  
          'post_1' => __( 'Post 1', 'news-blog' ),
          'post_2' => __( 'Post 2', 'news-blog' ),
          'post_3' => __( 'Post 3', 'news-blog' ),
          'post_4' => __( 'Post 4', 'news-blog' ),
          '2_column' => __( 'Post 2 Column', 'news-blog' ),
        )
      )
    ) );
      
      
      
    // home_footer_sections
    $wp_customize->add_setting( 'home_footer_sections',
      array(
        'default' => news_blog_default_settings( 'home_footer_sections' ),
        'sanitize_callback' => 'news_blog_text_sanitization'
      )
    );
    $wp_customize->add_control( new news_blog_Pill_Checkbox_Custom_Control( $wp_customize, 'home_footer_sections',
      array(
        'label' => __( 'Above Footer Sections', 'news-blog' ),
        'description' => esc_html__( 'Enable / disable and sort above footer sections', 'news-blog' ),
        'section' => 'home_options',
        'input_attrs' => array(
          'sortable' => true,
          'fullwidth' => true,
        ),
        'choices' => array(
          'footer_post_1' => __( 'Post 1', 'news-blog' ),
          'footer_post_2' => __( 'Post 2', 'news-blog' ),

        )
      )
    ) );

      
      
   /** Body layout */
    $wp_customize->add_setting( 
        'home_body_layout', 
        array(
            'default'           => news_blog_default_settings('home_body_layout'),
            'sanitize_callback' => 'news_blog_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new news_blog_Radio_Image_Control(
			$wp_customize,
			'home_body_layout',
			array(
				'section'	  => 'home_options',
				'label'		  => esc_html__( 'Home Template Sidebar Layout', 'news-blog' ),
				'description' => esc_html__( 'Select front page display settings to post. Then change home page layout to left sidebar, right sidebar or full width.', 'news-blog' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',           
					'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
				)
			)
		)
	);
      


    /************************
     * Home header contents *
     ************************/
      
    /*
     * Tags
     */      
    $wp_customize->add_section(
      'home_section_tags',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post Tags', 'news-blog' ),
        'description' => __( 'Home Page Slider Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
      
    // title
    $wp_customize->add_setting( 'hs_tags_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_tags_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_tags_title', array(
      'type' => 'text',
      'section' => 'home_section_tags',
      'label' => __( 'Tags Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) );
      

    //setting 2
    $wp_customize->add_setting( 'hs_tags_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_tags_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_tags_count', array(
      'type' => 'number',
      'section' => 'home_section_tags',
      'label' => __( 'Number of Tags to Show' , 'news-blog' ),
      'description' => __( 'Select Number of tags to Show.' , 'news-blog' ),
    ) );
      
      
    /*
     * Marquee
     */      
    $wp_customize->add_section(
      'home_section_marquee',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Marquee', 'news-blog' ),
        'description' => __( 'Home Page Slider Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_marquee_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_marquee_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
       

    $wp_customize->add_control( 'hs_marquee_title', array(
      'type' => 'text',
      'section' => 'home_section_marquee',
      'label' => __( 'Marquee Title', 'news-blog' ),
      'description' => __( 'Enter a section title.', 'news-blog' ),
    ) );
      
      
    //setting 1
    $wp_customize->add_setting( 'hs_marquee_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_marquee_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_marquee_cat', array(
      'type' => 'select',
      'section' => 'home_section_marquee',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      

    //setting 2
    $wp_customize->add_setting( 'hs_marquee_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_marquee_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_marquee_count', array(
      'type' => 'number',
      'section' => 'home_section_marquee',
      'label' => __( 'Number of Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
      
    /*
     * Header post 1
     */
      
    $wp_customize->add_section(
      'home_header_post_1',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Header Post 1', 'news-blog' ),
        'description' => __( 'Home Page Header Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
    // title
    $wp_customize->add_setting( 'hs_header_post_1_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_header_post_1_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_header_post_1_title', array(
      'type' => 'text',
      'section' => 'home_header_post_1',
      'label' => __( 'Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.', 'news-blog' ),
    ) );
      
      
    //setting 1
    $wp_customize->add_setting( 'hs_header_post_1_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_header_post_1_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_header_post_1_cat', array(
      'type' => 'select',
      'section' => 'home_header_post_1',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_header_post_1_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_header_post_1_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_header_post_1_col', array(
      'type' => 'select',
      'section' => 'home_header_post_1',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );

      
    //setting 3
    $wp_customize->add_setting( 'hs_header_post_1_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_header_post_1_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_header_post_1_layout', array(
      'type' => 'select',
      'section' => 'home_header_post_1',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_header_post_1_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_header_post_1_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_header_post_1_count', array(
      'type' => 'number',
      'section' => 'home_header_post_1',
      'label' => __( 'Number Posts to Show', 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );

    // setting height
    $wp_customize->add_setting( 'hs_header_post_1_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_header_post_1_height', array(
      'type' => 'number',
      'section' => 'home_header_post_1',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) );
      
     /************************
     * Home body contents *
     ************************/
      
    /*
     * Slider
     */
      
    $wp_customize->add_section(
      'home_section_slider_1',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Slider', 'news-blog' ),
        'description' => __( 'Home Page Slider Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
    //setting 1
    $wp_customize->add_setting( 'hs_slider_1_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_slider_1_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_slider_1_cat', array(
      'type' => 'select',
      'section' => 'home_section_slider_1',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_slider_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_slider_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_slider_count', array(
      'type' => 'number',
      'section' => 'home_section_slider_1',
      'label' => __( 'Number of Slides to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Slides to Show.' , 'news-blog' ),
    ) );
      
    /*
     * Home blog posts with navigation setion
     */
      
    $wp_customize->add_section(
      'home_section_blog_navigation',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post section with navigation', 'news-blog' ),
        'description' => __( 'This section will display sites blog posts with post navigation like a blog site.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
  
      
    // title
    $wp_customize->add_setting( 'home_section_blog_navigation_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'home_section_blog_navigation_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'home_section_blog_navigation_title', array(
      'type' => 'text',
      'section' => 'home_section_blog_navigation',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) );       
      
      
    /*
     * Home post 1
     */
      
      
    $wp_customize->add_section(
      'home_section_post_1',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post 1', 'news-blog' ),
        'description' => __( 'Home Page Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_post_1_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_1_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_1_title', array(
      'type' => 'text',
      'section' => 'home_section_post_1',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) );      
      
    //setting 1
    $wp_customize->add_setting( 'hs_post_1_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_1_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_1_cat', array(
      'type' => 'select',
      'section' => 'home_section_post_1',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_post_1_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_1_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_1_col', array(
      'type' => 'select',
      'section' => 'home_section_post_1',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_post_1_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_1_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_post_1_layout', array(
      'type' => 'select',
      'section' => 'home_section_post_1',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_post_1_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_1_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_1_count', array(
      'type' => 'number',
      'section' => 'home_section_post_1',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
    // setting height
    $wp_customize->add_setting( 'hs_post_1_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_1_height', array(
      'type' => 'number',
      'section' => 'home_section_post_1',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) );      
      

    /*
     * Home post 2
     */
      
    $wp_customize->add_section(
      'home_section_post_2',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post 2', 'news-blog' ),
        'description' => __( 'Home Page Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
       
      
    // title
    $wp_customize->add_setting( 'hs_post_2_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_2_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_2_title', array(
      'type' => 'text',
      'section' => 'home_section_post_2',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) ); 
      
    // setting 1
    $wp_customize->add_setting( 'hs_post_2_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_2_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_2_cat', array(
      'type' => 'select',
      'section' => 'home_section_post_2',
      'label' => __( 'Select category', 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_post_2_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_2_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_2_col', array(
      'type' => 'select',
      'section' => 'home_section_post_2',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_post_2_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_2_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_post_2_layout', array(
      'type' => 'select',
      'section' => 'home_section_post_2',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_post_2_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_2_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_2_count', array(
      'type' => 'number',
      'section' => 'home_section_post_2',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
    // setting height
    $wp_customize->add_setting( 'hs_post_2_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_2_height', array(
      'type' => 'number',
      'section' => 'home_section_post_2',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) ); 
      
    /*
     * Home post 3
     */
      
    $wp_customize->add_section(
      'home_section_post_3',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post 3', 'news-blog' ),
        'description' => __( 'Home Page Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_post_3_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_3_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_3_title', array(
      'type' => 'text',
      'section' => 'home_section_post_3',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) ); 
      
    // setting 1
    $wp_customize->add_setting( 'hs_post_3_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_3_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_3_cat', array(
      'type' => 'select',
      'section' => 'home_section_post_3',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_post_3_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_3_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_3_col', array(
      'type' => 'select',
      'section' => 'home_section_post_3',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_post_3_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_3_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_post_3_layout', array(
      'type' => 'select',
      'section' => 'home_section_post_3',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
      
    // setting count
    $wp_customize->add_setting( 'hs_post_3_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_3_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_3_count', array(
      'type' => 'number',
      'section' => 'home_section_post_3',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
    // setting height
    $wp_customize->add_setting( 'hs_post_3_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_3_height', array(
      'type' => 'number',
      'section' => 'home_section_post_3',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) ); 
      
    /*
     * Home post 4
     */
      
    $wp_customize->add_section(
      'home_section_post_4',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Post 4', 'news-blog' ),
        'description' => __( 'Home Page Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_post_4_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_4_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_4_title', array(
      'type' => 'text',
      'section' => 'home_section_post_4',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) ); 
      
    // setting 1
    $wp_customize->add_setting( 'hs_post_4_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_4_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_4_cat', array(
      'type' => 'select',
      'section' => 'home_section_post_4',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_post_4_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_4_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_post_4_col', array(
      'type' => 'select',
      'section' => 'home_section_post_4',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_post_4_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_4_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_post_4_layout', array(
      'type' => 'select',
      'section' => 'home_section_post_4',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_post_4_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_post_4_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_4_count', array(
      'type' => 'number',
      'section' => 'home_section_post_4',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
      
    // setting height
    $wp_customize->add_setting( 'hs_post_4_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_post_4_height', array(
      'type' => 'number',
      'section' => 'home_section_post_4',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) ); 
      

    /*
     * Home double column
     */
      
    $wp_customize->add_section(
      'home_section_post_double',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Double column Sectons', 'news-blog' ),
        'description' => __( 'Home Page double column Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_double_title_1', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_title_1' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_title_1', array(
      'type' => 'text',
      'section' => 'home_section_post_double',
      'label' => __( 'Section 1 Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) ); 
      
    // setting 1
    $wp_customize->add_setting( 'hs_double_cat_1', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_cat_1' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_cat_1', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select category 1' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_double_col_1', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_col_1' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_col_1', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_double_layout_1', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_layout_1' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_double_layout_1', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_double_count_1', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_count_1' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_double_count_1', array(
      'type' => 'number',
      'section' => 'home_section_post_double',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
      
    //double column section 2
  
      
    // title
    $wp_customize->add_setting( 'hs_double_title_2', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_title_2' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_title_2', array(
      'type' => 'text',
      'section' => 'home_section_post_double',
      'label' => __( 'Section 2 Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) ); 
      
    // setting 1
    $wp_customize->add_setting( 'hs_double_cat_2', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_cat_2' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_cat_2', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select category 2' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_double_col_2', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_col_2' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_double_col_2', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_double_layout_2', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_layout_2' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_double_layout_2', array(
      'type' => 'select',
      'section' => 'home_section_post_double',
      'label' => __( 'Select section 3 Layout', 'news-blog' ),
      'description' => __( 'Description.', 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_double_count_2', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_double_count_2' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_double_count_2', array(
      'type' => 'number',
      'section' => 'home_section_post_double',
      'label' => __( 'Number Posts to Show', 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.', 'news-blog' ),
    ) ); 
          
      
      
     /************************
     * Home  footer contents *
     *************************/
    /*
     * Footer post 1
     */
      
    $wp_customize->add_section(
      'home_footer_post_1',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Home Footer Posts', 'news-blog' ),
        'description' => __( 'Home Page Footer Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
      
    // title
    $wp_customize->add_setting( 'hs_footer_post_1_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_1_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_footer_post_1_title', array(
      'type' => 'text',
      'section' => 'home_footer_post_1',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) );
      
    //setting 1
    $wp_customize->add_setting( 'hs_footer_post_1_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_1_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_footer_post_1_cat', array(
      'type' => 'select',
      'section' => 'home_footer_post_1',
      'label' => __( 'Select category' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_footer_post_1_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_1_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      
      
    // title
    $wp_customize->add_setting( 'hs_footer_post_2_title', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_2_title' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_footer_post_2_title', array(
      'type' => 'text',
      'section' => 'home_footer_post_2',
      'label' => __( 'Section Title' , 'news-blog' ),
      'description' => __( 'Enter a section title.' , 'news-blog' ),
    ) );

    $wp_customize->add_control( 'hs_footer_post_1_col', array(
      'type' => 'select',
      'section' => 'home_footer_post_1',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_footer_post_1_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_1_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_footer_post_1_layout', array(
      'type' => 'select',
      'section' => 'home_footer_post_1',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
    // setting count
    $wp_customize->add_setting( 'hs_footer_post_1_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_1_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_footer_post_1_count', array(
      'type' => 'number',
      'section' => 'home_footer_post_1',
      'label' => __( 'Number Posts to Show' , 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.' , 'news-blog' ),
    ) );
      
      
    // setting height
    $wp_customize->add_setting( 'hs_footer_post_1_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_footer_post_1_height', array(
      'type' => 'number',
      'section' => 'home_footer_post_1',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) ); 
      
      
    /*
     * Footer post 2
     */
      
    $wp_customize->add_section(
      'home_footer_post_2',
      array(
        'capability' => 'edit_theme_options',
        'title' => __( 'Home Footer Posts 2', 'news-blog' ),
        'description' => __( 'Home Page Footer Post Section. Edit post category, type and layout . You can edit section order from home panel.', 'news-blog' ),
        'panel' => 'home_sections',
      )
    );
      
    //setting 1
    $wp_customize->add_setting( 'hs_footer_post_2_cat', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_2_cat' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_footer_post_2_cat', array(
      'type' => 'select',
      'section' => 'home_footer_post_2',
      'label' => __( 'Select category', 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_category_list(), //Add the list with options
    ) );         
      
      
    //setting 2
    $wp_customize->add_setting( 'hs_footer_post_2_col', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_2_col' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'hs_footer_post_2_col', array(
      'type' => 'select',
      'section' => 'home_footer_post_2',
      'label' => __( 'Select Columns' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_column_list(),
    ) );
      
      
    //setting 3
    $wp_customize->add_setting( 'hs_footer_post_2_layout', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_2_layout' ),
      'sanitize_callback' => 'sanitize_text_field'
    ) );
      

    $wp_customize->add_control( 'hs_footer_post_2_layout', array(
      'type' => 'select',
      'section' => 'home_footer_post_2',
      'label' => __( 'Select Layout' , 'news-blog' ),
      'description' => __( 'Description.' , 'news-blog' ),
      'choices' => news_blog_get_layout_list(),
    ) );
      
      
    // setting count
    $wp_customize->add_setting( 'hs_footer_post_2_count', array(
      'capability' => 'edit_theme_options',
      'default' => news_blog_default_settings( 'hs_footer_post_2_count' ),
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_footer_post_2_count', array(
      'type' => 'number',
      'section' => 'home_footer_post_2',
      'label' => __( 'Number Posts to Show', 'news-blog' ),
      'description' => __( 'Select Number of Posts to Show.', 'news-blog' ),
    ) );
      
    // setting height
    $wp_customize->add_setting( 'hs_footer_post_2_height', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'hs_footer_post_2_height', array(
      'type' => 'number',
      'section' => 'home_footer_post_2',
      'label' => __( 'Post Max Image Height (px)', 'news-blog' ),
      'description' => __( 'Max image height in pixels.' , 'news-blog' ),
    ) );
      
      
    // --------------selective refresh----------------------
    $wp_customize->selective_refresh->add_partial( 'hs_tags_title', array(
	'selector' => '.gth-popular-tags ul',
    ) );

      
    $wp_customize->selective_refresh->add_partial( 'hs_marquee_title', array(
	'selector' => '.banner-exclusive-posts-wrapper .gth-ripple',
    ) ); 
        
    $wp_customize->selective_refresh->add_partial( 'hs_header_post_1_title', array(
	   'selector' => '#header_post_1 .mag-sec-title',
    ) );
      
      
      
      
    $wp_customize->selective_refresh->add_partial( 'hs_slider_1_cat', array(
	   'selector' => '#body_slider',
    ) );
      
    $wp_customize->selective_refresh->add_partial( 'home_section_blog_navigation_title', array(
	   'selector' => '#home_post_blog .mag-sec-title',
    ) );      
      
    $wp_customize->selective_refresh->add_partial( 'hs_post_1_count', array(
	   'selector' => '#home_post_1 .mag-sec-title',
    ) );
    $wp_customize->selective_refresh->add_partial( 'hs_post_2_count', array(
	   'selector' => '#home_post_2 .mag-sec-title',
    ) );
    $wp_customize->selective_refresh->add_partial( 'hs_post_3_count', array(
	   'selector' => '#home_post_3 .mag-sec-title',
    ) );
    $wp_customize->selective_refresh->add_partial( 'hs_post_4_count', array(
	   'selector' => '#home_post_4 .mag-sec-title',
    ) ); 
    $wp_customize->selective_refresh->add_partial( 'hs_double_title_1', array(
	   'selector' => '#body_double_column .double_col_1',
    ) );   
      
    $wp_customize->selective_refresh->add_partial( 'hs_double_title_2', array(
	   'selector' => '#body_double_column .double_col_2',
    ) );      
      
    $wp_customize->selective_refresh->add_partial( 'hs_footer_post_1_title', array(
	   'selector' => '#footer_post_1 .mag-sec-title',
    ) );  
    $wp_customize->selective_refresh->add_partial( 'hs_footer_post_2_title', array(
	   'selector' => '#footer_post_2 .mag-sec-title',
    ) );  
      
      
  }
endif;
add_action( 'customize_register', 'news_blog_home_page_settings' );

