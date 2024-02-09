<?php
/* 
 * display soial links
 */


class news_blog_social_link_widget extends WP_Widget {

function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'news_blog_social_link_widget', 
		  
		// Widget name will appear in UI
		__('+ Social Links', 'news-blog'), 
		  
		// Widget description
		array( 'description' => __( 'Social Links specified in theme options - top bar.', 'news-blog' ), ) 
		);
}

    
public function widget( $args, $instance ) {

    $title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		$colums = (!empty($instance['colums'])) ?  wp_strip_all_tags($instance['colums']) : "col-md-6 col-sm-6 col-lg-6 col-xs-12";
            
    
  ?><div class="widget post-widget-container"><?php
		
		if($title) {
			echo '<div class="mag-sec-title">';
				echo '<h3 class="post-widget-title"><div>'.esc_html($title).'</div></h3>';
			echo '</div>';
		}
		
  
    ?>

    <div class="widget-social-contancts">
        <?php
            $social_links = news_blog_get_setting( 'social_links' );
            
            if($social_links ){ ?>
            <ul class="social-links">
                <?php 
                foreach( $social_links as $link ){
                    $new_tab = isset( $link['news_blog_checkbox'] ) && $link['news_blog_checkbox'] ? '_blank' : '_self';
                    if( isset( $link['news_blog_link'] ) ){ ?>
                    <li class="<?php echo esc_attr($colums); ?>">
                        <div class="social-content">
                          <a href="<?php echo esc_url( $link['news_blog_link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                              <?php echo wp_kses( news_blog_social_icons_svg_list( $link['news_blog_icon'] ), news_blog_kses_extended_ruleset() ); ?>
                           <div class="icon-name"><?php echo wp_strip_all_tags($link['news_blog_icon']); ?></div>                       
                          </a>
                        </div>
                    </li>	   
                    <?php
                    } 
                } 
                ?>
            </ul>
    </div>    
    <?php
    }
    ?></div><?php
}
		
public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? wp_strip_all_tags( $instance['title'] ) : '';
		$colums = (!empty($instance['colums'])) ?  wp_strip_all_tags($instance['colums']) : "col-md-6 col-sm-6 col-lg-6 col-xs-6";
     
		//columns
		$product_colums = array(
				"col-md-12 col-sm-12 col-lg-12 col-xs-12" => 1,
				"col-md-6 col-sm-12 col-lg-6 col-xs-12" => 2,
				"col-md-4 col-sm-12 col-lg-4 col-xs-12" => 3,
				"col-md-3 col-sm-12 col-lg-3 col-xs-12" => 4,
				"col-sm-2" => 5,
				"col-md-2 col-sm-12 col-lg-2 col-xs-12" => 6,
				
		);				

        ?>
     
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','news-blog'  ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'colums' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

        <p><?php echo esc_html__('Add social links in theme options -> social section ', 'news-blog'); ?></p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('colums')); ?>"><?php esc_html_e('Number of colums:', 'news-blog'); ?></label> 
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id('colums')); ?>" name="<?php echo esc_attr($this->get_field_name('colums')); ?>" type="text">
		<?php
				foreach ($product_colums as $key => $value) {
						if ($key == $colums) {
								echo '<option value="' . esc_attr($key) . '" Selected=selected>' . esc_html($value) . '</option>';
						}
						else {
								echo '<option value="' . esc_attr($key) . '" >' . esc_html($value) . '</option>';
						}
				}
		?>
		</select>
		</p>
		
		<?php 
		}

public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '' ;
		$instance['colums'] = ( ! empty( $new_instance['colums'] ) ) ? wp_strip_all_tags( $new_instance['colums'] ) : '';
		
		return $instance;
	 }
}

function news_blog_social_link_widget() {
		register_widget( 'news_blog_social_link_widget' );
}
add_action( 'widgets_init', 'news_blog_social_link_widget' );