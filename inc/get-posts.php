<?php

function posts_search()
{
    global $wp_query;
    $args = array(
        'posts_per_page' => 9,
        'post_type' => 'post',
        'orderby' => 'date',
        'sentence' => 1,
    );
    if($_POST){
        foreach ($_POST as $k => $v){
            if($v === '0' || $k === 'action' || $v === ''){
                continue;
            }
            $args[$k] = $v;
        }
    }
    $_SESSION['insights'] = $args;
    query_posts($args);
    $_SESSION['insights']['results'] = $wp_query->found_posts;
    get_template_part('template-parts/insights/insights', 'filters');
    echo '<section class="search-ins-sect res-sect">
            <div class="container">';
                    if (have_posts()) {
                        echo '<div class="search-ins" >';
                        while (have_posts()) {
                            the_post();

                            get_template_part('template-parts/post', 'list');

                        }
                        echo '</div>';
                        wp_reset_postdata();
                    } else {
                        echo "<h2 class='not-found'>";
                        trans('No results found for the criteria you entered. Please search again.');
                        echo "</h2>";
                    }
    echo ' </div>
        </section>';
    if ( $wp_query->max_num_pages > 1 ){
        get_template_part('template-parts/loadmore', 'vars');
    }
    die();
};



function show_posts( $category, $per_page = -1, array $exclude = null)
{

    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'posts_per_page' => $per_page
    ];

    if ($category !== null) $args['cat'] = $category;
    if ($exclude !== null) $args['post__not_in'] = $exclude;

    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('template-parts/post', 'list');
        };
        wp_reset_postdata();
    };
};

function get_lawyer_publications(){
    global $insights_link;
    $args = [
        'cat' => '7,8',
        'post_per_page' => 3,
        'meta_query'    => array(
            array(
                'key' => 'author',
                'value' => get_the_ID()
            )
        )
    ];
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        echo '<section class="achivs-sect achivs-sect_lawyer">
            <div class="container">
                <div class="insights__wrap insights__wrap_top">
                    <h2 class="achivs__title">'.trans('Insights',false).'</h2>
                </div>
                <div class="insights__content achivs__content op-cont">
                    <div class="achivs__tab-wrap cont-tab-ins active">';
        while ($posts->have_posts()) {
            $posts->the_post();

            get_template_part('template-parts/post', 'list');

        };
        echo '</div>
                </div>
                <a href="'.wpm_translate_url($insights_link).'" class="insights__more">
                    <span>'. trans('View all',false).'</span>
                    <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                        <rect x=\'0\' y=\'0\' fill=\'none\' width=\'242\' height=\'64\' />
                    </svg>
                </a>
            </div>
        </section>';
        wp_reset_postdata();
    };
};

function posts_exist($category = null, array $exclude = null)
{
    $args = [
        'post_type' =>'post',
    ];
    if ($category !== null) $args['cat'] = $category;
    if ($exclude !== null) $args['post__not_in'] = $exclude;
    $posts = new WP_Query($args);
    if ($posts->have_posts()) {
        return true;
    } else {
        return false;
    }

};

