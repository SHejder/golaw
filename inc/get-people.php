<?php

function getLawyerSidebar($id, $type){
    $args = [
        'post__in' => $id,
        'post_type' => 'people'
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
                get_template_part('template-parts/people/people', $type);
        }
        wp_reset_postdata();
    }
}
function getHomeLawyers(array $include = null){
    $args = array(
        'post_type' => 'people',
        'orderby' => 'menu_order',
        'sentence' => 1,
        'order' => 'ASC',
        'posts_per_page' => 9
    );
    if($include) $args['post__in'] = $include;
    $peoples = new WP_Query($args);
    if ($peoples->have_posts()) {
        while ($peoples->have_posts()) {
            $peoples->the_post();
            get_template_part('template-parts/people/people', 'home');
        }
        wp_reset_postdata();
    }
}

function getLawyers(){
    $args = array(
        'post_type' => 'people',
        'orderby' => 'menu_order',
        'sentence' => 1,
        'order' => 'ASC' ,
        'posts_per_page' => -1

    );
    if ($_POST['practice'] !== '0' || $_POST['location'] !== '0'|| $_POST['sector'] !== '0'){
        $args['tax_query'] = array();
    }
    foreach ($_POST as $k => $v){
        if($v === '0' || $k === 'action' || $v === ''){
            continue;
        }
        if ($k === 's') {
            $args[$k] = $v;
        } else if(in_array($k, ['practice', 'location', 'sector'])){
            $taxonomy = [
                'taxonomy' => $k,
                'field' => 'id',
                'terms' => $v
            ];
            array_push($args['tax_query'], $taxonomy);
        }
    }

    $query = new WP_Query($args);

    setFilterCookie($query);

    get_template_part('template-parts/people/people','filters');
    echo '<section class="search-law-sect res-sect">
            <div class="container">';
                    if ($query->have_posts()) {
                        echo '<div class="search-law">';
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('template-parts/people/people', 'list');
                        }
                        echo '</div>';
                        wp_reset_postdata();
                    } else {
                        echo '<h2 class="not-found">';
                    trans("No Lawyers found for the criteria you entered. Please try another search.");
                echo '</h2>';
                    }
    echo '</div>
        </section>';
    die();
}
