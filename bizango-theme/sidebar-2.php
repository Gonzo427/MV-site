<?php 
/**
 * Template for sidebar-2
 * 
 * @package bizango-theme
 */



 ?>
 <?php dynamic_sidebar( 'secondary' ); ?>
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

       


  <!--end sidebar -->