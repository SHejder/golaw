<?php if(function_exists('get_field'))$recognitions = get_field('recognitions', 'option');
if ($recognitions):?>
<section class="recognition-sect">
    <div class="container">
        <h2 class="recognition__title">
            <?php trans('recognitions');?>
        </h2>
        <div class="swiper-container slider slider_awards">
            <div class="swiper-wrapper slider__wrapper">
                <?php foreach ( $recognitions as $recognition): ;?>
                <div class="swiper-slide slider__item">
                    <<?= ($recognition['rec_publication'] !== '')?'a':'div';?> href="<?= $recognition['rec_publication'];?>" class="aw-slide">
                        <div class="aw-slide__wrap-img"><img src="<?= $recognition['rec_image']['url'];?>" alt="some-alt"></div>
                        <p class="aw-slide__text"><?= $recognition['rec_text']?></p>
                    </<?= ($recognition['rec_publication'] !== '')?'a':'div';?>>
                </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-scrollbar slider__scrollbar"></div>
        </div>
    </div>
</section>
<?php endif;?>

