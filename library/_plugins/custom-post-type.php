<?php
/**

 * Theme: Starter Theme by Dirty Martini
 * File: Admin custom functions
 * Author: Maxwell Kirwin
 * URI: https://dirty-martini.com/

*/

/******************************************************************
A PLUGIN? IN MY THEME?
*******************************************************************
Wait a minute there buddy, what is a plugin file doing in a theme?

Well think about it...in most cases whatever site you're working
on will need your CPT to work with or without your theme. You may
not be the dev in 5 years time but they will still need their data.

Thus, it makes sense to put each custom post type in a plugin. This
is an example of a 'Staff' custom post type and includes its own
taxonomy 'Grouping' plus some functions to change the 'Title' field
on edit screens and make the admin columns sortable.

You *could* edit this file to make your own CPT. But it's even easier
to just go to https://generatewp.com and use the Post Type Generator
and the Taxonomy Generator there. That's what I do.

Edit this or replace your own code from generatewp.com and then place
in the /wp-content/plugins folder and activate it like any other
plugin. Sweetness.

** And yes, I know having this file in the theme gives an error in
Theme Check. Big whoop.

******************************************************************/


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'plate_flush_rewrite_rules' );

// Flush your rewrite rules
function plate_flush_rewrite_rules() {
	flush_rewrite_rules();
}


// Register Custom Post Type
function plate_staff_cpt() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'dmtheme' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'dmtheme' ),
		'menu_name'             => __( 'Staff', 'dmtheme' ),
		'name_admin_bar'        => __( 'Staff', 'dmtheme' ),
		'archives'              => __( 'Staff Archives', 'dmtheme' ),
		'parent_item_colon'     => __( 'Parent Staff:', 'dmtheme' ),
		'all_items'             => __( 'All Staff', 'dmtheme' ),
		'add_new_item'          => __( 'Add New Staff', 'dmtheme' ),
		'add_new'               => __( 'Add New Staff', 'dmtheme' ),
		'new_item'              => __( 'New Staff', 'dmtheme' ),
		'edit_item'             => __( 'Edit Staff', 'dmtheme' ),
		'update_item'           => __( 'Update Staff', 'dmtheme' ),
		'view_item'             => __( 'View Staff', 'dmtheme' ),
		'search_items'          => __( 'Search Staff', 'dmtheme' ),
		'not_found'             => __( 'Not found', 'dmtheme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dmtheme' ),
		'featured_image'        => __( 'Featured Image', 'dmtheme' ),
		'set_featured_image'    => __( 'Set featured image', 'dmtheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'dmtheme' ),
		'use_featured_image'    => __( 'Use as featured image', 'dmtheme' ),
		'insert_into_item'      => __( 'Insert into staff', 'dmtheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this staff', 'dmtheme' ),
		'items_list'            => __( 'Staff list', 'dmtheme' ),
		'items_list_navigation' => __( 'Staff list navigation', 'dmtheme' ),
		'filter_items_list'     => __( 'Filter staff list', 'dmtheme' ),
	);
	$rewrite = array(
		'slug'                  => 'staff',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Staff', 'dmtheme' ),
		'description'           => __( 'Plate Staff', 'dmtheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'grouping' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		// You can change the base request here
		//'rest_base'             => 'staff',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	);
	register_post_type( 'plate_staff', $args );

}
add_action( 'init', 'plate_staff_cpt', 0 );


// Register Custom Taxonomy
function plate_staff_grouping_tax() {

	$labels = array(
		'name'                       => _x( 'Groupings', 'Taxonomy General Name', 'dmtheme' ),
		'singular_name'              => _x( 'Grouping', 'Taxonomy Singular Name', 'dmtheme' ),
		'menu_name'                  => __( 'Groupings', 'dmtheme' ),
		'all_items'                  => __( 'All Groupings', 'dmtheme' ),
		'parent_item'                => __( 'Parent Grouping', 'dmtheme' ),
		'parent_item_colon'          => __( 'Parent Grouping:', 'dmtheme' ),
		'new_item_name'              => __( 'New Grouping Name', 'dmtheme' ),
		'add_new_item'               => __( 'Add New Grouping', 'dmtheme' ),
		'edit_item'                  => __( 'Edit Grouping', 'dmtheme' ),
		'update_item'                => __( 'Update Grouping', 'dmtheme' ),
		'view_item'                  => __( 'View Grouping', 'dmtheme' ),
		'separate_items_with_commas' => __( 'Separate groupings with commas', 'dmtheme' ),
		'add_or_remove_items'        => __( 'Add or remove groupings', 'dmtheme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'dmtheme' ),
		'popular_items'              => __( 'Popular Items', 'dmtheme' ),
		'search_items'               => __( 'Search Groupings', 'dmtheme' ),
		'not_found'                  => __( 'Not Found', 'dmtheme' ),
		'no_terms'                   => __( 'No items', 'dmtheme' ),
		'items_list'                 => __( 'Groupings list', 'dmtheme' ),
		'items_list_navigation'      => __( 'Groupings list navigation', 'dmtheme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
		// You can change the base request here
		//'rest_base'                  => 'grouping',
		'rest_controller_class'      => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'grouping', array( 'plate_staff' ), $args );

}

add_action( 'init', 'plate_staff_grouping_tax', 0 );


// Change the 'Title' field text on edit screen
function plate_staff_change_title_text( $title ){
    $screen = get_current_screen();

    if  ( 'plate_staff' == $screen->post_type ) {
        $title = 'Full Name (First Last)';
    }

    return $title;
}

add_filter( 'enter_title_here', 'plate_staff_change_title_text' );


// Add sortable admin columns dopeness
add_filter("manage_edit-plate_staff_sortable_columns", 'plate_staff_sort');

function plate_staff_sort($columns) {
    $custom = array(
        'taxonomy-grouping' => 'taxonomy-grouping'
    );
    return wp_parse_args($custom, $columns);
}