<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bizango-theme
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}
register_nav_menus( array(
	'main-menu' => 'Main Menu',
	'sub-menu' => 'Sub Menu',
) );


add_action( 'init', 'register_my_menus' );


