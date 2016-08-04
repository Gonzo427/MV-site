<?php
/**
 * Template for displaying pages
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
            }?> class="cover-story ">
   

        <div class="cover-snippet-wrap" >
        
            
            <div class=" page_frame cover-content">
            

            <!--display most recent story with "Cover Story" category -->
           
        
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
                <div class="cover-blurb">
                <p><?php the_field('post_excerpt'); ?></p>
                
                <?php endwhile; endif; ?>
                <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a></div>
            </div>
            
        </div><!--end cover snippet wrap-->
     
    </div> <!-- end .cover-story -->
    <div class="page_frame group ">
     
     <div class="page_content fl">
     <!--FEATURE STORIES -->
      <?php query_posts('cat=3&showposts=3'); ?>
      <?php include "feature-stories.php"; ?>

    <!--end feature group--> 

    <div class="main-ad"> 
        <?php query_posts('showposts=1&cat=9'); ?>
        <?php while (have_posts()) : the_post(); 
            the_content(); 
        endwhile; ?>
    </div>

    <div class="spotlight"> 
        <div class="living-the-life fl white-bg"> 

                <?php query_posts('showposts=1&cat=13'); ?>
                <?php while (have_posts()) : the_post(); ?>
                        <?php the_category(); ?>  
                       
                <?php 

                $image = get_field('post_image');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)

                if( $image ) {

                  echo wp_get_attachment_image( $image, $size );

                }?>

                        <div class="padding-25">
                        <h2> <?php the_title(); ?> </h2>
                        <p> <?php the_field('post_excerpt'); ?> </p>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                        </div>
                     <?php endwhile; ?>
                 </div>

                 <div class="product-spotlight fl white-bg"> 
                    <?php query_posts('showposts=1&cat=14'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_category(); ?> 
                       
                        <?php 
                        $image = get_field('post_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)

                        if( $image ) {

                          echo wp_get_attachment_image( $image, $size );

                        }?>
                        <div class="padding-25">
                         <h2> <?php the_title(); ?> </h2>
                         <p><?php the_field('post_excerpt'); ?></p>
                         <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                         </div>
                     <?php endwhile; ?>
                 </div>
    </div>



        <!-- Email Signup Form-->
       <?php include "email-signup.php"; ?>
        <!-- END: Email Signup Form -->



        <!--NOW AVAILABLE SLIDER -->
        <div class="now-available">
         <?php query_posts('showposts=1&cat=19'); ?>
         <?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
         
                <?php include "current-issue-slider.php"; ?>
           
                <?php include "m-current-issue.php"; ?>
          <?php endwhile; ?>   
          <!--mobile view hides slider and shows this image plus buy now button -->
                   
        </div><!--end now-available-->


            <div class="sponsored-wrap">
            <h3>NEWS, PRODUCTS &amp; PROFILES</h3>
           <?php
                // Get the ID of a given category
                $category_id = get_cat_ID( 'Sponsored News, Products, Profiles' );

                // Get the URL of this category
                $category_link = get_category_link( $category_id );?>
                <a class="see-more-btn"href="<?php echo esc_url( $category_link ); ?>" title="News, Products and Profiles">See More</a>
           
            <div class="sponsored-content">
                <?php query_posts('showposts=2&cat=16'); ?>
                <?php while (have_posts()) : the_post(); ?>
                   <div class="row">
                         <?php 

                        $image = get_field('post_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)

                        if( $image ) {

                          echo wp_get_attachment_image( $image, $size );

                        }?>
                    <div class="fr sponsored-excerpt"><h4> <?php the_title(); ?> </h4>
                    <p class="sponsored-post">Sponsored Post</p>
                    <p><?php the_field('post_excerpt'); ?></p>
                    <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                    </div>
                    </div><!--end row-->
                    
                <?php endwhile; ?>
            </div><!--end sponsored-content-->
            </div>
        </div><!-- .page-content-->   

    

        <!--SIDEBAR--> 
         <div class="page_sidebar fr">
        <?php get_sidebar(); ?>
        </div>
     </div><!--end page-frame-group -->
</div>

<?php get_footer(); ?> 