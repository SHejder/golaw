<?php get_template_part(HEADER_TMP_PATH, 'basic'); ?>
<header class="header-inside <?= is_search()?'header-inside_search-bar' : 'header-inside_article'?>">
    <?php get_template_part(HEADER_TMP_PATH, 'breadcrumbs'); ?>
    <!-- тут у тебя немного не правильный класс header-inside header-inside_article => -->
    <?php if (is_search()): ?>
        <div class="container">
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</header>


