<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<div class="product-header-bg">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<!--this is custom to the theme, not to Woocommerce-->
		    <div class="page_frame group">
			<div class="page-full story-title-wrap">
				<div class="categories">Subscribe </div>
				<h1 class="page-title"><?php //woocommerce_page_title(); ?>Marijuana Venture Magazine</h1>
			</div>
			</div>
			<!--end custom title-->
		<?php endif; ?>
	</div>
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	<div class="page_frame group">'
	<div class="page_full white-bg thick-top-border">
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
		
			
			<!--NOW AVAILABLE SLIDER -->
	       <div class="now-available">
	            <?php include (TEMPLATEPATH	 . '/current-issue-slider.php'); ?>
		   </div> 
		     
	        
		

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
			 
  
			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
   
					<?php wc_get_template_part( 'content', 'product' ); ?>
					
				 
				<?php endwhile; // end of the loop. ?>


	
			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );

			?>
			<!--add Proceed to Checkout button -->
			<div class="wc-proceed-to-checkout">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php endif; ?>

		<!-- BACK ISSUES -->
		<div class="back-issues"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/back-issues.png ">
		<p>Would you like to see more of Marijuana Venture’s past articles? </p>
		<a href="/product-category/back-issues">View back issues </a>
		</div>
		<!--end back issues -->

	<!-- ADVERTISE SECTION -->
	<div class="advertise-wrap">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-no-tag.gif" >
		<div class="advertise">
		<p>Advertise in the only nationally distributed business publication for the legal marijuana industry. </p>
		<p><a class="advertise-btn" href="/advertise"> Advertiser Info </a></p>
		</div>
	</div>
	<!--end advertise section -->

	

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		
		//do_action( 'woocommerce_sidebar' ); //This is removed so that no sidebar shows 
	?>
	</div><!--end page_full -->
	<!--FEATURE STORIES -->
        <div class="four-features margin-bottom-20">
            <?php query_posts('cat=3&showposts=4'); ?>
            <?php include "feature-stories.php"; ?>
        </div>
    <!--end feature stories -->

    <!-- Email Signup Form-->
            <?php include "email-signup.php"; ?>

    <!--end email signup -->

	</div>

<?php get_footer( 'shop' ); ?>
