<?php $description = get_field('description'); ?>
<div class="search-law__lawyer">
    <?php if (has_post_thumbnail()): ?>
        <figure class="search-law__wrap-img">
            <?php the_post_thumbnail('people', array('alt' => get_the_title())); ?>
        </figure>
    <?php endif; ?>
    <div class="search-law__content">
        <h2 class="search-law__name">
            <a href="<?= get_permalink(); ?>"
               class="search-law__name-link"><?php the_title(); ?></a>
        </h2>
        <?php if (!empty($description)): ?>
            <p class="search-law__position">
                <?php $strings = [];
                foreach ($description as $item) {
                    array_push($strings, $item['item']);
                }
                echo '<span>' . implode(', </span><span>', $strings) . '</span>';; ?>
            </p>
        <?php endif; ?>
        <div class="search-law__btns">
            <?php get_template_part('template-parts/people/people', 'buttons'); ?>
        </div>
    </div>
</div>
