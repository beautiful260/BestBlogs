<div id="primary" class="content-area">
  <div id="home-page-template" class="container">    

    <?php
      
    $news_blog_header_sections = news_blog_get_setting( 'home_header_sections' );
    $news_blog_body_sections = news_blog_get_setting( 'home_body_sections' );
    $news_blog_footer_sections = news_blog_get_setting( 'home_footer_sections' );  

    function news_blog_show_header_section( $section ) {
      if ( $section == 'tags' ) {
        ?>
    <div class="row">
      <div class='col-sm-12 col-lg-12'>
        <?php the_widget('news_blog_news_tags_widget', array('title'=>news_blog_get_setting('hs_tags_title'), 'max_items'=>news_blog_get_setting( 'hs_tags_count' )) ); ?>
      </div>
    </div>
    <?php
    } elseif ( $section == 'marquee' ) {
        ?>
    <div class="row">
      <div class='col-sm-12 col-lg-12'>
        <?php the_widget('news_blog_news_marquee_widget', array('title'=>news_blog_get_setting('hs_marquee_title'), 'category'=>news_blog_get_setting( 'hs_marquee_cat' ), 'max_items'=>news_blog_get_setting( 'hs_marquee_count' ) ) ); ?>
      </div>
    </div>
    <?php

    } elseif ( $section == 'header_post' ) {
        ?>
    <div class="row">
      <div id="header_post_1" class='col-sm-12 col-lg-12'>
        <?php the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_header_post_1_title'), 'category'=>news_blog_get_setting('hs_header_post_1_cat'), 'max_items'=>news_blog_get_setting('hs_header_post_1_count'), 'max_height'=> news_blog_get_setting('hs_header_post_1_height'), 'layout'=>news_blog_get_setting('hs_header_post_1_layout'), 'colums'=> news_blog_get_setting('hs_header_post_1_col') ) ); ?>
      </div>
    </div>
    <?php

      } 
    }
      
     
      
      
    //section body
    function news_blog_show_body_section( $section ) {
      if ( $section == 'slider' ) {
            ?><div id="body_slider"><?php          
                the_widget('news_blog_post_slider_widget', array( 'category'=>news_blog_get_setting('hs_slider_1_cat'), 'max_items'=> news_blog_get_setting('hs_slider_count'),  'navigation'=>true) );
            ?></div><?php
      } elseif ($section == '2_column'){
      ?>
          <div id="body_double_column" class='row'>
              <div class='col-sm-6 col-md-6 col-lg-6 col-xs-12 double_col_1'>
                <?php the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_double_title_1'), 'category'=>news_blog_get_setting('hs_double_cat_1'), 'layout'=>news_blog_get_setting('hs_double_layout_1'), 'max_items'=> news_blog_get_setting('hs_double_count_1'), 'colums'=> news_blog_get_setting('hs_double_col_1') )); ?>
              </div>
              <div class='col-sm-6 col-md-6 col-lg-6 col-xs-12 double_col_2'>
                <?php the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_double_title_2'), 'category'=>news_blog_get_setting('hs_double_cat_2'), 'layout'=>news_blog_get_setting('hs_double_layout_2'), 'max_items'=> news_blog_get_setting('hs_double_count_2'), 'colums'=> news_blog_get_setting('hs_double_col_2') )); ?>
              </div>
          </div>
      <?php
      } elseif ( $section == 'post_1' ) {
            ?><div id="home_post_1"><?php
                the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_post_1_title'), 'category'=>news_blog_get_setting('hs_post_1_cat'), 'max_items'=>news_blog_get_setting('hs_post_1_count') , 'layout'=>news_blog_get_setting('hs_post_1_layout'), 'colums'=>news_blog_get_setting('hs_post_1_col'), 'max_height'=> news_blog_get_setting('hs_post_1_height') ));
            ?></div><?php
      } elseif ( $section == 'post_2' ) {
            ?><div id="home_post_2"><?php          
                the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_post_2_title'), 'category'=>news_blog_get_setting('hs_post_2_cat'), 'max_items'=>news_blog_get_setting('hs_post_2_count'), 'layout'=>news_blog_get_setting('hs_post_2_layout'), 'colums'=> news_blog_get_setting('hs_post_2_col'), 'max_height'=> news_blog_get_setting('hs_post_2_height') ));
            ?></div><?php
      } elseif ( $section == 'post_3' ) {
            ?><div id="home_post_3"><?php          
                the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_post_3_title'), 'category'=>news_blog_get_setting('hs_post_3_cat'), 'max_items'=>news_blog_get_setting('hs_post_3_count'), 'layout'=>news_blog_get_setting('hs_post_3_layout'), 'colums'=> news_blog_get_setting('hs_post_3_col'), 'max_height'=> news_blog_get_setting('hs_post_3_height') ));
            ?></div><?php
      }elseif ( $section == 'post_4' ) {
            ?><div id="home_post_4"><?php
                the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_post_4_title'), 'category'=>news_blog_get_setting('hs_post_4_cat'), 'max_items'=>news_blog_get_setting('hs_post_4_count'), 'layout'=>news_blog_get_setting('hs_post_4_layout'), 'colums'=> news_blog_get_setting('hs_post_4_col'), 'max_height'=> news_blog_get_setting('hs_post_4_height') ));
            ?></div><?php
      }elseif ( $section == 'blog' ) {
            ?><div id="home_post_blog"><?php
                new_blog_post_page(news_blog_get_setting('home_section_blog_navigation_title'));
            ?></div><?php
      }
    }
      
      
    //section footer
    function news_blog_show_footer_section( $section ) {
      if ( $section == 'footer_post_1' ) {
          ?><div id="footer_post_1"><?php
          the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_footer_post_1_title'), 'category'=>news_blog_get_setting('hs_footer_post_1_cat'), 'max_items'=>news_blog_get_setting('hs_footer_post_1_count'), 'layout'=>news_blog_get_setting('hs_footer_post_1_layout'), 'colums'=> news_blog_get_setting('hs_footer_post_1_col'),'max_height'=> news_blog_get_setting('hs_footer_post_1_height') ));
          ?></div><?php
      } elseif($section == 'footer_post_2'){
          ?><div id="footer_post_2"><?php
          the_widget('news_blog_news_widget', array('title'=>news_blog_get_setting('hs_footer_post_2_title'), 'category'=>news_blog_get_setting('hs_footer_post_2_cat'), 'max_items'=>news_blog_get_setting('hs_footer_post_2_count'), 'layout'=>news_blog_get_setting('hs_footer_post_2_layout'), 'colums'=> news_blog_get_setting('hs_footer_post_2_col'),'max_height'=> news_blog_get_setting('hs_footer_post_2_height') ));
          ?></div><?php
      }
    }      
      

    ?>
    <div class="page-grid"><!--start body content-->
      <div id="main" class="site-main">
        <div class="container">
          
        <div class="row">
        <?php
        //header contents
        $news_blog_header_sections = explode( ',' , $news_blog_header_sections );

        foreach ( $news_blog_header_sections as $news_blog_section ) {
          news_blog_show_header_section( $news_blog_section );
        }

        ?>
        </div>
          
          
        <div class="home-body row <?php echo esc_attr(news_blog_get_setting('home_body_layout'));?>">
            <?php if(news_blog_get_setting('home_body_layout')== 'left-sidebar'): ?>
                <div class='col-sm-3 col-lg-3 col-xs-12 template-home-sidebar home-left-sidebar'>
                  <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
          <div class='<?php 
                      if (news_blog_get_setting('home_body_layout') == "left-sidebar") { 
                          echo "col-sm-9 col-lg-9 col-xs-12";
                      } elseif (news_blog_get_setting('home_body_layout') == "right-sidebar"){
                          echo "col-sm-9 col-lg-9 col-xs-12";
                      }
                      ?> home-body-content'>
            <?php
               //body contents
              $news_blog_body_sections = explode( ',' , $news_blog_body_sections );

              foreach ( $news_blog_body_sections as $news_blog_section ) {
                news_blog_show_body_section( $news_blog_section );
              }              
              
            ?>       
          </div>
            <?php if(news_blog_get_setting('home_body_layout')== 'right-sidebar'): ?>
                <div class='col-sm-3 col-lg-3 col-xs-12 template-home-sidebar home-right-sidebar'>
                  <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
          
          
        <div class="row" style="clear: both;">
        <?php
        //above footer contents
          
        $news_blog_footer_sections = explode( ',' , $news_blog_footer_sections );

        foreach ( $news_blog_footer_sections as $news_blog_section ) {
          news_blog_show_footer_section( $news_blog_section );
        }

        ?>
        </div>    
            
        </div><!--end .container-->
      </div><!--end #main content-->
    </div> <!--end content-->
      
      
  </div><!--end .container-->
</div><!--end #primary-->
