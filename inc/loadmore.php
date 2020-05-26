<?php
function true_load_posts(){
    global $posts_count;
    $query = json_decode( stripslashes( $_COOKIE['query'] ));
    $paged = (int)$_COOKIE['current_page'];

    $args = [
        'paged' =>              $paged + 1,
        'post_status' =>        'publish',
        'post_type' =>          'post',
        'orderby' =>            'date',
        'posts_per_page' =>     $posts_count,
        'cat' =>                !empty($query->cat)? $query->cat : '',
        's' =>                  !empty($query->s)? $query->s:'',
        'tag_id' =>             !empty($query->tag_id)? $query->tag_id:'',
    ];


    $query = new WP_Query($args);
    if( $query->have_posts() ) :

        // запускаем цикл
        while( $query->have_posts() ): $query->the_post();

            get_template_part( 'template-parts/post', 'list' );

        endwhile;

    endif;
    die();
}