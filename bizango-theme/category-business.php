<?php 
/**
 * Template for business category pages with overview text
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
          <div class="category-thumb"> 
          <?php 
          $image = get_field('post_image');
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

          if( $image ) {
            echo wp_get_attachment_image( $image, $size );
           
          } elseif( has_post_thumbnail() ) {
               the_post_thumbnail($size);
          }else{//use default image if no thumbnail available
          echo '<img src=" '.$upload_dir['baseurl'] .'/2016/01/IMG_2054-e1452531274736-1024x657.jpg ">';
            }?>
        </div>


        <div class="posts-content">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <small><?php the_time('F jS, Y') ?></small>

          <div class="entry margin-bottom-40 light-border-bottom padding-bottom-20">
            <?php
            if(get_field('post_excerpt'))
            {
              echo '<p>' . get_field('post_excerpt') . '</p><a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>';
            }else{
              echo '<p>' . the_excerpt() . '</p><a class="read-more" href="<?php the_permalink(); ?>">Read More ></a>';
            }?>
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
     <?php echo category_description(2067); ?>
<span class="sub_heading"><?php echo $subheading; ?></span>
  
  </div>    
</div>
<?php get_footer(); ?>