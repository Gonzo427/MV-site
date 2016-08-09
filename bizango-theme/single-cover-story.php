<?php
/**
 * Single Post Template:  cover story single post
 * 
 * @package bizango-theme
 */

get_header();

?> 
<?php
   query_posts('showposts=1&cat=8'); 
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
                        <div class="categories"><?php
                    $categories = get_the_category();
                    $separator = ' ';
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
                    <div class="page_quarter fr">
                        <div class="white-dot"></div>
                        <p class="byline">By <?php the_author(); ?></p>
                        <p class="post-date"><?php the_date(); ?></p>
                    </div>
                </div><!--end page_frame-->
            </div><!--end post-bg-->
</div>
</div>

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