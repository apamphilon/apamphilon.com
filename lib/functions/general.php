<?php

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
*/
function ambrosite_body_class($classes) {$post_name_prefix = 'postname-';$page_name_prefix = 'pagename-';$single_term_prefix = 'single-';$single_parent_prefix = 'parent-';$category_parent_prefix = 'parent-category-';$term_parent_prefix = 'parent-term-';$site_prefix = 'site-';global $wp_query;if ( is_single() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $post_name_prefix . $wp_query->post->post_name;$taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );foreach ( $taxonomies as $taxonomy ) {$tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';$terms = get_the_terms($wp_query->post->ID, $taxonomy);if ( $terms ) {foreach( $terms as $term ) {if ( !empty($term->slug ) )$classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);while ( $term->parent ) {$term = &get_term( (int) $term->parent, $taxonomy );if ( !empty( $term->slug ) )$classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);}}}}} elseif ( is_archive() ) {if ( is_category() ) {$cat = $wp_query->get_queried_object();while ( $cat->parent ) {$cat = &get_category( (int) $cat->parent);if ( !empty( $cat->slug ) )$classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);}} elseif ( is_tax() ) {$term = $wp_query->get_queried_object();while ( $term->parent ) {$term = &get_term( (int) $term->parent, $term->taxonomy );if ( !empty( $term->slug ) )$classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);}}} elseif ( is_page() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $page_name_prefix . $wp_query->post->post_name;}if ( is_multisite() ) {global $blog_id;$classes[] = $site_prefix . $blog_id;}return $classes;} add_filter('body_class', 'ambrosite_body_class');

/*
Disable the theme editor
- stop clients from breaking their website
*/
define('DISALLOW_FILE_EDIT', true);

/*
Remove version info
- makes it that little bit harder for hackers
*/
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

/*
Remove info from headers
- remove the stuff we don't need
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/*
Excerpt
- this theme supports excerpts
*/
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
	 return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

/*
Thumbnails
- this theme supports thumbnails
*/
add_theme_support( 'post-thumbnails' );
add_image_size ( 'post', 1335, 467, true );
add_image_size ( 'news-featured-thumb', 550, 400, true );

/*
Menus
- enable WordPress Menus
*/
if (function_exists('register_nav_menus')){
	register_nav_menus(array(
		'header' => __( 'Main Nav' ),
		'footer' => __( 'Footer Nav' )
));}

/*
Menu Classes
- add first and last to menu items
*/
function wpdev_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');


// Enqueue
function enqueue() {
	wp_enqueue_style('google_fonts_open_sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,800');
	wp_enqueue_style('google_fonts_raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,500');
	wp_enqueue_style('style', get_template_directory_uri() .'/style.css');

	/*
	jQuery
	- add the latest version of jQuery
	*/
	if( !is_admin() ){
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
		wp_enqueue_script('jquery');
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue' );

// add options page for ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings'
	));
}

//show all posts for seach query
function change_wp_search_size($query) {
  if ( $query->is_search ) // Make sure it is a search page
    $query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show
    return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

//gets parent page id
function get_parent_page_id() {
	global $post;

	if ($post->ancestors) {
		return end($post->ancestors);
	} else {
		return $post->ID;
	}
}

//print_a
function print_a($array) {
    echo '<pre class="debug">';
    print_r($array);
    echo '</pre>';
}

//allow svg support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//change search url
function change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'change_search_url_rewrite' );

?>
