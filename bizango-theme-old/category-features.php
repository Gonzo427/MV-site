<?php 
/**
 * Template for features category
 * 
 * @package bizango-theme
 */

get_header();

 ?>    

  <div class="main_content">
    <div class="page_frame group "> 
    <h1>Feature Stories</h1>
    </div>
    <?php query_posts('cat=3&showposts=3');
        while ( have_posts() ) : the_post(); ?> 

          <div class="page_frame group">
          
            <div class="features"> 
               <!--Display category name except "Features"-->
                <img src="<?php the_field('post_image'); ?>">
                <div class="categories">
                <?php
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
                ?> 
                </div>
              <a href="<?php the_permalink(); ?>">
                <h2> <?php the_title(); ?> </h2></a>
                <p> <?php the_field('post_excerpt'); ?> </p>
                 <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
            </div>
          </div>
 
 
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
       </div>
    

     <?php get_footer(); ?> 