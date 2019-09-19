<?php
if (function_exists('get_field')) {
    $requirements = get_field('key_requirements');
    $qualities = get_field('personal_qualities');
}; ?>
<div data-id="<?php the_ID(); ?>" class="modal-job__wrapper j-all-cont scroll-cont">
    <h2 class="modal-job__title"><?php the_title() ?></h2>
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
        <?php content(); ?>
    </div>
</div>

