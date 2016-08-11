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

        <div class="instagram margin-top-25">
            <?php echo do_shortcode('[instagram-feed]'); ?>
        </div>

         <div class="sidebar-ad">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-ad')) : else : ?>
            <?php endif; ?>
         </div>

  <!--end sidebar -->