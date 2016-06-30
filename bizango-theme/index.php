<?php
/**
 * The theme header
 * 
 * @package bizango-theme
 */

get_header();

/**
 * determine main column size from actived sidebar
 */

?>


<div class="page_frame group">
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="page_quarter fl">
            <?php the_title(); ?> <!-- Page Content -->
        </div>

        <div class="page_wide_content fr">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
?>

                     


</div>

<?php get_footer(); ?> 