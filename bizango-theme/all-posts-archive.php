<?php
/**
 * Template Name:  all-post-archive
 * 
 * @package bizango-theme
 */

get_header();
?> 

<div class="main_content">
<div class="page_frame group">
<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1, 'cat'=>-2075,-2079, 'id'=>-150)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>
<div class="page_wrap white-bg thick-top-border fl">
       

        <h1><?php the_title(); ?></h1> <!-- Page Title -->
       
            <p><?php the_content(); ?></p> <!-- Page Content -->
    <ul>

        <!-- the loop -->
        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <div class="categories ">
                <?php
                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                    if($category->name !== 'uncategorized'){
                            $output .= '<span class="post-category-info left-0"><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></span>'.$separator;}
                        }
                    echo trim($output, $separator);
                    }
                ?> 
                </div>


            <li><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></li>
        <?php endwhile; ?>
        <!-- end of the loop -->

    </ul>
</div>
    <?php wp_reset_postdata(); ?>


    <?php else : ?>
        <div class="page_wrap white-bg thick-top-border fl">
        <h3><?php _e( 'Sorry, no posts matched your criteria.' ); ?></h3>
        <p>Search for something different: </p>
        <div class="search-form"><?php get_search_form( ); ?></div>
        </div>
    <?php endif; ?>

   <!--SIDEBAR--> 
         <div class="page_sidebar fr">
        <?php get_sidebar(); ?>
        </div>
                     

</div>

</div>

<?php get_footer(); ?> 