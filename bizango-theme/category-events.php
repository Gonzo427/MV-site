<?php 
/**
 * Template for events
 * 
 * @package bizango-theme
 */

get_header(); ?> 


<div class="main_content">
  <div class="page_frame group white-bg thick-top-border margin-top-40 margin-bottom-40 padding-25"> 
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
<h1 class="archive-title margin-bottom-40 light-border-bottom padding-bottom-20 padding-top-20" >Category: <span class="orange"><?php single_cat_title( '', true ); ?></span></h1>
</header>



<?php while ( have_posts() ) : the_post(); ?>
        <div class="list-of-posts">   
          <!--post thumbnail images -->
          <?php 

          $image = get_field('post_image');
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

          if( $image ) {
            echo wp_get_attachment_image( $image, $size );

          }?>


        <div class="posts-content">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="entry margin-bottom-40 light-border-bottom padding-bottom-20">
            
            <p> <?php the_content(); ?> </p>




            <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>
          </div>
        </div>
    </div><!--end of list-of-posts-->

<?php endwhile; 
  
else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>

 <!--SIDEBAR--> 
        
  </div>
</div>


<?php get_footer(); ?>