  <?php 
/**
 * Template for mobile current issue (replaces slider)
 * 
 * @package bizango-theme
 */



 ?>  

 	 

<?php 
	$images = get_field('current_issue_slider');
    if( $images ): 
        $image_1 = $images[0]; 
?>                
	<div class="m-now-available">

            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $images[0]['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
            </a>  
            <a class="buy-now" href="<?php the_permalink(); ?>"> Buy Now</a>
    </div>
     
<?php endif; ?>