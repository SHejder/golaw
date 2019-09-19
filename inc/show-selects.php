<?php

function show_categories($type){
    if($type === 'select'){
        $args = [
            'taxonomy' => 'category',
            'child_of' => 0,
        ];
        $categories = get_categories($args);
        $select = '<select id="search_category" class="search-bar__select s-sel s-category" >';
        $select .= '<option value="0">'.trans('Category', false).'</option>';
        foreach ($categories as $category){
            $select .= '<option value="'.$category->cat_ID.'">'.$category->name.'</option>';
        }
        $select .= '</select>';
        echo $select;
    }
}

function show_topics() {
    $tags = get_tags();
    $select = '<select name="" id="search_topic" class="search-bar__select s-sel s-tag" >';
    $select .= '<option value="0">'. trans('Tags',false).'</option>';
    foreach ($tags as $tag) {
        $select .= '<option value="'.$tag->term_id.'">'.$tag->name.'</option>';
    }
    $select .= '</select>';
    echo $select;
}

function show_select(string $taxonomy){
    $terms = get_terms($taxonomy);
    $select = '<select name="" id="'.$taxonomy.'" class="search-bar__select s-sel s-'.$taxonomy.'" >';
    $select .= '<option value="0">'.trans($taxonomy,false).'</option>';
    foreach ($terms as $term){
        $select .= '<option value="'.$term->term_id.'">'.$term->name.'</option>';
    }
    $select .= '</select>';
    echo $select;
}
