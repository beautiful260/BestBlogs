<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-image">
		<?php 
		/**
		 * Post thumbnail
		 */
		news_blog_post_thumbnail(); 
		/**
		 * Entry Header
		 */
		do_action( 'news_blog_post_entry_header' );
		?>		
	</div>
	<div>
		<?php 
		/**
		 * @hooked news_blog_entry_content - 15
		 * @hooked news_blog_entry_footer - 20
		 */
		do_action( 'news_blog_post_entry_content' ) ; 
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
