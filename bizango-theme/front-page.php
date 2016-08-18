<?php
/**
 * Template for displaying front page
 * 
 * @package bizango-theme
 */

get_header();
?> 


<div class="main_content">
    <?php $cat_id = 2072; //the cover story category ID
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
                        
                      <!--show only one category name, even if post has multiple categories-->
                        <?php 
                        $category = get_the_category(); 

                        if($category[0]->cat_name == "Cover Story") {

                            //if first category in array is "Cover Story", get next category in line
                             $name = $category[1]->cat_name;
                             $cat_id = get_cat_ID( $name );
                             $link = get_category_link( $cat_id );
                             echo '<span class="black">Cover Story:</span> <a href="'. esc_url( $link ) .'">'. $name .'</a>';

                        } else {

                            //get the first category
                             $name = $category[0]->cat_name;
                             $cat_id = get_cat_ID( $name );
                             $link = get_category_link( $cat_id );
                             echo '<span class="black">Cover Story:</span> <a href="'. esc_url( $link ) .'">'. $name .'</a>';

                        }?>  
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
      <?php query_posts('cat=-2072,35,&showposts=3'); ?><!--display only 3 of the most recent stories with category = Features -->
      <?php include "feature-stories.php"; ?>

    <!--end feature group--> 

    <!-- DISPLAY AD IN MAIN SECTION FRONT PAGE -->
    <div class="main-ad"> 

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('main-ad')) : else : ?>
    <?php endif; ?>


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
        <?php include "current-issue-slider.php"; ?><!--this shows in desktop view-->
        
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