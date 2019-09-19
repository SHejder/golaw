<?php
/*
Template Name: Expertise
Template Post Type: page
*/
get_header('expertise');?>
    <div class="modals modal-page active-static">
        <div class="container">
            <?php get_template_part('template-parts/expertise/expertise','modal');?>
        </div>
    </div>
<?php
get_sidebar();
get_template_part('template-parts/bottom/bottom', 'modals');
//get_template_part('template-parts/bottom/bottom', 'cookie');
wp_footer();
