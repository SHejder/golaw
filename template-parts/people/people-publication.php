<?php
if (function_exists('get_field')) {
    $recognitions = get_field('recognitions');
    $description = get_field('description');
}; ?>
<div class="overview__wrap-head-main">
    <?php if (has_post_thumbnail()): ?>
        <figure class="overview__wrap-img">
            <?php the_post_thumbnail('people', array('alt' => get_the_title())); ?>
        </figure>
    <?php endif; ?>
    <div class="overview__wrap-about">
        <div class="overview__wrap-name-pos">
            <h3 class="overview__name">
                <a href="<?php the_permalink(); ?>" class="overview__name-link">
                    <?php the_title() ?>
                </a>
            </h3>
            <?php if (!empty($description)): ?>
                <p class="overview__position">
                    <?php $items = [];
                    foreach ($description as $item) {
                        array_push($items, $item['item']);
                    };
                    echo implode(', ', $items);
                    ?>
                </p>
            <?php endif; ?>
        </div>
        <?php if ($recognitions): ?>
            <ul class="overview__wrap-rec">
                <li class="overview__item-rec overview__item-rec_title">
                    <?php trans('Recognitions'); ?>
                </li>
                <?php foreach ($recognitions as $recognition): ?>
                    <li class="overview__item-rec">
                        <span><?= $recognition['recognitions']['title']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="overview__btns">
            <?php get_template_part('template-parts/people/people', 'buttons'); ?>
        </div>
    </div>
</div>