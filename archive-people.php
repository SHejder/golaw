<?php
get_header('peoples');
global $wp_query;?>
<div id="ajaxContent">
    <?php
    if (isset($_SESSION['people']) && isset($_SESSION['people']['post_type']))$args = $_SESSION['people'];
    else $args = array('post_type' => 'people', 'orderby' => 'menu_order', 'order' => 'ASC');
//    debug($args);
    query_posts($args);
    $_SESSION['people']['results']['count'] = $wp_query->found_posts;
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
        </section>';?>
</div>
<?php get_footer();
