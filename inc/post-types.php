<?php

function customPostTypes()
{
    register_post_type('expertise', array(
        'labels' => array(
            'name' => _x('Expertise', 'General name'), // Основное название типа записи
            'singular_name' => _x('Expertise', 'Singular name'), // отдельное название записи типа Book
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new expertise'),
            'edit_item' => __('Edit expertise'),
            'new_item' => __('New expertise'),
            'view_item' => __('View expertise'),
            'search_items' => __('Expertise expertise'),
            'not_found' => __('Expertise not found'),
            'not_found_in_trash' => __('Expertise not found it trash'),
            'parent_item' => __('Parent'),
            'parent_item_colon' => __('Parent'),
            'menu_name' => __('Expertise')

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('with_front' => false),
        'taxonomies' => array('practice', 'sector'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail',  'page-attributes')
    ));
    register_post_type('vacancies', array(
        'labels' => array(
            'name' => _x('Vacancy', 'General name'), // Основное название типа записи
            'singular_name' => _x('Vacancy', 'Singular name'), // отдельное название записи типа Book
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new vacancy'),
            'edit_item' => __('Edit vacancy'),
            'new_item' => __('New vacancy'),
            'view_item' => __('View vacancy'),
            'search_items' => __('Expertise vacancy'),
            'not_found' => __('Vacancy not found'),
            'not_found_in_trash' => __('Vacancy not found it trash'),
            'menu_name' => __('Vacancies')

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('with_front' => false),
        'taxonomies' => array('location'),
        'capability_type' => 'post',
        'exclude_from_search' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 4,
        'supports' => array('title', 'editor')
    ));

    register_post_type('people', array(
            'labels' => array(
                'name' => _x('People', 'General name'), // Основное название типа записи
                'singular_name' => _x('People', 'Singular name'), // отдельное название записи типа Book
                'add_new' => __('Add new'),
                'add_new_item' => __('Add new people'),
                'edit_item' => __('Edit people'),
                'new_item' => __('New people'),
                'view_item' => __('View people'),
                'search_items' => __('Search peoples'),
                'not_found' => __('people not found'),
                'not_found_in_trash' => __('people not found it trash'),
                'parent_item_colon' => '',
                'menu_name' => __('Peoples')

            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('with_front' => false),
            'taxonomies' => array('practice', 'sector'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 4,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes')
        )
    );

    register_post_type('testimonial', array(
        'labels' => array(
            'name' => _x('Testimonials', 'General name'), // Основное название типа записи
            'singular_name' => _x('Testimonial', 'Singular name'), // отдельное название записи типа Book
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new testimonial'),
            'edit_item' => __('Edit testimonial'),
            'new_item' => __('New testimonial'),
            'view_item' => __('View testimonial'),
            'search_items' => __('Search testimonials'),
            'not_found' => __('Testimonial not found'),
            'not_found_in_trash' => __('Testimonial not found it trash'),
            'parent_item_colon' => '',
            'menu_name' => __('Testimonials')

        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'exclude_from_search' => true,
        'capability_type' => 'post',
        'taxonomies' => array('practice', 'sector'),
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor')
    ));


}

;

