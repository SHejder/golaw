<?php $description = get_field('description');?>
<div class="layers__item">
    <figure class="layers__wrap_img">
        <div class="layers__img">
            <a href="<?= get_permalink(); ?>" title="<?php the_title();?>">
                <img src="<?= get_the_post_thumbnail_url();?>" alt="<?php the_title();?>">
            </a>
        </div>
        <figcaption class="layers__name">
            <a href="<?= get_permalink(); ?>" class="layers__link"><?php the_title(); ?></a>
        </figcaption>
    </figure>
    <div class="layers__content">
        <ul class="layers__wrap_position">
            <?php foreach ($description as $item) :?>
                <li class="layers__item-position"><span><?= $item['item']; ?></span></li>
            <?php endforeach;?>
        </ul>
        <div class="layers__btns">
            <?php get_template_part('template-parts/people','buttons');?>
        </div>
    </div>
</div>
