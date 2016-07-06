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

//enqueues  external font awesome stylesheet
function enqueue_font_awesome(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_font_awesome');


function bizango_scripts() {
    wp_enqueue_script( 'subscribe-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bizango_scripts' );


//custom background
/*add_action('genesis_header', 'add_content_to_header');
function add_content_to_header() {

$bg = get_field('cover_image');

if( !empty($bg) ){
$new_background = $bg['url'];
echo '<body style="background: url('.$new_background.') center no-repeat; background-size: cover;">';
}

}*/