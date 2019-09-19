<?php
get_header('post');
if (function_exists('get_field')) {
    $quote = get_field('quote');
    $email = get_field('email_for_cv');
}
$locations = get_terms('location');?>
<section class="jobs-sect jobs-sect-archive">
    <div class="container">
        <div class="jobs__wrap jobs__wrap_bot">
            <?php getVacancyList('raw');?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/vacancies/vacancies', 'modal'); ?>
<?php get_footer();