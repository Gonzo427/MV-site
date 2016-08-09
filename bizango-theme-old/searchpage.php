<?php
/**
 * Template Name: Search Page
 * 
 * @package bizango-theme
 */

get_header();
?> 
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
    foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    } // foreach
} //if

$search = new WP_Query($search_query);
?>

<div class="main_content">
<div class="page_frame group">
<?php get_search_form(); ?>
          

</div>

</div>

<?php get_footer(); ?> 