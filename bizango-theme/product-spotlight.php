<!--Product Spotlight section -->
<div class="spotlight"> 
  <div class="living-the-life fl white-bg"> 
      <?php query_posts('showposts=1&cat=2069'); ?> <!-- display most recent story with category = Living the Life -->
          <?php while (have_posts()) : the_post(); ?>

            <!--display only Living the Life Category Name-->
             <ul>
                <?php wp_list_categories( array(
                    'title_li' => '',
                    'include' => array( 2069)
                ) ); ?> 
            </ul>
                  <div class="spotlight-image">   

                  <?php //this code gets the image from the custom field
                    $image = get_field('post_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)

                    if( $image ) {
                      echo wp_get_attachment_image( $image, $size ); }?>
                  </div>
                        <div class="padding-25">
                          <h2> <?php the_title(); ?> </h2>
                          <?php the_excerpt();?> 
                          <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                        </div>
                     <?php endwhile; ?>
  </div> <!--end Living the Life section -->

  <div class="product-spotlight fl white-bg"> 
      <?php query_posts('showposts=1&cat=2076'); ?><!-- display most recent story with category = Product Spotlight-->
          <?php while (have_posts()) : the_post(); ?>
               <!--display only Product Spotlight Category Name-->
             <ul>
                <?php wp_list_categories( array(
                    'title_li' => '',
                    'include' => array( 2076)
                ) ); ?> 
            </ul>
                                 
                 <div class="spotlight-image" style="color:red;" > 
                        <?php //this code gets the image from the custom field
                  $image = get_field('post_image');
                  $size = 'full'; // (thumbnail, medium, large, full or custom size)
                  ?>       
                  <?php if( $image ) {echo wp_get_attachment_image( $image, $size );}?>     

                  </div>      
                      <div class="padding-25">
                        <h2> <?php the_title(); ?> </h2>
                        <?php the_excerpt(); ?>
                        <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
                      </div>
          <?php endwhile; ?>
  </div><!--end Product Spotlight section -->
</div><!--end spotlight section -->
