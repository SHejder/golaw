<?php
$description = get_field('description');;
?>
    <div class="overview__wrap-head-main">
        <figure class="overview__wrap-img">
            <img src="<?= get_the_post_thumbnail_url();?>" alt="<?php the_title();?>">
        </figure>
        <div class="overview__wrap-about">
            <div class="overview__wrap-name-pos">
                <h3 class="overview__name">
                    <a href="<?php the_permalink(); ?>" class="overview__name-link">
                        <?php the_title() ?>
                    </a>
                </h3>
                <p class="overview__position">
                    <?php $items = [];
                    foreach ($description as $item) {
                        array_push($items, $item['item']);
                    };
                    echo implode(', ', $items);
                    ?>
                </p>
            </div>

            <div class="overview__btns">
                <?php get_template_part('template-parts/people','buttons');?>
            </div>
        </div>
    </div>

