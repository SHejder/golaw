<?php $description = get_field('description'); ?>
<div class="layers__item">
    <figure class="layers__wrap_img">
        <?php if (has_post_thumbnail()): ?>
            <div class="layers__img">
                <a href="<?= get_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail('people', array('alt' => get_the_title())); ?>
                </a>
            </div>
        <?php endif; ?>
        <figcaption class="layers__name">
            <a href="<?= get_permalink(); ?>" class="layers__link"><?php the_title(); ?></a>
        </figcaption>
    </figure>
    <div class="layers__content">
        <?php if (!empty($description)): ?>
            <ul class="layers__wrap_position">
                <?php foreach ($description as $item) : ?>
                    <li class="layers__item-position"><span><?= $item['item']; ?></span></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="layers__btns">
            <?php get_template_part('template-parts/people/people', 'buttons'); ?>
        </div>
    </div>
</div>
