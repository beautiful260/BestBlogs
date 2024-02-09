<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'blog_and_earn_cfg_locale_css' ) ):
  function blog_and_earn_cfg_locale_css( $uri ){
      if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
          $uri = get_template_directory_uri() . '/rtl.css';
      return $uri;
  }
endif;
add_filter( 'locale_stylesheet_uri', 'blog_and_earn_cfg_locale_css' );

if ( !function_exists( 'blog_and_earn_cfg_parent_css' ) ):
  function blog_and_earn_cfg_parent_css() {
      wp_enqueue_style( 'blog_and_earn_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'news-blog-bootstrap' ) ); // import parent stylesheets - news-blog-bootstrap
  }
endif;
add_action( 'wp_enqueue_scripts', 'blog_and_earn_cfg_parent_css', 10 );


// END ENQUEUE PARENT ACTION

// SETTINGS
add_filter( 'news_blog_settings', 'blog_and_earn_settings' );

function blog_and_earn_settings( $values ) {


       $values['home_header_sections'] = 'tags,marquee,header_post';
       $values['home_body_sections'] = 'slider,post_1,post_2,post_3,post_4';
       $values['home_footer_sections'] = 'footer_post_1,footer_post_2';


       $values['heading_font'] = 'PT Serif';
       $values['body_font'] = 'Nunito Sans';

       $values['footer_copyright'] = '';
       $values['footer_color'] = ' #9d0000';
       $values['footer_text_color'] = '#fff';

       $values['primary_color'] = '#007bff';
       $values['secondary_color'] = '#32B9A5';

       $values['woo_bar_color'] = '#fff';
       $values['woo_bar_bg_color'] = '#007bff';

       $values['menu_text_color'] = '#fff';
       $values['menu_bg_color'] = '#e52525';
       $values['text_color'] = '#0c0c0c';

       $values['topbar_bg_color'] = '#000';
       $values['topbar_text_color'] = '#fff';

       $values['preloader_enabled'] = false;

       $values['logo_width'] = '130';

       $values['layout_width'] = '1280';

       $values['enable_search'] = true;
       $values['ed_social_links'] = true;
       $values['social_links'] = '';

       $values['header_layout'] = 'woocommerce-bar';
       $values['hide_product_cat_search'] = false;
       $values['menu_layout'] = 'default';
       $values['header_banner_img'] = '';

       $values['enable_sticky_menu'] = true;
       $values['enable_back_to_top'] = true;
       $values['enable_popup_cart'] = true;

       $values['enable_top_bar'] = true;     
       $values['top_bar_left_content'] = 'datetime';
       $values['top_bar_left_text'] = esc_html__('edit top bar text', 'blog-and-earn');
       $values['top_bar_right_content'] = 'menu_social';
       $values['enable_top_bar_datetime'] = true;



       $values['footer_text_color'] = '#eee';
       $values['footer_color'] = '#004895';
       $values['footer_link'] = 'https://gradientthemes.com/';
       $values['footer_img'] = '';

       $values['subscription_shortcode'] = '';

return $values;

}


if ( ! function_exists( 'blog_and_earn_customize_register' ) ) :
  /**
   * Add postMessage support for site title and description for the Theme Customizer.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
   */
  function blog_and_earn_customize_register( $wp_customize ) {

    $wp_customize->add_section(
          'subscription_settings',
          array(
              'title'      => esc_html__( 'Email Subscription', 'blog-and-earn' ),
              'priority'   => 199,
              'capability' => 'edit_theme_options',
              'panel'    => 'theme_options',
              'description' => __( 'Add email subscription plugin shortcode.', 'blog-and-earn' ),

          )
      );

      /** Footer Copyright */
      $wp_customize->add_setting(
          'subscription_shortcode',
          array(
              'default'           => news_blog_default_settings('subscription_shortcode'),
              'sanitize_callback' => 'sanitize_text_field',
              'transport'         => 'postMessage'
          )
      );

      $wp_customize->add_control(
          'subscription_shortcode',
          array(
              'label'       => esc_html__( 'Subscription Plugin Shortcode', 'blog-and-earn' ),
              'section'     => 'subscription_settings',
              'type'        => 'text',
          )
      );        


  }
endif;
add_action( 'customize_register', 'blog_and_earn_customize_register' );

//shortcode below header
function blog_and_earn_header_subscribe() {
   $newsletter_shortcode = news_blog_default_settings('subscription_shortcode');
   echo do_shortcode( wp_kses_post($newsletter_shortcode) ); 
}

add_action( 'news_blog_before_posts_content', 'blog_and_earn_header_subscribe' );



