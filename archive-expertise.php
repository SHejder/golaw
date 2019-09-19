<?php
get_header();?>
    <div class="modals modal-page active-static">
        <div class="container">
            <?php get_template_part('template-parts/expertise/expertise','modal');?>
        </div>
    </div>
<?php
get_sidebar();
get_template_part('template-parts/bottom/bottom', 'modals');
wp_footer();
