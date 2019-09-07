<?php
$category = get_the_category();?>
<div  class="insights__card insights__card_event js-lnk">
    <?php if(has_post_thumbnail()):?>
        <figure class="insights__wrap-img">
            <?php the_post_thumbnail('post', array('alt'=> get_the_title()));?>
        </figure>
    <?php endif;?>
    <div class="insights__card-content">
        <p class="insights__wrap-date">
            <span class="insights__date"><?= get_the_date('d F Y'); ?></span>
            <span class="insights__tag"><?= $category[0]->name; ?></span>
        </p>
        <h2 class="insights__card-title">
            <?= get_the_title(); ?>
        </h2>
        <?php if(!has_post_thumbnail()):?>
            <p class="insights__text">
                <?php the_excerpt(); ?>
            </p>
        <?php endif;?>
    </div>
    <a <?= (get_field('nofollow'))? 'rel="nofollow"' :  '';?> href="<?php the_permalink(); ?>" class="insights__link lnk-a">
        <span><?php trans('read');?></span>
    </a>
</div>
