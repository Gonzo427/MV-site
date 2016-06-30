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

//custom background
/*add_action('genesis_header', 'add_content_to_header');
function add_content_to_header() {

$bg = get_field('cover_image');

if( !empty($bg) ){
$new_background = $bg['url'];
echo '<body style="background: url('.$new_background.') center no-repeat; background-size: cover;">';
}

}*/