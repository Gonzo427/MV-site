<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bizango-theme
 */

get_header();

?> 

<div class="page_frame group">
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
          <div class="page_content fl">
            <div class="white-bg">
            <?php the_title(); ?> <!-- Page Content -->
        
            <?php the_content(); ?> <!-- Page Content -->
            <?php comments_popup_link( $zero, $one, $more, $css_class, $none ); ?> 

            </div>
            <!-- Email Signup Form-->
           <?php include "email-signup.php"; ?>
            <!-- END: Email Signup Form -->
        </div><!-- .page-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query

?>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?> 