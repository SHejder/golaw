<?php
/*
Template Name: Vacancy
Template Post Type: page
*/
get_header('post');
if (function_exists('get_field')) {
    $quote = get_field('quote');
    $email = get_field('email_for_cv');
}
$locations = get_terms('location'); ?>
<?php if ($quote): ?>
    <section class="quote-career-sect">
        <div class="container">
            <h2 class="quote-career__title">
                <?php trans('GOLAW is a space for brave like-minded people!'); ?>
            </h2>
            <blockquote class="quote-career__quote">
                <?= $quote; ?>
            </blockquote>
        </div>
    </section>
<?php endif; ?>
    <section class="jobs-sect">
        <div class="container">
            <div class="jobs__wrap jobs__wrap_top">
                <h2 class="jobs__title"><?php trans('Positions available'); ?></h2>
                <ul class="jobs__tabs">
                    <li class="jobs__tab-title">
                        <button data-city="all" class="jobs__tab-link job-tab active">
                            <?php trans('All'); ?>
                        </button>
                    </li>
                    <?php foreach ($locations as $location): ?>
                        <li class="jobs__tab-title">
                            <button data-city="<?= $location->slug ?>" class="jobs__tab-link job-tab">
                                <?= $location->name; ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="jobs__wrap jobs__wrap_bot">
                <?php getVacancyList('raw'); ?>
            </div>
        </div>
    </section>
    <section class="job-about-sect">
        <div class="container">
            <div class="job-about__wrap_main">
                <div class="job-about__wrap job-about__wrap_left">
                    <h2 class="job-about__title">​<?php trans('Join our Dream Team today!'); ?></h2>
                    <div class="job-about__content">
                        <?php content(); ?>
                    </div>
                </div>
                <div class="job-about__wrap job-about__wrap_right">
                    <h2 class="job-about__title">​Sounds interesting?</h2>
                    <div class="job-about__content">
                        <p>
                            Send you CV and cover letter straight away to <a
                                    href="mailto:<?= $email; ?>"><?= $email; ?></a>
                        </p>
                        <p>
                            See you soon!
                        </p>
                        <?php get_template_part('template-parts/social', 'links') ?>
                    </div>
                </div>
            </div>
    </section>
<?php get_template_part('template-parts/vacancies/vacancies', 'modal'); ?>
<?php get_footer();
