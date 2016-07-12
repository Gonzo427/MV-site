<?php
/**
 * Template Name: Search form
 * 
 * @package bizango-theme
 */
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<label class="hidden" for="s"><?php _e(''); ?></label>
	<input type="text" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="" />
	  <span class="fa fa-search"></span>
</form>

