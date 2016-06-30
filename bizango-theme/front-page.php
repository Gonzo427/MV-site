<?php
/**
 * Template for displaying pages
 * 
 * @package bizango-theme
 */

get_header();
?> 





<div class="main_content">
    <div class="page_frame group">
    <?php query_posts('category_name=FEATURES&showposts=3');
        while ( have_posts() ) : the_post(); ?> 


            <div class="page_content fl" style="background-color:lightgrey;">
                 <?php the_title(); ?> 
               <?php the_content(); ?>
              
            </div><!-- .entry-content-page -->

        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
    ?>

    <div class="page_sidebar fr">
    </div>
                         

    </div>
</div>

<?php get_footer(); ?> 