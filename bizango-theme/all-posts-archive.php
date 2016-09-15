<?php
/**
 * Template Name:  all-post-archive
 * 
 * @package bizango-theme
 */

get_header();
?> 

<div class="main_content">
<div class="page_frame group white-bg thick-top-border margin-top-40 margin-bottom-40 padding-25">


<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged, 'cat'=>-2079, 'id'=>-150 );
$wp_query = new WP_Query($args);
while ( have_posts() ) : the_post(); ?>
   
     <div class="list-of-posts group">   
          <!--post thumbnail images -->
        <div class="category-thumb"> 
          <a href="<?php the_permalink(); ?>">
          <?php 
          $image = get_field('post_image');
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
          $upload_dir = wp_upload_dir();
          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
           
          } elseif( has_post_thumbnail() ) {
               the_post_thumbnail($size);
          }else{//use default image if no thumbnail available
           echo '<img src=" '.$upload_dir['baseurl'] .'/2016/01/IMG_2054-e1452531274736-1024x657.jpg ">';
            }?>
            </a>
        </div>

        <div class="posts-content">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <small><?php the_time('F jS, Y') ?></small>

          <div class="entry margin-bottom-40 light-border-bottom padding-bottom-20">
           <?php
            if(get_field('post_excerpt'))
            {
              echo '<p>' . excerpt(50) . '</p><a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>';
            }else{
              echo '<p>' . excerpt(50) . '</p><a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>';
            }?>
          </div>
        </div>
    </div><!--end of list-of-posts-->



<?php endwhile; ?>

<!-- pagination links -->
<div class="nav-previous alignleft"><?php next_posts_link( '< Older posts', $wp_query ->max_num_pages); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts >' ); ?></div>


         

</div>

</div>

<?php get_footer(); ?> 