<?php
if (isset($_SESSION['insights']['cat']))
    $category = get_category($_SESSION['insights']['cat']);
if (isset($_SESSION['insights']['tag_id']))
    $tag = get_tag($_SESSION['insights']['tag_id']);
global $wp_query;
?>
<section class="search-criteria-sect">
    <div class="container">
        <div class="search-criteria">
            <div class="search-criteria__wrap-filters">
                <p class="search-criteria__text"><?php trans('Search Results for'); ?>:</p>
                <ul class="search-criteria__filters">
                    <?php if (isset($_SESSION['insights']['s']) || isset($_SESSION['insights']['cat'])
                        || isset($_SESSION['insights']['tag_id'])): ?>
                        <?php if (isset($_SESSION['insights']['s'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="s">
                                <span class="search-criteria__label"><?= $_SESSION['insights']['s'] ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['insights']['cat'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="cat">
                                <span class="search-criteria__label"><?= $category->name; ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['insights']['tag_id'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="tag">
                                <span class="search-criteria__label"><?= $tag->name; ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                    <? else : ?>
                        <li class="search-criteria__item">
                            <span class="search-criteria__label"><?php trans('No filters used'); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['insights']['s']) || isset($_SESSION['insights']['cat'])
                    || isset($_SESSION['insights']['tag_id'])): ?>
                    <button class="search-criteria__clear s-clr"><?php trans('Clear all filters'); ?></button>
                <?php endif; ?>
            </div>
            <div class="search-criteria__maches">
                <span class="search-criteria__count"><?= $_SESSION['insights']['results'] ? $_SESSION['insights']['results'] : $wp_query->found_posts; ?></span>
                <?php trans('Matching Results'); ?>
            </div>
        </div>
    </div>
</section>


