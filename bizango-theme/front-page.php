<?php
/**
 * Template for displaying pages
 * 
 * @package bizango-theme
 */

get_header();
?> 





<div class="main_content">
    <div   <?php
            if ( get_field('cover_image') ) {//display "cover story" image as background image 
            echo 'style="background-image: url(' . get_field('cover_image') . '); background-size: cover;"';
            }?> class="cover-story ">
   

        <div class="cover-snippet-wrap" >
        
            <!-- display categories of cover story-->
            <div class="categories page_frame"><?php $cats='' ;
            foreach((get_the_category()) as $category) {
                $cats=$cats.$category->cat_name . ': ';}
            $cats = substr($cats,0,-2); echo $cats; ?></div>

            <!--display most recent story with "Cover Story" category -->
            <div class=" page_frame">
            <?php $cat_id = 8; //the cover story category ID
            $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
            </div>
        <a href="<?php the_permalink(); ?>">
        <h1><?php the_title(); ?></h1>  

        <?php the_field('post_excerpt'); ?>

        <?php endwhile; endif; ?></a>
        </div><!--end cover snippet wrap-->
     
    </div> <!-- end .cover-story -->
    <div class="page_frame group ">
     
     <div class="page_content fl">
     <div class="feature-group">
    <?php query_posts('category_name=FEATURES&showposts=3');
        while ( have_posts() ) : the_post(); ?> 

            
          
            <div class="feature-story">
               <!--Display category name except "Features"-->
                <img src="<?php the_field('post_image'); ?>">
                <div class="categories"><?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                    if($category->name !== 'Features'){
                            $output .= '<span class="post-category-info"><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;}
                        }
                    echo trim($output, $separator);
                    }
                ?> </div>
              <a href="<?php the_permalink(); ?>">
                <h2> <?php the_title(); ?> </h2></a>
                <p> <?php the_field('post_excerpt'); ?> </p>
              
            </div>

           
 
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
       
     </div>  <!--end feature group-->  
            <div class="main-ad"> 
            <?php query_posts('showposts=1&cat=9'); ?>
            <?php while (have_posts()) : the_post(); ?>
                  <?php the_content(); ?> 
             <?php endwhile; ?>

            </div>

             <div class="spotlight"> 
                 <div class="living-the-life fl white-bg"> 

                    <?php query_posts('showposts=1&cat=13'); ?>
                    
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_category(); ?>  <?php the_content(); ?> 
                     <?php endwhile; ?>
                 </div>

                 <div class="product-spotlight fl white-bg"> 
                    <?php query_posts('showposts=1&cat=14'); ?>
                  
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_post_thumbnail() ?>
                         <?php the_category(); ?>   <?php the_content(); ?> 
                     <?php endwhile; ?>
                 </div>


            </div>

            <!-- BEGIN: Benchmark Email Signup Form Code -->
            <div class="news-signup">
                Get weekly updates from
                <p class="mv-subscribe"><span>marijuana venture</span></p>
                <script type="text/javascript" id="lbscript704450" src="https://www.benchmarkemail.com/code/lbformnew.js?mFcQnoBFKMTz2sY8%252Ft2m0uZXUawFafLCaOj5IMQffuk1SgsGRzPBIg%253D%253D"></script><noscript>Please enable JavaScript <br /></noscript>
            </div>
            <!-- END: Benchmark Email Signup Form Code -->

            <div class="now-available">
                  <?php the_field('post_excerpt'); ?>
            </div>

        </div><!-- .page-content-->   

    <!-- SIDEBAR -->
    <div class="page_sidebar fr">
        <div class="green-icons">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </div>
        <?php query_posts('showposts=5&cat=-3,-8,-9,-11,-13,-14'); ?>
        
        <div class="news-group">
        
        <h2>Latest News</h2>
        <?php while (have_posts()) : the_post(); ?>

            <div  class="news-feed">

            <?php if (in_category('10')) : ?>
                  <p><?php the_content(); ?> </p>
            <?php else : ?>
                <?php $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo esc_html( $categories[0]->name );   
                } ?>
                 <a href="<?php the_permalink(); ?>">
                <h3> <?php the_title(); ?> </h3>
                <p><?php the_content(); ?> </p>
              </a>   
            <?php endif; ?>

               
              </div> 
         <?php endwhile; ?>
         </div> <!-- end news-group -->

         <div class="instagram">
            <?php echo do_shortcode('[instagram-feed]'); ?>
         </div>

    </div><!--end sidebar -->
     </div><!--end page-frame-group -->
</div>

<?php get_footer(); ?> 