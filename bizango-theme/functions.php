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
   wp_enqueue_script( 'mobilenav-script', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-2-script', get_template_directory_uri() . '/js/flex-slideshow.js', array( 'jquery' ), '1.0.0', true );
   wp_enqueue_script( 'flex-script', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true );
  
   wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css', array(), '1.1', 'all');
   wp_enqueue_style( 'posts', get_template_directory_uri() . '/css/posts.css', array(), '1.1', 'all');
   wp_enqueue_style( 'categories', get_template_directory_uri() . '/css/categories.css', array(), '1.1', 'all');
   wp_enqueue_style( 'pages', get_template_directory_uri() . '/css/pages.css', array(), '1.1', 'all');
   wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/flexslider.css', array(), '1.1', 'all');
   wp_enqueue_style( 'woocommerce-custom', get_template_directory_uri() . '/css/woocommerce-custom.css', array(), '1.1', 'all');
 
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


//Making jQuery Google API
function modify_jquery() {
  if (!is_admin()) {
    // comment out the next two lines to load the local copy of jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4');
    wp_enqueue_script('jquery');
  }
}
add_action('init', 'modify_jquery');

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
    register_sidebar(
        array(
        'name'          => __( 'Main Ad', 'theme_name' ),
        'id'            => 'main-ad',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
        'name'          => __( 'Sidebar Ad', 'theme_name' ),
        'id'            => 'sidebar-ad',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
        'name'          => __( 'Newsfeed Ad', 'theme_name' ),
        'id'            => 'newsfeed-ad',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
        'name'          => __( 'Feature Ad', 'theme_name' ),
        'id'            => 'feature-ad',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        )
    );


    /* Repeat register_sidebar() code for additional sidebars. */
}
//Make Category slug name into css class names
function the_category_unlinked($separator = ' ') {
    $categories = (array) get_the_category();
    
    $thelist = '';
    foreach($categories as $category) {    // concate
        $thelist .= $separator . $category->category_nicename;
    }
    
    echo $thelist;
}



//Shorten EXCERPT length

add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 10; }


function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Create custom post for specific category

 
function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'cover-story' )) {
          $single_template = dirname( __FILE__ ) . '/single-cover-story.php';
     }
     return $single_template;
}
 
add_filter( "single_template", "get_custom_cat_template" ) ;



//Add Woocommerce support

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
//remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);




add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="main_content">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count', 20, 0);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// add additional shipping fees
add_action( 'woocommerce_flat_rate_shipping_add_rate', 'add_another_custom_flat_rate', 10, 2 );

function add_another_custom_flat_rate( $method, $rate ) {
  $new_rate          = $rate;
  $new_rate['id']    .= ':' . 'discreet_mailing'; // Append a custom ID
  $new_rate['label'] = 'Discreet Mailing'; // Rename rate
  $new_rate['cost']  += 4.99; // Add $4.99 to the cost


  $method->add_rate( $new_rate );
}


 // Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}


  // Change Proceed To Checkout button Text 
function woocommerce_button_proceed_to_checkout() {
       $checkout_url = WC()->cart->get_checkout_url();
       ?>
       <a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e( 'Check Out', 'woocommerce' ); ?></a>
       <?php
}


     //Adds Discreet Mailing shipping option
/*add_action('woocommerce_cart_totals_after_shipping', 'wc_discreet_shipping_after_cart');
function wc_discreet_shipping_after_cart() {
global $woocommerce;
    $product_id = 207;
foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
    $_product = $values['data'];
    if ( $_product->id == $product_id )
        $found = true;
    }
    // if product not found, add it
if ( ! $found ):
?>
    <tr class="discreet">
        <th><?php _e( 'Discreet Mailing', 'woocommerce' ); ?></th>
        <td><a href="<?php echo do_shortcode('[add_to_cart_url id="207"]'); ?>"><?php _e( 'Discreet Mailing (+$4.99)' ); ?> </a></td>
    </tr>
<?php else: ?>
    <tr class="discreet">
        <th><?php _e( 'Discreet Mailing', 'woocommerce' ); ?></th>
        <td>$4.99</td>
    </tr>
<?php endif;
}

*/


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



//add default image option
add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
  function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
      'label'     => 'Default Image',
      'instructions'    => 'Appears when creating a new post',
      'type'      => 'image',
      'name'      => 'default_value',
    ));
  }


//



