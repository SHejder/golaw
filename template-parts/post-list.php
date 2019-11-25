<?php
$category = get_the_category();
$title = get_the_title();
if(mb_strlen($title) > 80){
    $title = mb_substr(htmlspecialchars_decode($title), 0, 80).'...';
}
?>
<div  class="insights__card<?= !has_post_thumbnail() ? ' insights__card_event':''?> js-lnk">
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
        <h2 class="insights__card-title crop-title">
            <?= $title; ?>
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
