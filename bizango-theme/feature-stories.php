<?php 
/**
 * Template for feature stories
 * 
 * @package bizango-theme
 */


 ?>    

    <div class="feature-group ">
    <?php 
        while ( have_posts() ) : the_post(); ?> 
          
            <div class="feature-story thick-top-border">
              
            <div class="feature-image-wrap">
                <?php 

                $image = get_field('post_image');
                $size = 'feature-thumb'; // (thumbnail, medium, large, full or custom size)

                if( $image ) {

                  echo wp_get_attachment_image( $image, $size );

                }?>
                </div>
                <div class="categories"><?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                    if($category->name !== 'Features'){ //Display category name except "Features"
                            $output .= '<span class="post-category-info"><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;}
                        }
                    echo trim($output, $separator);
                    }
                ?> </div>
              <a href="<?php the_permalink(); ?>">
                <h2> <?php the_title(); ?> </h2></a>
                <p> <?php the_field('post_excerpt'); ?> </p>
                 <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
            </div>

           
 
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
       
     </div> 