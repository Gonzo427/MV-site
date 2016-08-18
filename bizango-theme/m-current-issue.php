  <?php 
/**
 * Template for mobile current issue (replaces slider)
 * 
 * @package bizango-theme
 */



 ?>  

 	 
<?php //query_posts('showposts=1&cat=2078'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
    <h1> test </h1>
<?php 
	$images = get_field('current_issue_slider');
    if( $images ): ?>            
    <img src="<?php echo $images[0]["sizes"]["large"]; ?>" >

    
	<div class="m-now-available">

            <a href="#">
                <!--<img src="<?php //echo $images[0]['url']; ?>" alt="<?php //echo $image['alt']; ?>" />-->
            </a>  
            <a class="buy-now" href="/product-category/subscriptions"> Buy Now</a>
    </div>
     
<?php endif; ?>