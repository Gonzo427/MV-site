<?php 
/**
 * Template for sidebar
 * 
 * @package bizango-theme
 */



 ?>
 <?php dynamic_sidebar( 'primary' ); ?>
<!-- SIDEBAR -->
   
        <div class="green-icons">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </div>
      
        
        <!--NEWS STORIES-->
         <div class="news-group thick-top-border">
          <h2>Latest News</h2>
        <?php include "latest-news.php"; ?>
		</div>
       	<!--end news stories-->

        <div class="instagram">
            <?php echo do_shortcode('[instagram-feed]'); ?>
        </div>
         <div class="sidebar-ad"> 
            <?php query_posts('showposts=1&cat=18'); ?>
            <?php while (have_posts()) : the_post(); ?>
                  <?php the_content(); ?> 
             <?php endwhile; ?>

        </div>

  <!--end sidebar -->