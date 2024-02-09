<?php
/* 
 * display product grid from given product category
 */

class news_blog_newsletter_widget extends WP_Widget {

function __construct() {
		
		parent::__construct(
		  
		// Base ID of your widget
		'news_blog_newsletter_widget', 
		  
		// Widget name will appear in UI
		__('+ Newsletter', 'news-blog'), 
		  
		// Widget description
		array( 'description' => __( 'Display the newsletter email form', 'news-blog' ), ) 
		);    
}

public function widget( $args, $instance ) {
    
    
    $newsletter_shortcode = ( ! empty( $instance['newsletter_shortcode'] ) ) ? wp_strip_all_tags( $instance['newsletter_shortcode'] ) : '';

    if( $newsletter_shortcode ){ ?>
        <section id="newsletter_section" class="newsletter-section">
            
                <div class="dt-newsletter-wrapper">
                    <div class="gradientthemes-email-newsletter-wrapper">
                      <div class="right-wrapper">
                          <?php 
                              if( $newsletter_shortcode ) echo do_shortcode( $newsletter_shortcode ); 
                          ?>
                      </div>
                    </div>
                </div>
           
        </section>
    <?php }

}
		
public function form( $instance ) {
    
    $newsletter_shortcode = ( ! empty( $instance['newsletter_shortcode'] ) ) ? wp_strip_all_tags( $instance['newsletter_shortcode'] ) : '';
    
     ?>

    <p>
        <?php echo esc_html__('Install Newsletter plugin and copy and paste shortcode here. Keep the background colour,image intact.', 'news-blog'); ?>
    </p>

    <p>
    <label for="<?php echo esc_attr($this->get_field_id( 'newsletter_shortcode' )); ?>"><?php esc_html_e( 'Newsletter Shortcode:', 'news-blog'  ); ?></label> 
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'newsletter_shortcode' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'newsletter_shortcode' )); ?>" type="text" value="<?php echo esc_attr( $newsletter_shortcode ); ?>" />
    </p>



    <?php 
    }

public function update( $new_instance, $old_instance ) {

		$instance = array();
    
        $instance['newsletter_shortcode'] = ( ! empty( $new_instance['newsletter_shortcode'] ) ) ? wp_strip_all_tags( $new_instance['newsletter_shortcode'] ) : '';
		
		return $instance;
	 }
}

function news_blog_newsletter_widget() {
		register_widget( 'news_blog_newsletter_widget' );
}
add_action( 'widgets_init', 'news_blog_newsletter_widget' );