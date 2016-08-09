<!--Product Spotlight section -->
<div class="spotlight"> 
  <div class="living-the-life fl white-bg"> 
      <?php query_posts('showposts=1&cat=13'); ?> <!-- display most recent story with category = Living the Life -->
          <?php while (have_posts()) : the_post(); ?>
              <?php the_category(); ?>  
                       
                  <?php //this code gets the image from the custom field
                    $image = get_field('post_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)

                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size ); }?>
                        <div class="padding-25">
                          <h2> <?php the_title(); ?> </h2>
                          <p> <?php the_field('post_excerpt'); ?> </p>
                          <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                        </div>
                     <?php endwhile; ?>
  </div> <!--end Living the Life section -->

  <div class="product-spotlight fl white-bg"> 
      <?php query_posts('showposts=1&cat=14'); ?><!-- display most recent story with category = Product Spotlight-->
          <?php while (have_posts()) : the_post(); ?>
              <?php the_category(); ?> 
                       
              <?php //this code gets the image from the custom field
                  $image = get_field('post_image');
                  $size = 'full'; // (thumbnail, medium, large, full or custom size)
                      if( $image ) {
                          echo wp_get_attachment_image( $image, $size );}?>
                      <div class="padding-25">
                        <h2> <?php the_title(); ?> </h2>
                        <p><?php the_field('post_excerpt'); ?></p>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                      </div>
          <?php endwhile; ?>
  </div><!--end Product Spotlight section -->
</div><!--end spotlight section -->
