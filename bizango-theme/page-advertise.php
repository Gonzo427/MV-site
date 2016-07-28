<?php
/**
 * Template Name: Advertisers
 * 
 * @package bizango-theme
 */

get_header();
?> 

<div class="main_content">

<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
     <div <?php
            $image_array = wp_get_attachment_image_src($image_id, $image_size);
            $image_id = get_field('header_image');
            // and the image size you want to return
            $image_size = 'full';
                $image_array = wp_get_attachment_image_src($image_id, $image_size);
                $image_url = $image_array[0];
            if ( $image_id) {//display  image as header image 
            echo 'style="background: url(' . $image_url . '); background-size: cover;"';
            }?> class="post-bg">
              <div class="page_frame group"> 
                <h1><?php the_title(); ?></h1> <!-- Page Title -->
              </div><!--end page_frame -->

    </div><!-- end post-bg-->
<div class="page_frame group">

        <div class="page_full white-bg thick-top-border fl">
            <!--contact info-->
                 <div class="page_sidebar fr">
                 <div class="contact-wrap">
                    <h4>Contact Us</h4>
                    <p>Advertising</p>
                   <?php the_field('contact_info') ?>
                   </div>
                 </div>

            <div class="advertiser_wrap">
                <p><?php the_content(); ?></p> <!-- Page Content -->
            </div>

            <div class="wrap">
                <div class="find-us-in">
                <h3>Find us in:</h3>
                         <?php the_field('find_us_in'); ?>
                </div>
            </div>
            <hr>
            <!--Quote section -->
            <h3 class="advertiser-quote orange">What Our Advertisers Say:</h3>
                <?php

                // check if the repeater field has rows of data
                if( have_rows('advertiser_quote') ):

                    // loop through the rows of data
                    while ( have_rows('advertiser_quote') ) : the_row();

                        // display a sub field value
                       ?> <p><?php the_sub_field('quote');?> </p>
                     <p><?php the_sub_field('name');?></p>

                  <?php endwhile;

                else :

                    // no rows ound

                endif;

                ?>

        </div><!--end page_full-->

    </div><!-- .page_frame group -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

  
        
                     

</div><!--end main content-->


<?php get_footer(); ?> 