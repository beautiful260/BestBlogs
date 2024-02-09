<?php
/**
 * Best_Shop Customizer Partials
 *
 * @package Best_Shop
 */

if( ! function_exists( 'news_blog_customize_partial_blogname' ) ) :
/* Render the site title for the selective refresh partial.
 *
 * @return void
 */
function news_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}
endif;

if( ! function_exists( 'news_blog_customize_partial_blogdescription' ) ) :
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function news_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
endif;



if( ! function_exists( 'news_blog_instagram_title' ) ) :
/**
 * Instagram Section Title
*/
function news_blog_instagram_title(){
    return news_blog_get_setting( 'instagram_title' );
}
endif;

if( ! function_exists( 'news_blog_related_posts_title' ) ) :
/**
 * Related Posts Title
*/
function news_blog_related_posts_title(){
    return news_blog_get_setting( 'related_post_title' );
}
endif;


if( ! function_exists( 'news_blog_banner_title' ) ) :
/**
 * Banner Title
*/
function news_blog_banner_title(){
    return news_blog_get_setting( 'banner_title');
}
endif;

if( ! function_exists( 'news_blog_banner_content' ) ) :
/**
 * Banner Content
*/
function news_blog_banner_content(){
    return news_blog_get_setting( 'banner_content');
}
endif;

if( ! function_exists( 'news_blog_banner_btn_label' ) ) :
/**
 * Banner Button Label
*/
function news_blog_banner_btn_label(){
    return news_blog_get_setting( 'banner_btn_label' );
}
endif;

if( ! function_exists( 'news_blog_banner_btn_two_label' ) ) :
/**
 * Banner Button Two Label
*/
function news_blog_banner_btn_two_label(){
    return news_blog_get_setting( 'banner_btn_two_label' );
}
endif;


if( ! function_exists( 'news_blog_get_footer_copyright' ) ) :
/**
 * Show Author link in footer
*/
function news_blog_get_footer_copyright(){
    
    $footer_link = news_blog_get_setting( 'footer_link' ) ;
    
    $copyright = news_blog_get_setting( 'footer_copyright' );
    
    apply_filters('news_blog_footer_link', $footer_link);
    
    echo '<span class="copy-right">';
    
    if($copyright === ''){
            echo ' <a href="' . esc_url($footer_link) . '">' . esc_html('A theme by Gradient Themes ©' , 'news-blog') . '</a> ';
    }else{
            echo ' <a href="' . esc_url($footer_link) . '">' . wp_kses_post(news_blog_get_setting( 'footer_copyright' )) . '</a> ';
    }
        echo '</span>';
    }
    endif;

if( ! function_exists( 'news_blog_ed_author_link' ) ) :
/**
 * Show Author link in footer
*/
function news_blog_ed_author_link(){
    
    echo '<span class="author-link">'; 
    esc_html_e( 'Developed By ', 'news-blog' );
    echo '<a href="' . esc_url( news_blog_get_setting('footer_link') ) .'" rel="nofollow" target="_blank" class="link">' . esc_html__( 'Gradient Themes', 'news-blog' ) . '</a>';
    echo '</span>';
    
}
endif;



