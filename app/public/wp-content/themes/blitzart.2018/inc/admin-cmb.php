<?php

#------------------------------------------------------------------------------------
# Get ID by Slug
#------------------------------------------------------------------------------------

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

#------------------------------------------------------------------------------------
# Get Page Option ID
#------------------------------------------------------------------------------------

function get_page_option_section( $key, $fallback = NULL ) {

    if ( get_option( 'newtree_options' ) ) {
        
        $option = get_option( 'newtree_options' );

            $page_id = isset($option[$key]) ? $option[$key] : '';

            return $page_id;
        

    } else {

        if ($fallback) {
            
            $page_id = get_id_by_slug( $fallback );

            return $page_id;

        }
    }
}

#------------------------------------------------------------------------------------
# CMB Gravityforms Type
#------------------------------------------------------------------------------------

function custom_cmb_gforms( $field ) {

    $options = array();
    $forms = RGFormsModel::get_forms();
    if(!empty($forms)) {

        foreach($forms as $form){

            $options[$form->id] = $form->title;

        }

    }

    return $options;
}

#------------------------------------------------------------------------------------
# Custom Position Field Html
#------------------------------------------------------------------------------------

function newtree_position_cmb( $field_args, $field  ) {
    ?>
    <img src="<?php echo bloginfo( 'template_directory' ) . '/includes/images/position-grid.jpg'; ?>" style="width: 100%;" />
    <?php
}

#------------------------------------------------------------------------------------
# Move all Advanced to Top
#------------------------------------------------------------------------------------

// Move all "advanced" metaboxes above the default editor
add_action('edit_form_after_title', function() {
    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});

#------------------------------------------------------------------------------------
# Remove Editor on Front Page / and other pages
#------------------------------------------------------------------------------------

add_action('init', 'remove_editor_on_frontpage_init');
function remove_editor_on_frontpage_init() {
    if ( ! is_admin() ) {
       return;
    }

    // Get the post ID on edit post with filter_input super global inspection.
    $current_post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
    // Get the post ID on update post with filter_input super global inspection.
    $update_post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );

    // Check to see if the post ID is set, else return.
    if ( isset( $current_post_id ) ) {
       $post_id = absint( $current_post_id );
    } else if ( isset( $update_post_id ) ) {
       $post_id = absint( $update_post_id );
    } else {
       return;
    }
    if ( isset( $post_id ) ) {
        
         $front_page = get_option( 'page_on_front' );
         
         $about_page = get_page_option_section( 'ueber-uns_sektion' );
         $spenden_page = get_page_option_section( 'spenden_sektion' );
         $product = get_page_option_section( 'product_sektion' );
         $pfeiler_panel = get_page_option_section( 'pfeiler_sektion' );
        

        // remove editor & thumbnail
        if ( $spenden_page == $post_id ) {
            //remove_post_type_support('page', 'editor');
            remove_post_type_support('page', 'thumbnail');
        }

        // remove thumbnail
        if ($pfeiler_panel == $post_id || $product == $post_id) {
            remove_post_type_support('page', 'thumbnail');
        }

        // remove editor
        //if ( $about_page == $post_id ) {
        //    remove_post_type_support('page', 'editor');
        //}

    }
}

/**
 * Metabox for Page Slug
 * @author Tom Morton
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_slug( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
        return $display;
    }

    if ( 'slug' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    $slug = get_post( $post_id )->post_name;

    // See if there's a match
    return in_array( $slug, (array) $meta_box['show_on']['value']);
}
add_filter( 'cmb2_show_on', 'be_metabox_show_on_slug', 10, 2 );

/**
 * Include metabox on front page
 * @author Ed Townend
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function ed_metabox_include_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return false;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );


/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type'   => 'post',
        'numberposts' => -1,
        'order'       => 'ASC',
        'orderby'     => 'menu_order'
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
        }
    }

    return $post_options;
}



#------------------------------------------------------------------------------------
# Get Post Types as Options Array
#------------------------------------------------------------------------------------
function new_tree_options_array( $query_args = array() ) {
    $defaults = array(
        'posts_per_page' => -1
    );
    $query = new WP_Query( array_replace_recursive( $defaults, $query_args ) );
    return wp_list_pluck( $query->get_posts(), 'post_title', 'ID' );
}

#------------------------------------------------------------------------------------
# Field Type Number
#------------------------------------------------------------------------------------

// render numbers
add_action( 'cmb2_render_text_number', 'sm_cmb_render_text_number', 10, 5 );
function sm_cmb_render_text_number( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
    echo $field_type_object->input( array( 'class' => 'cmb2-text-small', 'type' => 'number' ) );
}

// sanitize the field
add_filter( 'cmb2_sanitize_text_number', 'sm_cmb2_sanitize_text_number', 10, 2 );
function sm_cmb2_sanitize_text_number( $null, $new ) {
    $new = preg_replace( "/[^0-9]/", "", $new );

    return $new;
}

#------------------------------------------------------------------------------------
# Get Terms as Options Array
#------------------------------------------------------------------------------------

function newtree_terms_array( $taxonomies, $query_args = '' ) {
    $defaults = array(
        'hide_empty' => false
    );
    $args = wp_parse_args( $query_args, $defaults );
    $terms = get_terms( $taxonomies, $args );
    $terms_array = array();
    if ( ! empty( $terms ) ) {
        foreach ( $terms as $term ) {
            $terms_array[$term->term_id] = $term->name;
        }
    }
    return $terms_array;
}

/**
 * Gets 5 posts for your_post_type and displays them as options
 * @return array An array of options that matches the CMB2 options array
 */

function custom_post_type_data_product() {
    return cmb2_get_post_options( array( 'post_type' => 'product', 'numberposts' => -1 ) );
}

function custom_post_type_data_pages() {
    return cmb2_get_post_options( array( 'post_type' => 'page', 'numberposts' => -1 ) );
}





/**
 * Taxonomy show_on filter
 * @author Bill Erickson
 * @link https://github.com/WebDevStudios/CMB2/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $metabox
 * @return bool display metabox
 */
function be_taxonomy_show_on_filter( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
        return $display;
    }

    if ( 'taxonomy' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return $display;
    }

    foreach( (array) $meta_box['show_on']['value'] as $taxonomy => $slugs ) {
        if ( ! is_array( $slugs ) ) {
            $slugs = array( $slugs );
        }

        $display = false;
        $terms = wp_get_object_terms( $post_id, $taxonomy );
        foreach( $terms as $term ) {
            if ( in_array( $term->slug, $slugs ) ) {
                $display = true;
                break;
            }
        }

        if ( $display ) {
            break;
        }
    }

    return $display;
}
add_filter( 'cmb2_show_on', 'be_taxonomy_show_on_filter', 10, 2 );
