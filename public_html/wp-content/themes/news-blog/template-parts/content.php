<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Shop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	
	<div class="image">
		<?php news_blog_post_thumbnail(); ?>
	</div>

	<?php 
		if( ! is_front_page() ) echo '<div class="archive-content-wrapper">'; 
		/* 
		@hooked news_blog_entry_header 
		*/
		do_action( 'news_blog_post_entry_header' ); 
		/**
		 * @hooked news_blog_entry_content - 15
		 * @hooked news_blog_entry_footer - 20
		 */
		do_action( 'news_blog_post_entry_content' ); 
		
		if ( ! is_front_page() ) echo '</div>'; 
	?>

</article><!-- #post-<?php the_ID(); ?> -->
