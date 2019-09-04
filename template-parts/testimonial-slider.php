<div class="swiper-slide slider__item">
    <div class="review__slide">
        <div class="review__wrap_left">
            <div class="review__about">
                <h3 class="review__name">
                    <?php the_title() ?>
                </h3>
                <p class="review__firm">
                    <?php the_field('testimonial_author_details'); ?>
                </p>
            </div>
        </div>
        <div class="review__wrap_right">
            <div class="review__content scroll-cont">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>

