<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bizango-theme
 */

get_header();

?> 


<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?>

          <div <?php
            $image_array = wp_get_attachment_image_src($image_id, $image_size);
            $image_id = get_field('post_image');
            $story_header_image_id = get_field('story_header_image');
            $thumb_id = get_post_thumbnail_id();
            $post_thumbnail = wp_get_attachment_thumb_url($thumb_id,$image_size, true);
            $default_image =  get_template_directory_uri() . '/images/marijuana.jpg';
            // and the image size you want to return
            $image_size = 'full';
                $image_array = wp_get_attachment_image_src($image_id, $image_size);
                $header_array = wp_get_attachment_image_src($story_header_image_id, $image_size);
                $image_url = $image_array[0];
                $header_url = $header_array[0];
            if ( $image_id) {//display  image as header image 
            echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' . $image_url . '); background-size: cover;"';
            }elseif($story_header_image_id){

                echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' . $header_url . '); background-size: cover;"';

            }elseif( has_post_thumbnail() ) {
                echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' .    $post_thumbnail . '); background-size: cover;"';
            }else{
                echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' . $default_image . '); background-size: cover;"';
            }

            ?> class="post-bg <?php the_category_unlinked(' '); ?>">
                 <div class="page_frame group"> 
                    <div class="page_three_quarter fl story-title-wrap">
                        <div class="categories"><?php
                            $categories = get_the_category();
                            $separator = ' | ';
                            $output = '';
                            if($categories){
                                foreach($categories as $category) {
                            if($category->name !== 'Features'){
                                    $output .= '<span class="post-category-info"><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;}
                                }
                            echo trim($output, $separator);
                            }
                        ?> </div>
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="page_quarter fr padding-top-20 ">
                         <?php //display author photo if available from post, otherwise display default image
                            if(get_field('author_image'))
                            {
                                echo '<div class="author-image fl" style="background-image:url( '. get_field("author_image") .' )"></div>';
                            }else{
                                echo '<div class="author-image fl" style="background-image:url(/wp-content/uploads/2016/08/default-author-image.png)"></div>';
                            }
                        ?>
                
                        <div class="author-info fl ">
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
                </div><!--end page_frame-->
            </div><!--end post-bg-->





        <div class="page_frame group"> 
        <div class="post_content white-bg fl thick-top-border">
        <div >
            <?php 

              $image = get_field('post_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)

              //if( $image ) { echo wp_get_attachment_image( $image, $size );}?>

               <h3> <?php the_field('subtitle'); ?></h3>
               <p><?php the_content(); ?></p> <!-- Page Content -->
               
             <!--comment section -->     
             <div class="comments-section">
                <a class="comment-btn" style="cursor:pointer" onclick="$('#respond').toggle();">Comment</a>
                <?php comments_template('comments.php'); ?> 
             </div>
            <!--end comments section -->
        </div>
          
        </div><!-- .post-content-page -->

          
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query

        ?>
        
         
           <div class="page_two_thirds group">
           <!--NEWS STORIES-->
            <?php query_posts('cat=35&showposts=3'); ?>
             <?php include "feature-stories.php"; ?>

            <!--end news stories-->
             <!-- Email Signup Form-->
           <?php include "email-signup.php"; ?>
            
            
           </div>
            <!-- END: Email Signup Form -->
        
        <div class="page_sidebar fr">
            <?php get_sidebar(); ?>
        </div>
    </div><!--end page_frame group-->

<?php get_footer(); ?> 