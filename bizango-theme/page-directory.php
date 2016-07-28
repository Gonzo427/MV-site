<?php
/**
 * Template Name: Directory
 * 
 * @package bizango-theme
 */

get_header();
?> 

<div class="main_content">
<div class="page_frame group">
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="page_wrap white-bg thick-top-border fl">
            <h1><?php the_title(); ?></h1> <!-- Page Title -->
       
            <p><?php the_content(); ?></p> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

   <!--SIDEBAR--> 
         <div class="page_sidebar fr">
        <?php get_sidebar(); ?>
        </div>
                     

</div>

</div>

<?php get_footer(); ?> 