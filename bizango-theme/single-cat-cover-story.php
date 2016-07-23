<?php
/**
 * Single Post Template:  cover story single post
 * 
 * @package bizango-theme
 */

get_header();

?> 


<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
          <div <?php
            if ( get_field('post_image') ) {//display  image as header image 
            echo 'style="background: linear-gradient(rgba(50, 57, 72, 0.4), rgba(50, 57, 72, 0.4)), rgba(50, 57, 72, 0.4) url(' . get_field('post_image') . '); background-size: cover;"';
            }?>class="post-bg">
                 <div class="page_frame group"> 
                    <div class="page_three_quarter fl">
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
         <div class="page_frame group"> 
         <div class="post_content white-bg fl thick-top-border">
            <div class="">
                <img src="<?php the_field('post_image'); ?>"  alt=""/>
                <?php the_content(); ?> <!-- Page Content -->
             
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
             <?php include "feature-stories.php"; ?>
            <!--end news stories-->
             <!-- Email Signup Form-->
           <?php include "email-signup.php"; ?>
            
            
           </div>
            <!-- END: Email Signup Form -->
    </div><!--end page_frame group-->

<?php get_footer(); ?> 