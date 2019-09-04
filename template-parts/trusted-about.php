<?php if (function_exists('get_field')) $trusted = get_field('trusted', 'option'); ?>
<h2 class="recognition__title">
    <?php trans('We are trusted'); ?>
</h2>
<div class="swiper-container slider slider_client">
    <div class="swiper-wrapper slider__wrapper">
        <?php foreach ($trusted as $img): ?>
            <div class="swiper-slide slider__item">
                <div class="cl-slide">
                    <div class="cl-slide__wrap-img"><img src="<?= $img['images'];?>" alt="some-alt"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-scrollbar slider__scrollbar"></div>
</div>

