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


function add_theme_scripts() {
   wp_enqueue_script( 'subscribe-script', get_template_directory_uri() . '/js/email-subscribe.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'mobilenav-script', get_template_directory_uri() . '/js/mobile-nav.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-2-script', get_template_directory_uri() . '/js/flex-slideshow.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
  
   wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css', array(), '1.1', 'all');
   wp_enqueue_style( 'posts', get_template_directory_uri() . '/css/posts.css', array(), '1.1', 'all');
   wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.1', 'all');
 
  
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


function  mv_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
 
}
add_action( 'widgets_init', 'mv_widgets_init' );



//custom background
/*add_action('genesis_header', 'add_content_to_header');
function add_content_to_header() {

$bg = get_field('cover_image');

if( !empty($bg) ){
$new_background = $bg['url'];
echo '<body style="background: url('.$new_background.') center no-repeat; background-size: cover;">';
}

}*/