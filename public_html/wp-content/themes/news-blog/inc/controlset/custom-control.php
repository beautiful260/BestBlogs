<?php
/**
 * News Blog Custom Control
 * 
 * @package Best_Shop
*/

if( ! function_exists( 'news_blog_register_custom_controls' ) ) :
    /**
     * Register Custom Controls
    */
    function news_blog_register_custom_controls( $wp_customize ){    
        // Load our custom control.
        require_once get_template_directory() . '/inc/controlset/note/class-note-control.php';
        require_once get_template_directory() . '/inc/controlset/radioimg/class-radio-image-control.php';
        require_once get_template_directory() . '/inc/controlset/repeater/class-repeater-setting.php';
        require_once get_template_directory() . '/inc/controlset/repeater/class-control-repeater.php';
        require_once get_template_directory() . '/inc/controlset/toggle/class-toggle-control.php';    
        require_once get_template_directory() . '/inc/color-picker/alpha-color-picker.php';
        
        require_once get_template_directory() . '/inc/controlset/sortable/sortable.php';
                
        // Register the control type.
        $wp_customize->register_control_type( 'news_blog_Radio_Image_Control' );
        $wp_customize->register_control_type( 'news_blog_Toggle_Control' );
    }
    endif;
add_action( 'customize_register', 'news_blog_register_custom_controls' );


	if ( ! function_exists( 'news_blog_text_sanitization' ) ) {
		function news_blog_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}