<?php
/**
 * Template part for displaying results in search pages
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
	<div class="content-wrap">
		<header class="entry-header">
			<div class="entry-meta">
				<?php news_blog_category(); ?>
			</div>

			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		</header>
		<div class="entry-details">
			<div class="entry-content">
				<p><?php the_excerpt(); ?></p>
			</div>
			<?php news_blog_author_meta(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
