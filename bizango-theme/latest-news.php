  <?php 
/**
 * Template for email latest news
 * 
 * @package bizango-theme
 */


 ?>        


       
        <?php query_posts('showposts=7&cat=175,1067,2067,2079,-35,-177,-122,-2972,-2073,-2076,-2078,-2069,-2075'); ?>
       
        <?php while (have_posts()) : the_post(); ?>

            <div  class="news-feed">
 
            <?php if (in_category('Ad - News Feed')) : ?>
                  <?php the_content(); ?> 
                  <hr>

            <?php else : ?>
                <div class="categories">
                <?php $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo esc_html(  $categories[0]->name );   
                } ?></div>
                 <a href="<?php the_permalink(); ?>">
                <h3> <?php the_title(); ?> </h3> </a> 
                <?php the_excerpt(); ?>
                <div class="time-stamp"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></div>
                <hr>

            <?php endif; ?>

              
              </div> 
         <?php endwhile; ?>

        <a class="more-news-btn" href="/all-posts-archive">More</a>