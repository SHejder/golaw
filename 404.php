<?php get_header();?>
    <section class="error-page-sect">
        <div class="container">
            <h1 class="error-page__title">
                404
            </h1>
            <p class="error-page__text">
                <?php trans('Our apologies, this is almost certainly not the page you were looking for.
                Please try the search tool, above, or visit our home page.'); ?>
            </p>
            <a href="<?php echo get_home_url(); ?>" class="error-page__btn">
                    <span>
                        <?php trans('Back to home'); ?>
                    </span>
                <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='242' height='64'/>
                </svg>
            </a>
        </div>
    </section>
<?php
    get_sidebar();
    get_template_part('template-parts/bottom/bottom', 'modals');
    wp_footer(); ?>


