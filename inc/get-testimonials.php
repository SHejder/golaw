<?php

function getTestimonials($include = null)
{
    $args = [
        'post_type' => 'testimonial',
    ];
    if ($include) $args['post__in'] = $include;

    $posts = new WP_Query($args);
    if ($posts->have_posts()):?>
        <section class="reviews-sect reviews-sect_single-practice">
            <div class="container">
                <div class="reviews__wrap reviews__wrap_top">
                    <h2 class="reviews__title">
                        <i>
                            <svg viewBox="0 0 103 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M78.9001 21.582C77.7136 21.5858 76.5293 21.6823 75.3578 21.8705C75.5984 14.0407 78.0948 6.44676 82.5472 0C65.597 18.3565 55.1016 27.9806 55.1016 45.3144C55.1016 49.9822 56.4865 54.5453 59.0814 58.4265C61.6762 62.3077 65.3643 65.3327 69.6794 67.119C73.9944 68.9054 78.7426 69.3727 83.3234 68.4621C87.9043 67.5514 92.112 65.3036 95.4146 62.0029C98.7172 58.7023 100.966 54.4969 101.877 49.9187C102.789 45.3405 102.321 40.5951 100.534 36.2826C98.7463 31.97 95.7195 28.284 91.8361 25.6907C87.9527 23.0973 83.387 21.7131 78.7164 21.7131L78.9001 21.582Z"/>
                                <path
                                        d="M23.7464 21.582C22.5599 21.5847 21.3755 21.6812 20.2042 21.8705C20.4328 14.0387 22.9303 6.44138 27.3936 0C10.3122 18.3565 0.000362576 27.9806 0.000362576 45.3144C-0.0256158 50.0137 1.34495 54.6149 3.93836 58.5349C6.53176 62.4548 10.2312 65.5171 14.5679 67.3334C18.9046 69.1498 23.6832 69.6385 28.2981 68.7377C32.913 67.8368 37.1564 65.5869 40.4904 62.2732C43.8245 58.9594 46.0992 54.731 47.0261 50.1239C47.953 45.5167 47.4905 40.7382 45.6971 36.394C43.9038 32.0499 40.8603 28.3356 36.9525 25.722C33.0447 23.1084 28.4485 21.7132 23.7464 21.7131V21.582Z"/>
                            </svg>
                        </i>
                        <?php trans('Testimonials'); ?>
                    </h2>
                </div>
                <div class="reviews__wrap reviews__wrap_bot">
                    <div class="slider-navigation">
                        <div class="slider-pagin"></div>
                        <div class="slider-btns">
                            <button class="swiper-button-prev btn-arr btn-prev">
                                <svg class="slider-svg" viewBox="0 0 12 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="slider-path"
                                          d="M12 2.19758L4.54054 9.41821L12 16.6388L9.72973 18.8364L0 9.41821L9.72973 1.56462e-07L12 2.19758Z"/>
                                </svg>
                            </button>
                            <button class="swiper-button-next btn-arr btn-next">
                                <svg class="slider-svg" viewBox="0 0 12 19" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="slider-path"
                                          d="M2.05845e-06 16.6388L7.45946 9.41821L1.57106e-06 2.19758L2.27027 2.91281e-07L12 9.41821L2.27027 18.8364L2.05845e-06 16.6388Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="swiper-container slider slider_reviews">
                        <div class="swiper-wrapper slider__wrapper">
                            <?php while ($posts->have_posts()): $posts->the_post(); ?>
                                <?php get_template_part('template-parts/testimonial', 'slider'); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php
}
