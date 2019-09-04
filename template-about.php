<?php
/*
Template Name: About
Template Post Type: page
*/
if (function_exists('get_field')) {
    $intro = get_field('intro');
    $cases = get_field('cases');
}
get_header('post'); ?>
    <section class="approach-sect">
        <div class="container">
            <h2 class="approach__title">
                <?php trans('Our approach'); ?>
            </h2>
            <div class="approach">
                <div class="approach__wrap approach__wrap_left">
                    <p class="approach__text-intro">
                        <?= $intro ?>
                    </p>
                </div>
                <div class="approach__wrap approach__wrap_right">
                    <?php content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php if ($cases):?>
    <section class="rep-cases-sect">
        <div class="container">
            <h2 class="rep-cases__title">
                <?php trans('Representative cases'); ?>
            </h2>
            <ul class="rep-cases__wrap">
                <?php foreach ($cases as $case): ?>
                    <li class="rep-cases__item tog-slide">
                        <h3 class="rep-cases__subtitle"><span><?= $case['title'] ?></span><i></i></h3>
                        <div class="rep-cases__content tog-cont">
                            <?= $case['text']; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif;?>
<?php get_template_part('template-parts/recognitions', 'home'); ?>
    <section class="achivs-sect">
        <div class="container">
            <div class="insights__wrap insights__wrap_top">
                <h2 class="achivs__title"><?php trans('Firm\'s News'); ?></h2>
            </div>
            <div class="insights__content achivs__content op-cont">
                <div class="achivs__tab-wrap cont-tab-ins active">
                    <?php show_posts(7); ?>
                </div>
            </div>
            <button class="achivs__more ach-m">
                <span>+ More</span>
                <span>- Less</span>
                <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='242' height='64'/>
                </svg>
            </button>
        </div>
    </section>
    <section class="recognition-sect recognition-sect_trusted">
        <div class="container">
            <?php get_template_part('template-parts/trusted', 'about'); ?>
        </div>
    </section>
<?php getTestimonials(); ?>
<?php get_template_part('template-parts/bottom', 'contacts');
get_footer();