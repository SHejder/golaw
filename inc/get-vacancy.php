<?php
function getVacancyList($type){
    $args = [
      'post_type' => 'vacancies',
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('template-parts/vacancy', $type);
        };
        wp_reset_postdata();
    };

}

function getVacancy(){
    $args = [
        'post_type' => 'vacancies',
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('template-parts/vacancy', 'content');
        };
        wp_reset_postdata();
    };
}
