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
        };
        wp_reset_postdata();
    };
}
function getHomeLawyers(array $include = null){
    $args = array(
        'post_type' => 'people',
        'orderby' => 'menu_order',
        'sentence' => 1,
        'order' => 'ASC'
    );
    if($include) $args['post__in'] = $include;
    $peoples = new WP_Query($args);
    if ($peoples->have_posts()) {
        while ($peoples->have_posts()) {
            $peoples->the_post();
            get_template_part('template-parts/people/people', 'home');
        };
        wp_reset_postdata();
    };
}

function getLawyers(){
    global $wp_query;
    $args = array(
        'post_type' => 'people',
        'orderby' => 'menu_order',
        'sentence' => 1,
        'order' => 'ASC'

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
    $_SESSION['people'] = $args;
//    echo 'ajax';
//    debug($args);
    query_posts($args);
//    debug($wp_query);
    $_SESSION['people']['results']['count'] = $wp_query->found_posts;
    if ($_POST['practice'] !== '0') $_SESSION['people']['results']['practice'] = $_POST['practice'];
    if ($_POST['location'] !== '0') $_SESSION['people']['results']['location'] = $_POST['location'];
    if ($_POST['sector'] !== '0') $_SESSION['people']['results']['sector'] = $_POST['sector'];
    get_template_part('template-parts/people/people','filters');
    echo '<section class="search-law-sect res-sect">
            <div class="container">';
                    if (have_posts()) {
                        echo '<div class="search-law">';
                        while (have_posts()) {
                            the_post();
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
