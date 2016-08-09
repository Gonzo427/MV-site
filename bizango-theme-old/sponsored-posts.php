 <div class="sponsored-wrap">
    <h3>NEWS, PRODUCTS &amp; PROFILES</h3>
           <?php
                // Get the ID of a given category
                $category_id = get_cat_ID( 'Sponsored News, Products, Profiles' );

                // Get the URL of this category
                $category_link = get_category_link( $category_id );?>
                <a class="see-more-btn"href="<?php echo esc_url( $category_link ); ?>" title="News, Products and Profiles">See More</a>
           
  <div class="sponsored-content">
        <?php query_posts('showposts=2&cat=16'); ?> <!--show 2 posts of category = SPONSORED NEWS, PRODUCTS, PROFILES-->
        <?php while (have_posts()) : the_post(); ?>
            <div class="row">
                <?php //get image from custom field
                  $image = get_field('post_image');
                  $size = 'full'; // (thumbnail, medium, large, full or custom size)
                  if( $image ) {
                      echo wp_get_attachment_image( $image, $size );
                  }?>
              <div class="fr sponsored-excerpt"><h4> <?php the_title(); ?> </h4>
                  <p class="sponsored-post">Sponsored Post</p>
                  <p><?php the_field('post_excerpt'); ?></p>
                    <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
              </div>
            </div><!--end row-->
                    
                <?php endwhile; ?>
    </div><!--end sponsored-content-->
</div><!--end sponsored-wrap -->