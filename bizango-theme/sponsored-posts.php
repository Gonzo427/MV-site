 <div class="sponsored-wrap">
    <h3>NEWS, PRODUCTS &amp; PROFILES</h3>
           <?php
                // Get the ID of a given category
                $category_id = get_cat_ID( 'Sponsored News, Products, Profiles' );

                // Get the URL of this category
                $category_link = get_category_link( $category_id );?>
                <a class="see-more-btn" href="<?php echo esc_url( $category_link ); ?>" title="News, Products and Profiles">See More</a>
           
  <div class="sponsored-content">
        <?php query_posts('showposts=2&cat=2077'); ?> <!--show 2 posts of category = SPONSORED NEWS, PRODUCTS, PROFILES-->
        <?php while (have_posts()) : the_post(); ?>
            <div class="row">
             <a href="<?php the_permalink(); ?>">
                <?php 
                  $image = get_field('post_image');
                 
                  $size = 'feature-thumb'; // (thumbnail, medium, large, full or custom size)
                   $post_thumbnail = the_post_thumbnail($size);
                  $upload_dir = wp_upload_dir();
                  if( $image ) {
                    echo     '<a href=" '.get_permalink( $post->ID).' ">' . wp_get_attachment_image( $image, $size ) . '</a>';
                  } elseif( has_post_thumbnail() ) {
                     echo ' <a href=" '.get_permalink( $post->ID).' ">' . $post_thumbnail  . '</a>';
                  }else{//use default image if no thumbnail available
                   echo '<a href=" '.get_permalink( $post->ID).' "><img src=" '.$upload_dir['baseurl'] .'/2016/08/marijuana-hands-1.jpg"></a>';
                    }?>
                    </a>
              <div class="fr sponsored-excerpt"><h4> <?php the_title(); ?> </h4>
                  <p class="sponsored-post">Sponsored Post</p>
                 <?php echo '<p>' . excerpt(10) . '</p>';?>
                  <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
              </div>
            </div><!--end row-->
                    
                <?php endwhile; ?>
    </div><!--end sponsored-content-->
</div><!--end sponsored-wrap -->