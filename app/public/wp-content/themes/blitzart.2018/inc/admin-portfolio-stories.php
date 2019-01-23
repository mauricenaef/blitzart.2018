<?php

// Register Custom Post Type
function custom_post_type_stories() {

	$labels = array(
		'name'                  => _x( 'Stories', 'Post Type General Name', 'blitzart' ),
		'singular_name'         => _x( 'Story', 'Post Type Singular Name', 'blitzart' ),
		'menu_name'             => __( 'Portfolio Story', 'blitzart' ),
		'name_admin_bar'        => __( 'Portfolio Story', 'blitzart' ),
		'archives'              => __( 'Portfolio Story', 'blitzart' ),
		'parent_item_colon'     => __( 'Parent Item:', 'blitzart' ),
		'all_items'             => __( 'Alle Stories', 'blitzart' ),
		'add_new_item'          => __( 'Neues Story', 'blitzart' ),
		'add_new'               => __( 'Neue Story hinzufügen', 'blitzart' ),
		'new_item'              => __( 'Neue Story', 'blitzart' ),
		'edit_item'             => __( 'Story berabeiten', 'blitzart' ),
		'update_item'           => __( 'Story aktualisieren', 'blitzart' ),
		'view_item'             => __( 'Story details', 'blitzart' ),
		'search_items'          => __( 'Story suchen', 'blitzart' ),
		'not_found'             => __( 'Nichts gefunden', 'blitzart' ),
		'not_found_in_trash'    => __( 'Nichts gefunden im Papierkorb', 'blitzart' ),
		'featured_image'        => __( 'Hauptbild', 'blitzart' ),
		'set_featured_image'    => __( 'Hauptbild setzen', 'blitzart' ),
		'remove_featured_image' => __( 'Hauptbild entfernen', 'blitzart' ),
		'use_featured_image'    => __( 'Benutzte Bild als Hauptbild', 'blitzart' ),
		'insert_into_item'      => __( 'Einfügen', 'blitzart' ),
		'uploaded_to_this_item' => __( 'Hochladen', 'blitzart' ),
		'items_list'            => __( 'Story liste', 'blitzart' ),
		'items_list_navigation' => __( 'Story liste navigation', 'blitzart' ),
		'filter_items_list'     => __( 'Story liste filtern', 'blitzart' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio Stories', 'blitzart' ),
		'description'           => __( 'Detailierte Portfolio', 'blitzart' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'show_in_rest'			=> true,
		'template' 				=> array(
										array( 'core/paragraph', array(
											'content' 		=> '2019 • Logo / Design / Briefschaften',
											'className'		=> 'has-light-gray-color has-text-color has-small-font-size',
										) ),
										array( 'core/paragraph', array(
											'placeholder' 	=> 'Projekt Beschreibung',
										) ),		
										),
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Story', $args );

}
add_action( 'init', 'custom_post_type_stories', 0 );