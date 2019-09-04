<?php $description = get_field('description');?>
<div class="search-law__lawyer">
    <figure class="search-law__wrap-img"><img src="<?= get_the_post_thumbnail_url();?>" alt="<?php the_title();?>"></figure>
    <div class="search-law__content">
        <h2 class="search-law__name">
            <a href="<?= get_permalink(); ?>"
               class="search-law__name-link"><?php the_title(); ?></a>
        </h2>
        <p class="search-law__position">
            <?php $strings= [];
            foreach ($description as $item) {
                array_push($strings, $item['item']);
            }
            echo '<span>'.implode(', </span><span>', $strings).'</span>';
            ;?>
        </p>
        <div class="search-law__btns">
            <?php get_template_part('template-parts/people','buttons');?>
        </div>
    </div>
</div>
