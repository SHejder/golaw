<?php
get_header();
global $people_link; ?>
    <section class="home-insights">
        <?php get_template_part('template-parts/insights/insights', 'home'); ?>
    </section>
    <section class="expertise-sect">
        <?php get_template_part('template-parts/expertise/expertise','home');?>
    </section>
    <section class="hero-about-sect">
        <div class="container">
            <div class="hero-about__wrap">
                <h2 class="hero-about__title"><?php trans('About us'); ?></h2>
                <div class="hero-about__wrap_text">
                    <p class="hero-about__text">
                        <?php if (function_exists('get_field')) the_field('about_text', 'option');?>
                    </p>
                </div>
                <a href="<?= get_field('about_link', 'option');?>" class="hero-about__link">
                    <span>learn more</span>
                </a>
            </div>
        </div>
    </section>
<?php get_template_part('template-parts/recognitions', 'home'); ?>
    <section class="key-law-sect">
        <div class="container">
            <h2 class="key-law__title">
                <?php trans('key lawyers'); ?>
            </h2>
            <div class="layers">
                <?php getHomeLawyers(); ?>
            </div>
            <a href="<?= wpm_translate_url($people_link); ?>" class="key-law__btn">
                <span><?php trans('find a professional'); ?></span>
                <svg width="292" height="64" viewBox="0 0 292 64" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='292' height='64'/>
                </svg>
            </a>
        </div>
    </section>
<?php get_template_part('template-parts/bottom/bottom', 'contacts');
get_footer();
