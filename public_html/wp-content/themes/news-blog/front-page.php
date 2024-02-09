<?php
get_header();

if ( 'posts' == get_option( 'show_on_front' ) || '' == get_option( 'show_on_front' ) ) {
       
    /**
     * home sections
     */
    
   get_template_part( 'template-parts/template', 'home' );


} else {
    include( get_home_template() );
}
get_footer();