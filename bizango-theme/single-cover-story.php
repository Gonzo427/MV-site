<?php
/**
 * Single Post Template:  cover story single post
 * 
 * @package bizango-theme
 */

get_header();

?> 
<?php
   query_posts('showposts=1&cat=2072'); 
    while ( have_posts() ) : the_post(); ?> 
          <div <?php
            
            $image_array = wp_get_attachment_image_src($image_id, $image_size);
            $image_id = get_field('post_image');
            // and the image size you want to return
            $image_size = 'full';
                $image_array = wp_get_attachment_image_src($image_id, $image_size);
                $image_url = $image_array[0];
            if ( $image_id) {//display  image as header image 
            echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' . $image_url . '); background-size: cover;"';
            }?> class="post-bg <?php the_category_unlinked(' '); ?>">

            <div class="cover-snippet-wrap" >
            <div class=" page_frame cover-content">
            
            <!--display most recent story with "Cover Story" category -->
            <div class="flex-wrap">
                  <div class="fl ">
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
                  </div><!--end categories -->
                        <h1><?php the_title(); ?></h1>
                    </div><!--end fl-->
                   
                </div><!--end flex-wrap-->
                 <div class="page_quarter fr byline-wrap">
                            <?php //display author photo if available from post, otherwise display default image
                            if(get_field('author_image'))
                            {
                                echo '<div class="author-image fl" style="background-image:url( '. get_field("author_image") .' )"></div>';
                            }else{
                                echo '<div class="author-image fl" style="background-image:url(/wp-content/uploads/2016/08/default-author-image.png)"></div>';
                            }
                        ?>
                
                        <div class="author-info fl">
                            <?php //display author name if available from post, otherwise display default byline
                                if(get_field('author'))
                                {
                                    echo '<p class="byline">By ' . get_field('author') . '</p>';
                                }else{
                                    echo '<p class="byline">By MV Staff Writer </p>'; 
                                }
                            ?>
                            <p class="post-date"><?php the_date(); ?></p>
                        </div>
                    </div>
            </div><!--end page-frame-->
            </div>
</div><!--end post-bg-->

         <div class="page_frame group"> 
         <div class="post_content white-bg fl thick-top-border">
            <div class="">
                <?php 
 
                  $image = get_field('post_image');
                  $size = 'full'; // (thumbnail, medium, large, full or custom size)
     
                 // if( $image ) { echo wp_get_attachment_image( $image, $size );}?>
     
                   <h3> <?php the_field('subtitle'); ?></h3>

                    <p><?php the_content(); ?> <!-- Page Content --></p>
             
             <!--social share links -->
            <?php echo do_shortcode('[apss_share]');?>
            <!--end social -->
               
         <!--comment section -->     
         <div class="comments-section">
            <a class="comment-btn" style="cursor:pointer" onclick="jQuery('#respond').toggle();">Comment</a>
            <?php comments_template('comments.php'); ?> 
         </div>
        <!--end comments section -->
        </div>
          
        </div><!-- .page-content-page -->

          
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query

        ?>
        <div class="page_sidebar fr">
        <?php get_sidebar(); ?>
        </div>
         
           <div class="page_two_thirds group">
           <!--NEWS STORIES-->
            <?php query_posts('cat=3&showposts=3'); ?>
             <?php include "feature-stories.php"; ?>
            <!--end news stories-->
             <!-- Email Signup Form-->
           <?php include "email-signup.php"; ?>
            
            
           </div>
            <!-- END: Email Signup Form -->
    </div><!--end page_frame group-->

<?php get_footer(); ?> 