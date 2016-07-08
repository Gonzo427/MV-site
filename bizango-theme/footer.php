<?php
/**
 * The theme footer
 * 
 * @package bizango-theme
 */
?>






<div id="footer">

	<div class="page_frame group">
		<div class="page_content fl">
			<div class="col1">
				<a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/footerlogo.gif" ></a>
				<p class="tagline">The Journal of Professional Cannabis Growers and Retailers</p>
				<p style="margin-bottom: 13px;">
					<a href="https://www.facebook.com/MJVenture/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png"></a>&nbsp;&nbsp;&nbsp;
					<a href="https://www.instagram.com/mjventure/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/instagram.png"></a>
				</p>
				<p>SUBSCRIBE   |   MAGAZINE   DIGITAL</p>
			</div>




			<div class="col2">
				<div class="footnav">
					<?php wp_nav_menu(array('theme_location' => 'main-menu','menu' => '', 'menu_class' => 'nav')); ?> 
				</div>


			</div>

			<div class="col3">
				<div class="footnav">
					<?php wp_nav_menu(array('theme_location' => 'sub-menu','menu' => '', 'menu_class' => 'nav')); ?> 
				</div>


			</div>

			
			<div class="copy tAc">&copy; <?php echo date("Y"); ?> <?php echo bloginfo("name");?> </div>
		</div>

		
			<div class="col4 fr">
				<?php query_posts('showposts=1&cat=17'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                         <img src="<?php the_field('upcoming_issue_image'); ?>" alt="upcoming issue"/>
                     <?php endwhile; ?>
			</div>

					
	</div>
	
	</div>



</div>
<div id="subfooter">
	<div class="page_frame tAc">
		 
		<a id="bizango" href="http://www.bizango.com"  title="Website Design" target=_NEW>Website Design</a>
	</div>
</div>
			
			

		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?> 
	</body>
</html>