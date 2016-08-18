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
                  $upload_dir = wp_upload_dir();
                  if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                  } elseif( has_post_thumbnail() ) {
                       the_post_thumbnail($size);
                  }else{//use default image if no thumbnail available
                   echo '<img src=" '.$upload_dir['baseurl'] .'/2016/08/marijuana-hands-1.jpg">';
                    }?>

            </div>
                <div class="categories">
                     <!--show only one category name, even if post has multiple categories-->
                        <?php 
                        $category = get_the_category(); 

                        if($category[0]->cat_name == "Features") {

                            //if first category in array is "Cover Story", get next category in line
                             $name = $category[1]->cat_name;
                             $cat_id = get_cat_ID( $name );
                             $link = get_category_link( $cat_id );
                             echo '<a href="'. esc_url( $link ) .'">'. $name .'</a>';

                        } else {

                            //get the first category
                             $name = $category[0]->cat_name;
                             $cat_id = get_cat_ID( $name );
                             $link = get_category_link( $cat_id );
                             echo '<a href="'. esc_url( $link ) .'">'. $name .'</a>';

                        }?>  
                </div>
              <a href="<?php the_permalink(); ?>">
                <h2> <?php the_title(); ?> </h2></a>
               <?php the_excerpt(); ?> 
                 <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
            </div>

           
 
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
       
     </div> 