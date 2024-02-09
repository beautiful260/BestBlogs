<?php
/* 
 * display popular tags
 */

class news_blog_news_tags_widget extends WP_Widget {


function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'news_blog_news_tags_widget', 
		  
		// Widget name will appear in UI
		__('+ News: Popular Tags', 'news-blog'), 
		  
		// Widget description
		array( 'description' => __( 'Display Popular Posts Tags.', 'news-blog' ), ) 
		);
}

public function widget( $args, $instance ) {

		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : 6;
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		
?>

            <div class="gth-popular-tags">
                <div class="container-wrapper">
                    <?php
                        news_blog_list_popular_taxonomies('post_tag', $title, $max_items);
                    ?>
                </div>
            </div>



<?php

}
		
public function form( $instance ) {

		$max_items = ( ! empty( $instance['max_items'] ) ) ? absint( $instance['max_items'] ) : '6';
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		
        ?>	

		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','news-blog'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>"><?php esc_html_e( 'Number of Posts to Show:','news-blog'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'max_items' )); ?>" type="number" value="<?php echo absint( $max_items ); ?>" />
		</p>
				
			
		<?php
		}

public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['max_items'] = ( ! empty( $new_instance['max_items'] ) ) ? absint( $new_instance['max_items'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '' ;
		
		return $instance;
	 }
}

function news_blog_news_tags_widget() {
		register_widget( 'news_blog_news_tags_widget' );
}
add_action( 'widgets_init', 'news_blog_news_tags_widget' );

