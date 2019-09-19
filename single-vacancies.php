<?php
get_header();
if (function_exists('get_field')){
    $requirements = get_field('key_requirements');
    $qualities = get_field('personal_qualities');
};
if (have_posts()):; ?>
    <?php while (have_posts()): the_post() ?>
        <section class="policy-sect">
            <div class="container">
                <div class="modal-job__text-content">
                    <?php if (isset($requirements)&&!empty($requirements)): ?>
                        <h3><?php trans('Key requirements'); ?></h3>
                        <ul>
                            <?php foreach ($requirements as $requirement): ?>
                                <li><?= $requirement['requirement']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (isset($qualities)&&!empty($qualities)): ?>
                        <h3><?php trans('Personal qualities'); ?></h3>
                        <ul>
                            <?php foreach ($qualities as $quality): ?>
                                <li><?= $quality['personal_qualitie']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php content();?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
