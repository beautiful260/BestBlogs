<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Best_Shop
 */

if ( ! function_exists( 'news_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function news_blog_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
		
		$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
		);
    
    	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	
		echo '<span class="posted-on">' . $posted_on . '</span>'; 

	}
endif;

if ( ! function_exists( 'news_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function news_blog_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'news-blog' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
		);

		echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'news_blog_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function news_blog_post_thumbnail() {
	
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) :

            if(has_post_thumbnail()): 
        ?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
			</div><!-- .post-thumbnail -->

              <?php
              $caption = get_the_post_thumbnail_caption();

              if ( $caption ) {
                  ?>

                  <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

                  <?php
              }           

		      endif; 
        
              else : 
        ?>

			<figure class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php if( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'news_blog_popular_posts', array( 'itemprop' => 'image' ) );
                                                      
                    $caption = get_the_post_thumbnail_caption();

                    if ( $caption ) {
                        ?>

                        <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

                        <?php
                    }                                                      
                                                      
					}else{
						news_blog_get_fallback_svg( 'news_blog_popular_posts' );
					} ?>
                    
				</a>
			</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		/**
         * Triggered after the opening <body> tag.
         *
         */
		do_action( 'wp_body_open' );
	}
endif;

if( ! function_exists( 'news_blog_get_posts' ) ) :
	/**
	 * Fuction to list Custom Post Type
	*/
	function news_blog_get_posts( $post_type = 'post', $slug = false ){   
        $limit_post = -1;
		$args = array(
			'posts_per_page'   => $limit_post,
			'post_type'        => $post_type,
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$posts_array = get_posts( $args );
		
		// Initate an empty array
		$post_options = array();
		$post_options[''] = __( ' -- Choose -- ', 'news-blog' );
		if ( ! empty( $posts_array ) ) {
			foreach ( $posts_array as $posts ) {
				if( $slug ){
					$post_options[ $posts->post_title ] = $posts->post_title;
				}else{
					$post_options[ $posts->ID ] = $posts->post_title;    
				}
			}
		}
		return $post_options;
		wp_reset_postdata();
	}
endif;

if ( ! function_exists( 'news_blog_tag' ) ) :
/**
 * Prints tags
 */
function news_blog_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', ' ' );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="cat-tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'news-blog' ) . '</div>', '<span class="tags-title">', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'news_blog_get_svg_icons' ) ) :
	/**
	 * Fuction to list svg
	*/
	function news_blog_get_svg_icons(){    

		$social_media = [ 'facebook', 'twitter', 'digg', 'instagram', 'pinterest', 'telegram', 'getpocket', 'dribbble', 'behance', 'unsplash', 'five-hundred-px', 'linkedin', 'wordpress', 'parler', 'mastodon', 'medium', 'slack', 'codepen', 'reddit', 'twitch', 'tiktok', 'snapchat', 'spotify', 'soundcloud', 'apple_podcast', 'patreon', 'alignable', 'skype', 'github', 'gitlab', 'youtube', 'vimeo', 'dtube', 'vk', 'ok', 'rss', 'facebook_group', 'discord', 'tripadvisor', 'foursquare', 'yelp', 'hacker_news', 'xing', 'flipboard', 'weibo', 'tumblr', 'qq', 'strava', 'flickr' ];
		
		// Initate an empty array
		$svg_options = array();
		$svg_options[''] = __( ' -- Choose -- ', 'news-blog' );
		
			foreach ( $social_media as $svg ) {			
				$svg_options[ $svg ] = esc_html( $svg );				
			}
		
		return $svg_options;
	}
endif;


/**
 * Primary Functions
 */

if ( ! function_exists( 'news_blog_site_branding' ) ) :
    /**
     * Site Branding
     */
    function news_blog_site_branding(){
        ?>
        <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
            <?php if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){            
                the_custom_logo();               
            } ?><div class="site-title-logo"><?php
           
            if ( is_front_page() ) :
                ?>
                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $news_blog_description = get_bloginfo( 'description', 'display' );
            if ( $news_blog_description || is_customize_preview() ) :
                ?>
                <p class="site-description" itemprop="description"><?php echo $news_blog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
            </div>
        </div><!-- .site-branding -->
        <?php
    }
endif;

if ( ! function_exists( 'news_blog_primary_navigation' ) ) :
    /**
    * Primary Navigation
    */
    function news_blog_primary_navigation( $schema = true ){
        if ( current_user_can( 'manage_options' ) || has_nav_menu( 'primary-menu' ) ) {  
        $schema_class = '';
        $mobile_id  = 'mobile-navigation';

        if( $schema ){
            $schema_class = ' itemscope itemtype=https://schema.org/SiteNavigationElement';
            $mobile_id  = 'site-navigation';
        }
        ?>
            <nav id="<?php echo esc_attr( $mobile_id ); ?>" class="main-navigation" <?php echo esc_attr( $schema_class ); ?>>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary-menu',
                            'menu_id'         => 'primary-menu',
                            'container_class' => 'primary-menu-container',
                            'fallback_cb'     => 'news_blog_primary_menu_fallback',
                        )
                    );
                ?>
            </nav>
        <?php }
    }
endif;

if( ! function_exists( 'news_blog_social_links' ) ) :
	/**
	 * Social Links 
	*/
    function news_blog_social_links( $echo = true ){
        
        $social_links = news_blog_get_setting( 'social_links' );
        if( $social_links && $echo ){ ?>
        <ul class="social-links">
            <?php 
            foreach( $social_links as $link ){
                $new_tab = isset( $link['news_blog_checkbox'] ) && $link['news_blog_checkbox'] ? '_blank' : '_self';
                if( isset( $link['news_blog_link'] ) ){ ?>
                <li>
                    <a href="<?php echo esc_url( $link['news_blog_link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                        <?php echo wp_kses( news_blog_social_icons_svg_list( $link['news_blog_icon'] ), news_blog_kses_extended_ruleset() ); ?>
                    </a>
                </li>	   
                <?php
                } 
            } 
            ?>
        </ul>
        <?php    
        }elseif( $social_links ){
            return true;
        }else{
            return false;
        }
        ?>
        <?php                                
    }
endif;

if( ! function_exists( 'news_blog_header_search' ) ) :
/**
 * Header search
 */
function news_blog_header_search(){

$enable_search = news_blog_get_setting( 'enable_search', false );
if ( $enable_search ) { ?>
	<div class="header-search">
		<button class="header-search-icon" aria-label="<?php esc_attr_e( 'search form toggle', 'news-blog' ); ?>" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
			<svg xmlns="http://www.w3.org/2000/svg" width="16.197" height="16.546"
                viewBox="0 0 16.197 16.546" aria-label="Search Icon">
                <path id="icons8-search"
                    d="M9.939,3a5.939,5.939,0,1,0,3.472,10.754l4.6,4.585.983-.983L14.448,12.8A5.939,5.939,0,0,0,9.939,3Zm0,.7A5.24,5.24,0,1,1,4.7,8.939,5.235,5.235,0,0,1,9.939,3.7Z"
                    transform="translate(-3.5 -2.5) "
                    stroke-width="2"  />
            </svg>
		</button>
		<div class="header-search-form search-modal cover-modal" data-modal-target-string=".search-modal">
			<div class="header-search-inner-wrap">'
				<?php get_search_form(); ?>
				<button aria-label="<?php esc_attr_e( 'search form close', 'news-blog' ); ?>" class="close" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false"></button>
			</div>
		</div>
	</div><!-- .header-seearch -->
<?php } 
}
endif;

if( ! function_exists( 'news_blog_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function news_blog_primary_menu_fallback(){
	?>
        <div class="primary-menu-container">
			<ul id="primary-menu" class="nav-menu">
				<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Click here to add a menu', 'news-blog' ); ?></a></li>
			</ul>
        </div>
	<?php 
}
endif;

if( ! function_exists( 'news_blog_nav' ) ) :
/**
 * navigation
 */
function news_blog_nav(){
	if( is_singular() ){ 
		$next_post	= get_next_post();
		$prev_post  = get_previous_post();
		
		if( $next_post || $prev_post ){ ?>
			<nav class="post-navigation pagination">
				<div class="nav-links">
					<?php if( $prev_post ){ ?>
						<div class="nav-previous">
							<a href="<?php the_permalink( $prev_post->ID ); ?>" rel="prev">
								<article class="post">
									<figure class="post-thumbnail">
										<?php $prev_img = get_post_thumbnail_id( $prev_post->ID ); 
										if( $prev_img ){
											echo wp_get_attachment_image( $prev_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
										}else{
											news_blog_get_fallback_svg( 'thumbnail' );
										}?>
									</figure>
								<div class="pagination-details">
									<span class="meta-nav"><?php echo esc_html__( 'Previous', 'news-blog' ); ?></span>
									<header class="entry-header">
										<h3 class="entry-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h3>  
									</header>
								</div>
								</article>
							</a>
						</div>
					<?php }
					if( $next_post ){ ?>
						<div class="nav-next">
							<a href="<?php the_permalink( $next_post->ID ); ?>" rel="next">
								<article class="post">
									<figure class="post-thumbnail">
										<?php $next_img = get_post_thumbnail_id( $next_post->ID ); 
										if( $next_img ){
											echo wp_get_attachment_image( $next_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
										}else{
											news_blog_get_fallback_svg( 'thumbnail' );
										}?>									
									</figure>
									<div class="pagination-details">
										<span class="meta-nav"><?php echo esc_html__( 'Next', 'news-blog' ); ?></span>
									<header class="entry-header">
										<h3 class="entry-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h3>
									</header>
								</article>
							</a>
						</div>
					<?php } ?>
				</div>	
			</nav>
		<?php }
	} else { ?>	
		<div class="default">			
			<?php the_posts_navigation(); ?>
		</div>
		<?php
	}
}
endif;

if ( ! function_exists( 'news_blog_category' ) ) :
/**
 * Prints categories
 */
function news_blog_category(){
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category();
        echo '<span class="category">';
        foreach( $categories_list as $cat_list ){
            echo '<a href="' . esc_url( get_category_link( $cat_list->term_id ) ) . '">' . esc_html( $cat_list->name ) . '</a>';
        }
        echo '</span>';
    }
}
endif;
    
if ( ! function_exists( 'news_blog_tag' ) ) :
/**
 * Prints tags
 */
function news_blog_tag(){
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        $tags_list = get_the_tag_list( '', ' ' );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<div class="tags">' . esc_html__( '%1$sTags:%2$s %3$s', 'news-blog' ) . '</div>', '<span>', '</span>', $tags_list );
        }
    }
}
endif;


if( ! function_exists( 'news_blog_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function news_blog_get_image_sizes( $size = '' ) {
    
    global $_wp_additional_image_sizes;
    
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
    
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'news_blog_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function news_blog_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }


    $image_size = news_blog_get_image_sizes( $post_thumbnail );
        
    if( $image_size ){ ?>
        <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#dddcdc7a;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if ( ! function_exists( 'news_blog_author_meta' ) ) :
    /**
     * Author info for Banner and Editor Picks
     */
    function news_blog_author_meta(){ ?>
        <div class="auth-details">
            <div class="author-desc">            
                <div class="author-details">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 28, '', 'author' ); ?>
                    <div class="author-name">
                        <?php news_blog_posted_by(); ?>
                    </div>
                </div>
                <span class="date">
                    <?php news_blog_posted_on(); ?>
                </span>
				<?php if( get_comments_number() > 0 )  { ?>
					<div class="comments">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-quote" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                          </svg>				
						</span><?php echo absint( get_comments_number() ); ?>
					</div>
				<?php } ?>
            </div>
        </div>
    <?php    
    }
endif;

if ( ! function_exists( 'news_blog_single_author_meta' ) ) :
    /**
     * Author info for Single Post Banner
     */
    function news_blog_single_author_meta(){   
        $ed_author          = news_blog_get_setting( 'enable_post_author', false );
        $ed_read_calc       = news_blog_get_setting( 'enable_post_read_calc', false );
		$ed_date            = news_blog_get_setting( 'enable_post_date', false );
		$ed_comments        = news_blog_get_setting( 'enable_banner_comments', false );     
        ?>
        <div class="auth-details">
            <div class="author-desc">
                <?php if( ! $ed_author ){ ?> 
                    <div class="author-details">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 28, '', 'author' ); ?>
                        <div class="author-name">
                            <?php news_blog_posted_by(); ?>
                        </div>

                    </div>
                <?php } if ( ! $ed_date ) { ?>
                    <span class="date">
                        <?php news_blog_posted_on(); ?>
                    </span>
                <?php } if ( ! $ed_comments && get_comments_number() > 0 ) { ?>
                    <div class="comments">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-quote" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                          </svg>                        
                        </span><?php echo absint( get_comments_number() ); ?>
                    </div>
                <?php } if( ! $ed_read_calc ) news_blog_single_reading_calc( get_post( get_the_ID() )->post_content ); ?>
            </div>
        </div>
    <?php    
    }
endif;

if( ! function_exists( 'news_blog_get_posts_list' ) ) :
/**
 * Returns Latest & Related 
*/
function news_blog_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
		$reltitle         = __( 'You might also like', 'news-blog' );
		$class            = 'recent-posts';
		$image_size       = 'news_blog_popular_posts';
        break;
        
        case 'related':
        $args['posts_per_page'] = 2;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
		$reltitle         		= news_blog_get_setting( 'related_post_title', __( 'You might also like', 'news-blog' ) );
		$image_size       		= 'news_blog_archive';
    
        $cats = get_the_category( $post->ID );        
        if( $cats ){
            $c = array();
            foreach( $cats as $cat ){
                $c[] = $cat->term_id; 
            }
            $args['category__in'] = $c;
        }
        break;      
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){     
        if ( ! is_single() ) echo '<div class="' . esc_attr( $class ) . '">';
            
            if( $reltitle ) echo '<h3 class="post-title">' . esc_html( $reltitle ) . '</h3>'; ?>
            <div class="section-grid">
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                <article class="post">
                    <div class="image">
                        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                }else{ 
                                    news_blog_get_fallback_svg( $image_size );//fallback
                                }
                            ?>
                        </a>
                    </div>
                    <header class="entry-header">
                        <div class="entry-meta">
                            <?php news_blog_category(); ?>      
                        </div> 
						<div class="entry-details">
							<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); 
							?>
						</div>
                        <?php news_blog_author_meta(); ?>                 
                    </header>
                </article>
                <?php } ?>    		
            </div>
            
        <?php if ( ! is_single() ) echo '</div>'; ?>
        <?php
    } wp_reset_postdata();
}
endif;

if( ! function_exists( 'news_blog_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages/posts
 */
function news_blog_sidebar_layout(){
    global $post;
	$return      = false;
	$page_layout = news_blog_get_setting( 'page_sidebar_layout'); //Default Layout Style for Pages
	$post_layout = news_blog_get_setting( 'post_sidebar_layout'); //Default Layout Style for Posts
    $layout      = news_blog_get_setting( 'layout_style'); //Default Layout Style for Archive and Search Pages
    $woo_layout  = news_blog_get_setting( 'woo_sidebar_layout'); //Woo Sidebar Layout
    
	if(class_exists('WooCommerce') && is_woocommerce()) {
        
        if ( $woo_layout == 'no-sidebar' ){
                $return = 'full-width';
            } elseif( $woo_layout == 'right-sidebar' ){
                $return = 'rightsidebar';
            } elseif( $woo_layout == 'left-sidebar' ) {
                $return = 'leftsidebar';
        } else {
            $return = 'full-width';
        }
        return $return;
    }    
    
    if( is_singular() ){         
        
		if( is_page() ){
			if( is_active_sidebar( 'sidebar-1' ) ){
				if( $page_layout == 'right-sidebar'){
					$return = 'rightsidebar';
				}elseif( $page_layout == 'left-sidebar' ){
					$return = 'leftsidebar';
				}elseif( $page_layout == 'no-sidebar' ){
					$return = 'full-width';
				}
			}else{
				$return = 'full-width';
			}
		}elseif( is_single() ){
			if( is_active_sidebar( 'sidebar-1' ) ){
				if( $post_layout == 'right-sidebar' ){
					$return = 'rightsidebar';
				}elseif( $post_layout == 'left-sidebar' ) {
					$return = 'leftsidebar';
				}elseif( $post_layout == 'no-sidebar' ){
					$return = 'full-width';
				}
			}else{
				$return = 'full-width';
			}
		}
	}elseif( is_archive() || is_search() ){
        //archive page                  
		if( is_active_sidebar( 'sidebar-1' ) ){
			if( $layout == 'no-sidebar' ){
				$return = 'full-width';
			}elseif( $layout == 'right-sidebar' ){
				$return = 'rightsidebar';
			}elseif( $layout == 'left-sidebar' ) {
				$return = 'leftsidebar';
			}
		}else{
			$return = 'full-width';
		}                       
    }else{
		if( is_active_sidebar( 'sidebar-1' ) ){            
			$return = 'rightsidebar';             
		}else{
			$return = 'full-width';
		} 
	}

	return $return;
}
endif;

if( ! function_exists( 'news_blog_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function news_blog_breadcrumb(){ 
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = news_blog_get_setting( 'home_text', __( 'Home', 'news-blog' ) ); // text for the 'Home' link
    $delimiter  = '<span class="separator"><svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Breadcrumb Icon"><path d="M6.839 12.02L5.424 10.607L10.024 6.007L5.424 1.407L6.839 0L12.849 6.01L6.84 12.02H6.839ZM1.414 12.02L0 10.607L4.6 6.007L0 1.414L1.414 0L7.425 6.01L1.415 12.02H1.414V12.02Z" /></svg></span>';
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( news_blog_get_setting( 'enable_breadcrumb', true ) ){
        $depth = 1;
        echo '<header class="page-header"> <div ><div class="breadcrumb-wrapper"><div id="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
        
        if( is_home() ){ 
            $depth = 2;                       
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;            
        }elseif( is_category() ){  
            $depth = 2;          
            $thisCat = get_category( get_query_var( 'cat' ), false );            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;  
            }            
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;       
        }elseif( news_blog_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();            
            if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( news_blog_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            $depth = 2;
            if( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ){
                return;
            }
            $_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 )  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
            if( ! $_name ){
                $product_post_type = get_post_type_object( 'product' );
                $_name             = $product_post_type->labels->singular_name;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_tag() ){ 
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />'. $after;
        }elseif( is_author() ){  
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;     
        }elseif( is_search() ){ 
            $depth       = 2;
            $request_uri = sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI']));
            echo $before . '<a itemprop="item" href="'. esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'news-blog' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_day() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'news-blog' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'news-blog' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'news-blog' ) ), get_the_time( __( 'm', 'news-blog' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'news-blog' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'news-blog' ) ), get_the_time( __( 'm', 'news-blog' ) ), get_the_time( __( 'd', 'news-blog' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'news-blog' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_month() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'news-blog' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'news-blog' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'news-blog' ) ), get_the_time( __( 'm', 'news-blog' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'news-blog' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_year() ){ 
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'news-blog' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'news-blog' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;  
        }elseif( is_single() && !is_attachment() ){   
            $depth = 2;         
            if( news_blog_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;                    
                }           
                if( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ){
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
            }elseif( get_post_type() != 'post' ){                
                $post_type = get_post_type_object( get_post_type() );                
                if( $post_type->has_archive == true ){// For CPT Archive Link                   
                    // Add support for a non-standard label of 'archive_title' (special use case).
                    $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                    $depth++;    
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }else{ //For Post                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';  
                    $depth++; 
                }
                
                if( $cat_object ){ //Getting category hierarchy if any        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }                    
                    $cat  = $cat_object[$use_term];              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                }
                echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;   
            }        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</span>';
                echo $before . sprintf( __('Page %s', 'news-blog'), esc_html(get_query_var('paged')) ) . $after; 
            }else{
                echo $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
            }    
        }elseif( is_attachment() ){ 
            $depth = 2;           
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && !$post->post_parent ){            
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && $post->post_parent ){            
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            echo $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'news-blog' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
        }
        
        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'news-blog' ), esc_html(get_query_var('paged')) );
        
        echo '</div></div></header><!-- .crumbs -->';
        
    }                
}
endif;


if ( ! function_exists( 'news_blog_author_box' ) ) :
    /**
     * Author Box for Single Post and Archive Page
     */
    function news_blog_author_box(){
        if ( is_single() && get_the_author_meta( 'description' ) ) { ?>
            <div class="author-section">
                <div class="author-wrapper">
                    <figure class="author-img">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 95, '', 'author' ); ?>
                    </figure>
                    <div class="author-wrap">
                        <h3 class="author-name">
                            <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                        </h3>
                        <div class="author-content">
                            <p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
                        </div>                    
                    </div>
                </div>
            </div>
        <?php } elseif( is_author() ) { ?>
            <div class="author-section">
                <div class="author-wrapper">
                    <figure class="author-img">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 95, '', 'author' ); ?>
                    </figure>
                    <?php if ( get_the_author_meta( 'description' ) ) { ?>
                        <div class="author-wrap">
                            <h3 class="author-name">
                                <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                            </h3>
                            <div class="author-content">
                                <p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }
endif;

if( ! function_exists( 'news_blog_mobile_navigation' ) ) :
/**
 * Mobile Navigation
*/
function news_blog_mobile_navigation(){ 
    ?>
    <div class="mobile-header">
        <div class="header-main">
            <div class="container">
                <div class="mob-nav-site-branding-wrap">
                    <div class="header-center">
                        <?php news_blog_site_branding(); ?>
                    </div>
                    <button id="menu-opener" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mobile-header-wrap">
            <div class="mobile-menu-wrapper">
                <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                    <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">                  
                        <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
                        <div class="mobile-social-wrap">
                            <?php if( news_blog_social_links( false ) ){
                                echo '<div class="header-left"><div class="header-social">';
                                news_blog_social_links();
                                echo '</div></div>';
                            } ?>  
                        </div>
                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'news-blog' ); ?>">
                            <?php
                                news_blog_primary_navigation( false );
                            ?>
                        </div>
                    </div>
                </nav><!-- #mobile-site-navigation -->
            </div>
        </div>  
    </div>
<?php   
}
endif;

if( ! function_exists( 'news_blog_comment' ) ) :
	/**
	 * Callback function for Comment List *
	 * 
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
	 */
	function news_blog_comment( $comment, $args, $depth ){
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}?>
		<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		
		<?php if ( 'div' != $args['style'] ) : ?>
		<article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
		<?php endif; ?>
			
			<footer class="comment-meta">
				<div class="comment-author vcard">
                    <div class="comment-author-image">
				        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], '', 'avatar' ); ?>
                    </div>
				</div>
                <div class="author-details-wrap"><!-- .comment-author vcard -->
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s <span class="says">says:</span></b>', 'news-blog' ), get_comment_author_link() ); ?>
                    <div class="comment-meta-data">
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                            <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'news-blog' ), get_comment_date(),  get_comment_time() ); ?></time>
                        </a>
                    </div>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'news-blog' ); ?></em>
                        <br />
                    <?php endif; ?>
                    <div class="comment-content" itemprop="commentText">                     
                        <?php comment_text(); ?>                      
			        </div>    
                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Reply', 'news-blog'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                </div>
			</footer> 
		<?php if ( 'div' != $args['style'] ) : ?>
		</article><!-- .comment-body -->
		<?php endif;
	}
endif;


if( ! function_exists( 'news_blog_single_reading_calc' ) ) :
    /**
     * Reading calculation
     */
    function news_blog_single_reading_calc( $content ){ 
        $en_read       = news_blog_get_setting( 'enable_post_read_calc' );
        $read_calc     = news_blog_get_setting( 'read_words_per_minute' );
   $total_word = str_word_count(strip_tags($content));
    $m = floor($total_word / $read_calc);
    $s = floor($total_word % $read_calc / ($read_calc / 60));
    $estimateTime = $m . esc_html__(' minute', 'news-blog') . ($m == 1 ? '' : 's') . ', ' . $s . esc_html__(' second','news-blog') . ($s == 1 ? '' : 's');

        if ( ! $en_read ) { ?>
            <div class="time">
                <?php echo wp_kses_post( $estimateTime ).esc_html__(' Read', 'news-blog'); ?>
            </div>
        <?php }
    }
endif;
    

if( ! function_exists( 'news_blog_footer_site_info' ) ) :
/**
 * Footer site info
*/
function news_blog_footer_site_info(){ 
	echo '<div class="site-info">';
		news_blog_get_footer_copyright();
	echo '</div>';
}
endif;


if( ! function_exists( 'news_blog_get_related_posts' ) ) :
    /**
     * Related post
    */
    function news_blog_get_related_posts(){ ?>
        <div class="additional-post">
            <?php news_blog_get_posts_list( 'related' ); ?>
        </div>
        <?php 
    }
endif;

if( ! function_exists( 'news_blog_get_comments' ) ) :
    /**
     * Comments
    */
    function news_blog_get_comments(){ 
    // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;      
    }
endif;


if( ! function_exists( 'news_blog_kses_extended_ruleset' ) ) :

function news_blog_kses_extended_ruleset() {
    $kses_defaults = wp_kses_allowed_html( 'post' );

    $svg_args = array(
        'svg'   => array(
            'class'           => true,
            'aria-hidden'     => true,
            'aria-labelledby' => true,
            'role'            => true,
            'xmlns'           => true,
            'width'           => true,
            'height'          => true,
            'viewbox'         => true, // <= Must be lower case!
        ),
        'g'     => array( 'fill' => true ),
        'title' => array( 'title' => true ),
        'path'  => array(
            'd'    => true,
            'fill' => true,
        ),
    );
    return array_merge( $kses_defaults, $svg_args );
}
endif;


