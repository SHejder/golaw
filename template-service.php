<?php
/*
Template Name: Service
Template Post Type: expertise
*/
has_term('', 'practice') ? $taxonomy = 'practice' : $taxonomy = 'sector';
get_header('expertise');
if (have_posts()):; ?>
    <?php while (have_posts()): the_post() ?>
        <div class="modal-page">
            <div class="container">
                <div class="sub-practice__content">
                    <div class="sub-practice__wrap sub-practice__wrap_left">
                        <div class="sub-practice__wrapper scroll-cont">
                            <h1 class="sub-practice__title"><?php the_title() ?>
                            </h1>
                            <?php
                            if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('<ul class="breadcrumbs">', '</ul>');
                            }
                            ?>
                            <div class="sub-practice__text-content">
                                <?php content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="sub-practice__wrap sub-practice__wrap_right">
                        <ul class="sub-practice__offers sc-ofrs">
                            <?php getExpertiseList('column', $taxonomy, array(get_the_ID()), true); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_sidebar();
get_template_part('template-parts/bottom', 'modals');
//get_template_part('template-parts/bottom', 'cookie');
wp_footer(); ?>
