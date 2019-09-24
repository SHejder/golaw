<?php
get_header();
if (have_posts()):; ?>
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