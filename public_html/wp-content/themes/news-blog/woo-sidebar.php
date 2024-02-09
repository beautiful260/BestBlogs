<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Shop
 */

$news_blog_sidebar = news_blog_sidebar_layout();

if ( $news_blog_sidebar == 'full-width' || $news_blog_sidebar == 'no-sidebar'){
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'woo-sidebar' ); ?>
</aside><!-- #secondary -->