<?php
function customTaxonomies(){
        register_taxonomy('practice', array( 'expertise', 'people', 'testimonial'),array(
            'hierarchical'  => true,
            'labels'        => array(
                'name'                        => _x('Practices','taxonomy main name'),
                'singular_name'               => _x( 'Practice', 'taxonomy singular name' ),
                'search_items'                =>  __( 'Search practices' ),
                'popular_items'               => __( 'Popular practices' ),
                'all_items'                   => __( 'All practices' ),
                'parent_item'                 => null,
                'parent_item_colon'           => null,
                'edit_item'                   => __( 'Edit practice' ),
                'update_item'                 => __( 'Update practice' ),
                'add_new_item'                => __( 'Add New practice' ),
                'new_item_name'               => __( 'New practices name' ),
                'separate_items_with_commas'  => __( 'Separate practices with commas' ),
                'add_or_remove_items'         => __( 'Add or remove practice' ),
                'choose_from_most_used'       => __( 'Choose from the most used practices' ),
                'menu_name'                   => __('Practices'),
            ),
            'show_ui'       => true,
            'query_var'     => true,
            'rewrite' => array('with_front' => false),
            'show_in_rest'  => true,
        ));

        register_taxonomy('sector', array('people', 'expertise', 'testimonial'), array(
            'hierarchical'  => true,
            'labels'        => array(
                'name'                        => _x( 'Sectors', 'taxonomy general name' ),
                'singular_name'               => _x( 'Sector', 'taxonomy singular name' ),
                'search_items'                =>  __( 'Search Sectors' ),
                'popular_items'               => __( 'Popular Sectors' ),
                'all_items'                   => __( 'All Sectors' ),
                'parent_item'                 => null,
                'parent_item_colon'           => null,
                'edit_item'                   => __( 'Edit Sector' ),
                'update_item'                 => __( 'Update Sector' ),
                'add_new_item'                => __( 'Add New Sector' ),
                'new_item_name'               => __( 'New Sector Name' ),
                'separate_items_with_commas'  => __( 'Separate sector with commas' ),
                'add_or_remove_items'         => __( 'Add or remove sector' ),
                'choose_from_most_used'       => __( 'Choose from the most used Sectors' ),
                'menu_name'                   => __( 'Sectors' ),
            ),
            'show_ui'       => true,
            'query_var'     => true,
            'rewrite' => array('with_front' => false),
            'show_in_rest'  => true,
        ));

        register_taxonomy('location', array('people', 'vacancies'), array(
            'hierarchical'  => true,
            'labels'        => array(
                'name'                        => _x( 'Locations', 'taxonomy general name' ),
                'singular_name'               => _x( 'Location', 'taxonomy singular name' ),
                'search_items'                =>  __( 'Search Locations' ),
                'popular_items'               => __( 'Popular Locations' ),
                'all_items'                   => __( 'All Locations' ),
                'parent_item'                 => null,
                'parent_item_colon'           => null,
                'edit_item'                   => __( 'Edit Location' ),
                'update_item'                 => __( 'Update Location' ),
                'add_new_item'                => __( 'Add New Location' ),
                'new_item_name'               => __( 'New Location Name' ),
                'separate_items_with_commas'  => __( 'Separate Location with commas' ),
                'add_or_remove_items'         => __( 'Add or remove Location' ),
                'choose_from_most_used'       => __( 'Choose from the most used Locations' ),
                'menu_name'                   => __( 'Locations' ),
            ),
            'show_ui'       => true,
            'query_var'     => true,
            'show_in_rest'  => true,
        ));

}
