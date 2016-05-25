<?php

// cpt for snippets
add_action( 'init', 'register_cpt_snippets' );

function register_cpt_snippets() {

	$labels = array(
		'name' => _x( 'snippets', 'snippets' ),
		'singular_name' => _x( 'Snippet', 'snippets' ),
		'add_new' => _x( 'Add New', 'snippets' ),
		'add_new_item' => _x( 'Add New Snippet', 'snippets' ),
		'edit_item' => _x( 'Edit Snippet', 'snippets' ),
		'new_item' => _x( 'New Snippet', 'snippets' ),
		'view_item' => _x( 'View Snippet', 'snippets' ),
		'search_items' => _x( 'Search Snippets', 'snippets' ),
		'not_found' => _x( 'No snippets found', 'snippets' ),
		'not_found_in_trash' => _x( 'No snippets found in Trash', 'snippets' ),
		'parent_item_colon' => _x( 'Parent snippet:', 'snippets' ),
		'menu_name' => _x( 'Snippets', 'snippets' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => '',
		'supports' => array( 'title', 'editor', 'comments', 'wpcom-markdown'),
		'taxonomies' => array( '', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-media-code',
		'menu_position' => '5',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

	register_post_type( 'snippets', $args );

}

// taxonomy for snippet type
function snippet_type() {

	$labels = array(
		'name'                       => _x( 'Snippet Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Snippet Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Snippet Type', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Snippet Type', array( 'snippets' ), $args );

}
add_action( 'init', 'snippet_type', 0 );

// cpt for service
add_action( 'init', 'register_cpt_service' );

function register_cpt_service() {

	$labels = array(
		'name' => _x( 'Services', 'service' ),
		'singular_name' => _x( 'Service', 'service' ),
		'add_new' => _x( 'Add New', 'service' ),
		'add_new_item' => _x( 'Add New Service', 'service' ),
		'edit_item' => _x( 'Edit Service', 'service' ),
		'new_item' => _x( 'New Service', 'service' ),
		'view_item' => _x( 'View Service', 'service' ),
		'search_items' => _x( 'Search Services', 'service' ),
		'not_found' => _x( 'No Services found', 'service' ),
		'not_found_in_trash' => _x( 'No Services found in Trash', 'service' ),
		'parent_item_colon' => _x( 'Parent Service:', 'service' ),
		'menu_name' => _x( 'Services', 'service' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => '',
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' => array( '', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-admin-tools',
		'menu_position' => '5',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => 'my-services'),
		'capability_type' => 'post'
	);

	register_post_type( 'service', $args );

}

?>
