<?php
/**
 * Template for displaying front page
 * 
 * @package bizango-theme
 */

get_header();
?> 


<div class="main_content">
    <?php $cat_id = 8; //the cover story category ID
            $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
    <div   <?php
            if ( get_field('cover_image') ) {//display "cover story" image as background image 
            echo 'style="background-image: url(' . get_field('cover_image') . '); background-size: cover;"';
            }?> class="cover-story-img ">
   

        <div class="cover-snippet-wrap" >
            <div class=" page_frame cover-content">
            
            <!--display most recent story with "Cover Story" category -->
            <div class="flex-wrap">
                  <div class="fl ">
              <!-- display categories of cover story-->
                      <div class="categories">
                        <?php $cats='' ;
                        foreach((get_the_category()) as $category) {
                            $cats=$cats.$category->cat_name . ': ';}
                            $cats = substr($cats,0,-2);
                            echo $cats; ?>  
                      </div>

                      <a href="<?php the_permalink(); ?>">
                      <h1><?php the_title(); ?></h1>  </a>
                  </div>
                  <div class="cover-blurb"><!--display post excerpt -->
                  <p><?php the_field('post_excerpt'); ?></p>
                  
                  <?php endwhile; endif; ?>
                  <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                  </div><!--end cover-blurb-->
              </div><!--end flex-wrap -->
            </div>
            
        </div><!--end cover snippet wrap-->
     
    </div> <!-- end .cover-story-img-->
    <div class="page_frame group ">
     <div class="page_content fl">
     <!--FEATURE STORIES -->
      <?php query_posts('cat=3&showposts=3'); ?><!--display only 3 of the most recent stories with category = Features -->
      <?php include "feature-stories.php"; ?>

    <!--end feature group--> 

    <!-- DISPLAY AD IN MAIN SECTION FRONT PAGE -->
    <div class="main-ad"> 
        <?php query_posts('showposts=1&cat=9'); ?>
        <?php while (have_posts()) : the_post(); 
            the_content(); 
        endwhile; ?>
    </div>
    <!--  END MAIN AD -->

    
    <!--PRODUCT SPOTLIGHT SECTION-->
    <?php include "product-spotlight.php"; ?>
    <!--end spotlight section -->


    <!-- Email Signup Form-->
    <?php include "email-signup.php"; ?>
    <!-- END: Email Signup Form -->


    <!--NOW AVAILABLE SLIDER -->
      <div class="now-available">
         <?php query_posts('showposts=1&cat=19'); ?>
         <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
              <?php include "current-issue-slider.php"; ?><!--this shows in desktop view-->
              <?php include "m-current-issue.php"; ?><!--this shows in mobile view -->
          <?php endwhile; ?>              
      </div><!--end now-available-->

    <!--SPONSORED POSTS -->
      <?php include "sponsored-posts.php"; ?>
    <!--end sponsored posts -->  

  </div><!-- .page-content-->   

    

        <!--SIDEBAR--> 
         <div class="page_sidebar fr">
          <?php get_sidebar(); ?>
        </div>
     </div><!--end page-frame-group -->
</div><!--end main-content -->

<?php get_footer(); ?> 