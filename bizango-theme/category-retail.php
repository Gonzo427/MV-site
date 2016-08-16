<?php 
/**
 * Template for retail category pages with overview text
 * 
 * @package bizango-theme
 */

get_header();

 ?>    
<div class="main_content">
  <div class="page_frame group white-bg thick-top-border margin-top-40 margin-bottom-40 padding-25"> 
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
<h1 class="archive-title margin-bottom-40 light-border-bottom padding-bottom-20 padding-top-20" >Category: <span class="orange"><?php single_cat_title( '', true ); ?></span></h1>

</header>
<div class="page_half fl" >
<?php
// The Loop
while ( have_posts() ) : the_post(); ?>
        <div class="list-of-posts group">   
          <!--post thumbnail images -->
          <?php 

          $image = get_field('post_image');
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

          if( $image ) {

            echo wp_get_attachment_image( $image, $size );

          }?>


        <div class="posts-content">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

          <div class="entry margin-bottom-40 light-border-bottom padding-bottom-20">
            <p> <?php the_field('post_excerpt'); ?> </p>
            <a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>

            <p class="postmetadata"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
            ?></p>
          </div>
        </div>
       
    </div><!--end of list-of-posts-->

<?php endwhile; 
  
else: ?>
<p>Sorry, no posts matched your criteria.</p>

</div><!--end page_half-->
<?php endif; ?>
   
  </div>

 <div class="page_half fr" >
   <!--SIDEBAR--> 
    <?php echo category_description(1067); ?>

<span class="sub_heading"><?php echo $subheading; ?></span>
  
  </div>    
</div>
<?php get_footer(); ?>