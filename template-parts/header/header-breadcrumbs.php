<?php
$category = get_the_category();
$id = $category[0]->term_id;
$articles = array(6, 7, 8);
if (in_array($id, $articles)) {
    if (is_single() && in_category($articles)){
        $article = 1;
    } else {
        $article = 0;
    }
};?>
<div class="container">
    <div class="header-page">
        <h1 class="header-page__title<?= $article ? ' header-page__title_article' : ''; ?>">
            <?php  dt_get_title(); ?>
        </h1>
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<ul class="breadcrumbs">','</ul>' );
            }
            ?>
    </div>
</div>

