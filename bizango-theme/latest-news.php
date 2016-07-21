  <?php 
/**
 * Template for email latest news
 * 
 * @package bizango-theme
 */



 ?>        


       
        <?php query_posts('showposts=5&cat=-3,-8,-9,-11,-13,-14,-15,-16,-17,-19'); ?>
       
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
       