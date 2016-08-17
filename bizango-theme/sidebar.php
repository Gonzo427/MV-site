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
            <a href="https://www.facebook.com/MJVenture/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/mjventure/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://twitter.com/mjventure" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
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