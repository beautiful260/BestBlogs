<?php
/* 
 * author widget
 */

class news_blog_author_widget extends WP_Widget {

function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'news_blog_author_widget', 
		  
		// Widget name will appear in UI
		__('+ Author', 'news-blog'), 
		  
		// Widget description
		array( 'description' => __( 'Display author image , description and social links.', 'news-blog' ), ) 
		);
}

    
public function widget( $args, $instance ) {

     $title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
     $description = ( ! empty( $instance['description'] ) ) ? wp_strip_all_tags( $instance['description'] ) : '';
     $name = ( ! empty( $instance['name'] ) ) ? wp_strip_all_tags( $instance['name'] ) : '';
     $image_uri = ( ! empty( $instance['image_uri'] ) ) ? wp_strip_all_tags( $instance['image_uri'] ) : '';
            
    
 ?><div class="widget post-widget-container"><?php
		
		if($title) {
			echo '<div class="mag-sec-title">';
				echo '<h3 class="post-widget-title"><div>'.esc_html($title).'</div></h3>';
			echo '</div>';
		}
		
		   
    ?>

    <div class="author-widget">
        <div class="posts-author-wrapper">

          <span class="author-image">
          <img src="<?php echo esc_url($image_uri); ?>" alt="">
          </span>

          <div class="author-details">
            <h4 class="author-name"><?php echo esc_html($name); ?></h4>
                <p class="author-description"><?php echo esc_html($description); ?></p>
          </div>
          <?php
          $social_links = news_blog_get_setting( 'social_links' );
          if( $social_links ){ ?>
          <ul class="social-links">
              <?php 
              foreach( $social_links as $link ){
                  $new_tab = isset( $link['news_blog_checkbox'] ) && $link['news_blog_checkbox'] ? '_blank' : '_self';
                  if( isset( $link['news_blog_link'] ) ){ ?>
                  <li>
                      <a href="<?php echo esc_url( $link['news_blog_link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                          <?php echo wp_kses( news_blog_social_icons_svg_list( $link['news_blog_icon'] ), news_blog_kses_extended_ruleset() ); ?>
                      </a>
                  </li>	   
                  <?php
                  } 
              } 
              ?>
         </ul>
        <?php } ?>
        </div>
    </div>
    
</div>

<?php

}
		
public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		$description = ( ! empty( $instance['description'] ) ) ? wp_strip_all_tags( $instance['description'] ) : '';
		$name = ( ! empty( $instance['name'] ) ) ? wp_strip_all_tags( $instance['name'] ) : '';
		$image_uri = ( ! empty( $instance['image_uri'] ) ) ? esc_url( $instance['image_uri'] ) : '';

        ?>
     
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','news-blog'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>		
     
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'name' )); ?>"><?php esc_html_e( 'Author Name:','news-blog'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'name' )); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php esc_html_e( 'description:','news-blog'  ); ?>
        </label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
		</p>

        <p>
         <label for="<?php echo esc_url($this->get_field_id('image_uri')); ?>">
             <?php esc_html_e( 'Select Image', 'news-blog' ); ?>
         </label>
          <br />
         <?php
             if ($image_uri != '' ) :
                 echo '<img class="custom_media_image" src="' . esc_url( $image_uri ) . '" style="max-width:275px;border: 2px solid #e1e1e1;" />';
             endif;
         ?>

         <input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php 
           if ($image_uri) :
             echo esc_url( $image_uri );
            endif;
          ?>">
         <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php esc_attr_e('Upload Image','news-blog')?>" />
        </p>

    <?php 
		}

public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '' ;
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? wp_strip_all_tags( $new_instance['name'] ) : '' ;
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? wp_strip_all_tags( $new_instance['description'] ) : '';
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? esc_url_raw( $new_instance['image_uri'] ) : '';    
		
		return $instance;
	 }
}

function news_blog_author_widget() {
		register_widget( 'news_blog_author_widget' );
}
add_action( 'widgets_init', 'news_blog_author_widget' );