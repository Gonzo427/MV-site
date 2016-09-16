<?php
/**
 * The theme header
 * 
 * @package bizango-theme
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
		<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<script src="https://use.typekit.net/jmj7nut.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>



			
<div id="hero_frame">		

		<div class="page_frame group sticky-header">
			<a id="logo" href="/">&nbsp;</a>

			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/mag.png" class="mag">
			
			<div id="subnav">
				<div class="search-subscribe fr">
				<div id="subscribe" class="alt-gothic"><a href="<?php bloginfo('url'); ?>/product-category/subscriptions/">Subscribe</a></div>
				<div class="search-form"><?php get_search_form( ); ?></div>
				</div>
				<?php wp_nav_menu(array('theme_location' => 'sub-menu','menu' => '', 'menu_class' => 'subnav')); ?> 
			</div>
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/print-digital.png" class="navbutton">



			
		</div>

	<div id="nav_frame">
		<div class="page_frame group sticky-nav">
			<div id="nav">
			<?php wp_nav_menu(array('theme_location' => 'main-menu','menu' => '', 'menu_class' => 'nav', 'show_home' => false)); ?> 
			</div>

			<div id="mobile_nav">
				<div class="icon">Menu &equiv;</div>
				<ul class="nav">
					<?php wp_nav_menu(array('theme_location' => 'main-menu','menu' => '', 'menu_class' => 'nav')); ?> 
				</ul>
			</div>
		</div>
	</div>

<?php
if ( is_front_page() ) {
	echo'
	

	';
}
?>

</div>
			