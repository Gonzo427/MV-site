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


//Add Google Analytics Code:

add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { 
// Paste your Google Analytics code 

?><script>

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-51806321-1', 'auto'); ga('send', 'pageview'); (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-51806321-1', 'auto'); ga('send', 'pageview');

</script><?php
}


//Add Custom Image Sizes

add_theme_support( 'post-thumbnails' );
add_image_size( 'feature-thumb', 257, 135, true ); // Hard Crop Mode



//enqueues  external font awesome stylesheet
function enqueue_font_awesome(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_font_awesome');

//enqueues all other styles and scripts 
function add_theme_scripts() {
   wp_enqueue_script( 'subscribe-script', get_template_directory_uri() . '/js/email-subscribe.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'mobilenav-script', get_template_directory_uri() . '/js/mobile-nav.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-2-script', get_template_directory_uri() . '/js/flex-slideshow.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
  
   wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css', array(), '1.1', 'all');
   wp_enqueue_style( 'posts', get_template_directory_uri() . '/css/posts.css', array(), '1.1', 'all');
   wp_enqueue_style( 'categories', get_template_directory_uri() . '/css/categories.css', array(), '1.1', 'all');
   wp_enqueue_style( 'pages', get_template_directory_uri() . '/css/pages.css', array(), '1.1', 'all');
   wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.1', 'all');
 
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


//Add sidebars

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
        'name'          => __( 'Secondary Sidebar', 'theme_name' ),
        'id'            => 'secondary',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}


//Add Woocommerce support

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="main_content"><div class="page_frame group">';
}

function my_theme_wrapper_end() {
  echo '</div></div>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//this code creates a shortcode to create Pull Quotes in a post


function pullQuote($atts, $content = null) {
   
   return '<p class="pull-quote" >' . do_shortcode($content) . '</p>';
}
add_shortcode('pullquote', 'pullQuote');

function pullQuoteLeft($atts, $content = null) {
   
   return '<p class="pull-quote-left" >' . do_shortcode($content) . '</p>';
}
add_shortcode('pullquote-left', 'pullQuoteLeft');

function pullQuoteRight($atts, $content = null) {
   
   return '<p class="pull-quote-right" >' . do_shortcode($content) . '</p>';
}
add_shortcode('pullquote-right', 'pullQuoteRight');




//custom background
/*add_action('genesis_header', 'add_content_to_header');
function add_content_to_header() {

$bg = get_field('cover_image');

if( !empty($bg) ){
$new_background = $bg['url'];
echo '<body style="background: url('.$new_background.') center no-repeat; background-size: cover;">';
}

}*/