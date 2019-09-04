<?php
get_header('post');
global $query_string, $wp_query; ?>
    <section class="search-criteria-sect">
        <div class="container">
            <div class="search-criteria">
                <div class="search-criteria__wrap-filters">
                    <p class="search-criteria__text"><?php trans('Search Results for'); ?>:</p>
                    <ul class="search-criteria__filters">
                        <li class="search-criteria__item">
                            <span class="search-criteria__label"><?= get_search_query(); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="search-criteria__maches">
                    <span class="search-criteria__count"><?= $wp_query->post_count ?></span>
                    <?php trans('Matching Results'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="search-ins-sect">
        <div class="container">
            <div class="search-res-main">
                <?php  if (have_posts()): ?>
                    <?php
                    $tmp = array();
                    while (have_posts()): the_post(); ?>
                        <?php if (get_post_type() === 'people'): ?>
                            <div class="search-res-main__item">
                                <h2 class="search-res-main__title">
                                    <a href="<?php the_permalink(); ?>"
                                       class="search-res-main__link"><?= get_the_title(); ?>
                                    </a>
                                </h2>
                                <div class="search-res-main__text">
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                        <?php else : ?>
                            <?php array_push($tmp, get_post());?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php foreach ($tmp as $post):?>
                        <div class="search-res-main__item">
                            <h2 class="search-res-main__title">
                                <a href="<?= get_permalink($post->ID); ?>"
                                   class="search-res-main__link"><?= $post->post_title; ?>
                                </a>
                            </h2>
                            <div class="search-res-main__text">
                                <p>
                                    <?php $post->post_excerpt; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php else : ?>
                    <h2 class="not-found"><?php trans('The search you entered did not locate any results.');?></h2>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php get_footer();