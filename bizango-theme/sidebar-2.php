<?php 
/**
 * Template for sidebar-2
 * 
 * @package bizango-theme
 */



 ?>
 <?php dynamic_sidebar( 'secondary' ); ?>
<!-- SIDEBAR -->
   
        <?php query_posts('showposts=5&cat=-3,-8,-9,-11,-13,-14,-15,-16,-17,-19'); ?>
        
        <!--NEWS STORIES-->
        <?php include "latest-news.php"; ?>

       	<!--end news stories-->

        

  <!--end sidebar -->