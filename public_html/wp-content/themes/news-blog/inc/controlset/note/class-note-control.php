<?php
/**
 * News Blog Customizer Note Control.
 * 
 * @package Best_Shop
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'news_blog_Notice_Control' ) ){

	class news_blog_Notice_Control extends WP_Customize_Control {
		
		public function render_content(){ ?>
            <div class="customizer_note_control">
            <a href="https://www.gradientthemes.com/product/news-blog-pro-theme/"  target="_blank">
    	    <span class="customize-control-title">
    			<?php echo wp_kses_post( $this->label ); ?>
    		</span>
            </a>
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post( $this->description ); ?>
    			</span>
    		<?php
            }
            ?></div><?php                           
        }
	}
}