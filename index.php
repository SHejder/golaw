<?php
global $wp_query, $insights_link;
get_header(); ?>
    <div id="ajaxContent">
        <?php
        if (isset($_SESSION['insights'])) {
            $args = $_SESSION['insights'];
        } else {
            $args = array('posts_per_page' => 9);
            $_SESSION['insights'] = $args;
        }
        query_posts($args);
        $_SESSION['insights']['results'] = $wp_query->found_posts;
        get_template_part('template-parts/insights/insights', 'filters');
        if (have_posts()):?>
            <section class="search-ins-sect res-sect">
                <div class="container">
                    <div class="search-ins">
                        <?php while (have_posts()):the_post(); ?>
                            <?php get_template_part('template-parts/post', 'list'); ?>
                        <?php endwhile; ?>
                    </div>
                    <?php if ($wp_query->max_num_pages > 1) {
                        get_template_part('template-parts/loadmore', 'vars');
                    }; ?>
                </div>
            </section>
        <?php else: ?>
            <section class="search-ins-sect res-sect">
                <div class="container">
                    <h2 class="not-found">
                        <?php trans('No results found for the criteria you entered. Please search again.'); ?>
                    </h2>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <section class="topics-sect">
        <div class="container">
            <h2 class="topics__title"><?php trans('Trending Tags'); ?></h2>
            <ul class="topics__wrap">
                <?php $tags = get_tags(array(
                    'numbers' => 7,
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'fields' => 'id=>name'
                ));
                foreach ($tags as $id => $name):; ?>
                    <li class="topics__item"><a href="<?= wpm_translate_url($insights_link) . '?t=' . $id; ?>"
                                                class="topics__btn"><?= $name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php
get_template_part('template-parts/bottom/bottom', 'subscribe');
get_footer();


