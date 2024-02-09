<?php
/**
 * Active Callback
 * 
 * @package Best_Shop
*/


function news_blog_pro( $control ) {
    if( function_exists('news_blog_pro_textdomain')){
        return true;
    } else{
        return false;
    }
}

