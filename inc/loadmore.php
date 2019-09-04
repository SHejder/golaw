<?php

function true_load_posts(){
    if(!$_SESSION['insights']){
        $args = urldecode( stripslashes( $_POST['query'] ) );
    } else {
        $args = $_SESSION['insights'];
    }
//    var_dump($_POST['page']);
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts( $args );
    // если посты есть
    if( have_posts() ) :

        // запускаем цикл
        while( have_posts() ): the_post();

            get_template_part( 'template-parts/post', 'list' );

        endwhile;

    endif;
    die();
}
