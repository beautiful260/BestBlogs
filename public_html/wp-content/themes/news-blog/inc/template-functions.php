<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Best_Shop
 */

if( ! function_exists( 'news_blog_doctype' ) ) :
	/**
	 * Doctype Declaration
	*/
	function news_blog_doctype(){
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'news_blog_doctype', 'news_blog_doctype' );

if( ! function_exists( 'news_blog_head' ) ) :
	/**
	 * Before wp_head 
	*/
	function news_blog_head(){
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
	}
endif;
add_action( 'news_blog_before_wp_head', 'news_blog_head' );

if( ! function_exists( 'news_blog_page_start' ) ) :
	/**
	 * Page Start
	*/
	function news_blog_page_start(){
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'news-blog' ); ?></a>
		<?php
	}
endif;
add_action( 'news_blog_before_header', 'news_blog_page_start' );



if( ! function_exists( 'news_blog_primary_page_header' ) ) :
/**
 * Page Header
*/
function news_blog_primary_page_header(){ 
	if( is_front_page() ) return;

	if( is_search() || is_home() || is_archive() || is_singular( 'product' ) ){ ?>
		<header class="page-header">
			<div class="container">
				<div class="breadcrumb-wrapper">
					<?php news_blog_breadcrumb(); ?>
				</div>
				<?php 
				if( news_blog_is_woocommerce_activated() && is_singular( 'product' ) ){
					the_title( '<h2 class="page-title">','</h2>' ); 
				}
				if( is_search() ) { ?>
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html( '%s', 'news-blog' ), get_search_query() );
						?>
					</h1>
				<?php } elseif( is_home() && ! is_front_page() ) { 	?>			
					<h1 class="page-title">
						<?php echo esc_html( news_blog_get_setting( 'blog_section_title' ) ); ?>
					</h1>					
				<?php }
				 elseif ( is_archive() ) { 	
					if( news_blog_is_woocommerce_activated() && is_shop() ){
						echo '<h1 class="page-title">';
						echo esc_html( get_the_title( wc_get_page_id( 'shop' ) ) );
						echo '</h1>';
					}elseif( is_author() ){
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}else{
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
				} ?>
			</div>
		</header><!-- .page-header -->
	<?php 
	}
}
endif;
add_action( 'news_blog_before_posts_content', 'news_blog_primary_page_header', 10 );

if( ! function_exists( 'news_blog_entry_header' ) ) :
/**
 * Entry Header
*/
function news_blog_entry_header(){ 
	if ( is_single() ) { ?>
		<header class="entry-header">
			<div class="category--wrapper">
				<?php news_blog_category(); ?>
			</div>
			<div class="entry-title-wrapper">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</div>
			<?php news_blog_single_author_meta(); ?>
		</header>
	<?php } else { ?>
		<header class="entry-header">
			<div class="entry-meta">
				<?php news_blog_category(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-details">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );	?>
			</div>
		</header><!-- .entry-header -->
	<?php }
}
endif;
add_action( 'news_blog_post_entry_header', 'news_blog_entry_header' );

if( ! function_exists( 'news_blog_entry_content' ) ) :
/**
 * Entry Content
*/
function news_blog_entry_content(){ 
	if( is_front_page() ) return;
	?>
	<div class="entry-content" itemprop="text">
		<?php
			if( is_singular() ){
				the_content();    
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-blog' ),
					'after'  => '</div>',
				) );
			}elseif( is_archive() ){
				the_excerpt();
				news_blog_author_meta();
			}else{
				the_excerpt();
			}
		?>
	</div><!-- .entry-content -->
	<?php
}
endif;
add_action( 'news_blog_post_entry_content', 'news_blog_entry_content', 15 );

if( ! function_exists( 'news_blog_entry_footer' ) ) :
/**
 * Entry Footer
*/
function news_blog_entry_footer(){ 

	if( is_single() ){ ?>
		<footer class="entry-footer">
			<?php
				news_blog_tag();
				if( get_edit_post_link() ){
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'news-blog' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				}
			?>
		</footer><!-- .entry-footer -->
	<?php }
}
endif;
add_action( 'news_blog_post_entry_content', 'news_blog_entry_footer', 20 );


		
if( ! function_exists( 'news_blog_mail' ) ) :
/**
 * Mail Settings
 */
function news_blog_mail(){
	$mail_title       = news_blog_get_setting( 'mail_title' );
	$mail_address     = news_blog_get_setting( 'mail_description' );
	$emails           = explode( ',', $mail_address);
	if( $mail_title || $mail_address ){ ?>
		<div class="email-wrapper">
			<li>
				<div class="email-wrap">
					<div class="icon">
						<?php echo wp_kses( news_blog_social_icons_svg_list( 'email' ), news_blog_kses_extended_ruleset() ); ?>	
					</div>
				</div>
				<div class="email-details">
					<?php if( $mail_title ){ ?>
						<span class="email-title">
							<?php echo esc_html( $mail_title ); ?>
						</span>
					<?php }
					if( $mail_address ){ ?>
						<div class="email-desc">
							<?php foreach( $emails as $email ){ ?>
								<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>" class="email-link">
									<?php echo esc_html( $email ); ?>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</li>
		</div>
	<?php }
}
endif;
add_action( 'news_blog_contact_page_details', 'news_blog_mail', 20 );
		
if( ! function_exists( 'news_blog_phone' ) ) :
/**
 * Phone Settings
 */
function news_blog_phone(){
	$phone_title        = news_blog_get_setting( 'phone_title' ); 
	$phone_number       = news_blog_get_setting( 'phone_number' ); 

	$phones = explode( ',', $phone_number);

	if( $phone_title || $phone_number ){ ?>
		<div class="phone-wrapper">
			<li>
				<div class="phone-wrap">
					<div class="icon">
					<?php echo wp_kses( news_blog_social_icons_svg_list( 'phone' ), news_blog_kses_extended_ruleset() ); ?>					
					</div>
				</div>
				<div class="phone-details">
					<?php if( $phone_title ){ ?>
						<span class="phone-title">
							<?php echo esc_html( $phone_title ); ?>
						</span>
					<?php } 
					if( $phone_number ){ ?>
						<div class="phone-number">
							<?php foreach( $phones as $phone ){ ?>
								<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="tel-link">
									<?php echo esc_html( $phone ); ?>
								</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</li>
		</div>
	<?php }
}
endif;
add_action( 'news_blog_contact_page_details', 'news_blog_phone', 30 );