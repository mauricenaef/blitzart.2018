<?php

#------------------------------------------------------------------------------------
# Custom Post Type - Gallery
#------------------------------------------------------------------------------------
add_action('init', 'custom_post_type_gallery');
 
function custom_post_type_gallery() {
 
	$labels = array(
		'name' => _x('Portfolio Gallery', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Neues Slide hinzufügen', 'Gallery item'),
		'add_new_item' => __('Neues Slide hinzufügen'),
		'edit_item' => __('Gallery bearbeiten'),
		'new_item' => __('Neues Slide'),
		'view_item' => __('Slide ansehen'),
		'search_items' => __('Slide Suchen'),
		'not_found' =>  __('Nichts gefunden'),
		'not_found_in_trash' => __('Nichts im Papierkorb gefunden'),
		'parent_item_colon' => ''
	);
 
	$args = array(
        'label'                 => __( 'Portfolio Gallery', 'blitzart' ),
		'description'           => __( 'Galerie Portfolio', 'blitzart' ),
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'menu_icon'             => 'dashicons-images-alt2',
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => true,
		'capability_type'       => 'post',
		'hierarchical'          => true,
		'menu_position'         => 2,
		'supports'              => array('title')		
	  ); 
 
	register_post_type( 'portfolio_gallery' , $args );
}

#------------------------------------------------------------------------------------
# Custom Metabox for Gallery
#------------------------------------------------------------------------------------

add_action( 'cmb2_init', 'blitzart_subtitle_metaboxes' );
function blitzart_subtitle_metaboxes() {
	$cmb = new_cmb2_box( array(
		'id'            => 'blitzart_subtitle_metabox',
		'object_types'  => array( 'portfolio_gallery' ),
		'contex'		=> 'advanced',
        'priority'		=> 'high',
        'title'			=> 'Lightbox',
	) );
	$cmb->add_field( array(
		'name' => 'Subtitel',
		'id'   => '_subtitle',
        'type' => 'text',
        'column' => array(
			'position' => 2,
			'name'     => 'Sub Titel',
		),
	) );
}


#------------------------------------------------------------------------------------
# Rearange Gallery overview
#------------------------------------------------------------------------------------
add_action( 'cmb2_init', 'blitzart_gallery_meta' );
function blitzart_gallery_meta() {
	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb = new_cmb2_box( array(
		'id'			=> 'Gallery_metabox',
		'title'			=> 'Portfolio',
		'object_types'	=> array( 'portfolio_gallery' ),
		'contex'		=> 'normal',
		'priority'		=> 'high',
		'show_names'	=> true,
	) );

	$cmb->add_field( array(
		'name'    => 'Bild',
		'desc'    => 'Lade ein Bild hoch oder wähle eines aus der Mediathek',
		'id'      => '_thumbnail',
		'type'    => 'file',
		'column' => array(
			'position' => 1,
			'name'     => 'Bild',
		),
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Bild hinzufügen' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			'type' => 'image/jpeg',
		),
		'preview_size' => 'thumbnail', // Image size to use when previewing in the admin.
	) );
}
