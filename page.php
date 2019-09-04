<?php
get_header('policy');
if (have_posts()):; ?>
    <header class="header-inside">
        <div class="container">
            <div class="header-page">
                <?php get_template_part(HEADER_TMP_PATH, 'breadcrumbs');?>
            </div>
        </div>
    </header>

    <?php while (have_posts()): the_post() ?>
        <section class="policy-sect">
            <div class="container">
                <div class="policy__content">
                    <?php content();?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();