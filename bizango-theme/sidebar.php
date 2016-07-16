<?php 
/**
 * Template for sidebar
 * 
 * @package bizango-theme
 */



 ?>
 <?php dynamic_sidebar( 'primary' ); ?>
<!-- SIDEBAR -->
    <div class="page_sidebar fr">
        <div class="green-icons">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </div>
        <?php query_posts('showposts=5&cat=-3,-8,-9,-11,-13,-14,-15,-16,-17,-19'); ?>
        
        <!--NEWS STORIES-->
        <div class="news-group">
        
        <h2>Latest News</h2>
        <?php while (have_posts()) : the_post(); ?>

            <div  class="news-feed">

            <?php if (in_category('10')) : ?>
                  <p><?php the_content(); ?> </p>
            <?php else : ?>
                <div class="categories">
                <?php $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo esc_html(  $categories[0]->name );   
                } ?></div>
                 <a href="<?php the_permalink(); ?>">
                <h3> <?php the_title(); ?> </h3> </a> 
                <p><?php the_field('post_excerpt'); ?></p>
                <div class="time-stamp"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></div>
                <hr>
            <?php endif; ?>

               
              </div> 
         <?php endwhile; ?>
         </div> <!-- end news-group -->

         <div class="instagram">
            <?php echo do_shortcode('[instagram-feed]'); ?>
         </div>
          <div class="sidebar-ad"> 
            <?php query_posts('showposts=1&cat=18'); ?>
            <?php while (have_posts()) : the_post(); ?>
                  <?php the_content(); ?> 
             <?php endwhile; ?>

            </div>

    </div><!--end sidebar -->