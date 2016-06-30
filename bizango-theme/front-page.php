<?php
/**
 * Template for displaying pages
 * 
 * @package bizango-theme
 */

get_header();
?> 





<div class="main_content">
    <div   <?php
            if ( get_field('cover_image') ) {//display "cover story" image as background image 
            echo 'style="background-image: url(' . get_field('cover_image') . '); background-size: cover;"';
            }?> class="cover-story ">
   

        <div class="cover-snippet-wrap" >
        
            <!-- display categories of cover story-->
            <div class="categories page_frame"><?php $cats='' ;
            foreach((get_the_category()) as $category) {
                $cats=$cats.$category->cat_name . ': ';}
            $cats = substr($cats,0,-2); echo $cats; ?></div>

            <!--display most recent story with "Cover Story" category -->
            <div class=" page_frame">
            <?php $cat_id = 8; //the cover story category ID
        $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
        </div>

        <h1><?php the_title(); ?></h1>  

        <?php the_content(); ?>

        <?php endwhile; endif; ?>
        </div><!--end cover snippet wrap-->
     
    </div> <!-- end .cover-story -->
    <div class="page_frame group feature-group">
   
    <?php query_posts('category_name=FEATURES&showposts=3');
        while ( have_posts() ) : the_post(); ?> 

                <?php get_the_post_thumbnail (); ?>
            <div class="page_content feature-story">
               <!--Display category name except "Features"-->
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
              
                <h2> <?php the_title(); ?> </h2>
                <p><?php the_content(); ?> </p>
              
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