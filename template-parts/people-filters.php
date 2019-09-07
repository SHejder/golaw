<?php
if (isset($_SESSION['people'])) {
    if (isset($_SESSION['people']['results']['practice']))
        $practice = get_term($_SESSION['people']['results']['practice']);
    if (isset($_SESSION['people']['results']['location']))
        $location = get_term($_SESSION['people']['results']['location']);
    if (isset($_SESSION['people']['results']['sector']))
        $sector = get_term($_SESSION['people']['results']['sector']);
    if (isset($_SESSION['people']['results']['tax_query']))
        $taxonomy = $_SESSION['people']['tax_query'];
    if (isset($_SESSION['people']['results']['count']))
        $count = $_SESSION['people']['results']['count'];
}
global $wp_query;
?>
<section class="search-criteria-sect">
    <!--    --><?php //debug($_SESSION['people']);?>
    <div class="container">
        <div class="search-criteria">
            <div class="search-criteria__wrap-filters">
                <p class="search-criteria__text"><?php trans('Search Results for'); ?>:</p>
                <ul class="search-criteria__filters">
                    <?php if (isset($_SESSION['people']['s']) || isset($taxonomy)): ?>
                        <?php if ($_SESSION['people']['s']): ?>
                            <li class="search-criteria__item cr-itm" data-type="s">
                                <span class="search-criteria__label"><?= $_SESSION['people']['s'] ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['people']['results']['practice'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="practice">
                                <span class="search-criteria__label"><?= $practice->name; ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['people']['results']['location'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="location">
                                <span class="search-criteria__label"><?= $location->name; ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['people']['results']['sector'])): ?>
                            <li class="search-criteria__item cr-itm" data-type="sector">
                                <span class="search-criteria__label"><?= $sector->name; ?></span>
                                <button class="search-criteria__delite"></button>
                            </li>
                        <?php endif; ?>
                    <? else : ?>
                        <li class="search-criteria__item">
                            <span class="search-criteria__label"><?php trans('No filters used'); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['people']['s']) || isset($_SESSION['people']['results']['practice'])
                    || isset($_SESSION['people']['results']['location']) || isset($_SESSION['people']['results']['sector'])): ?>
                    <button class="search-criteria__clear s-clr"><?php trans('Clear all filters'); ?></button>
                <?php endif; ?>
            </div>
            <div class="search-criteria__maches">
                <span class="search-criteria__count"><?= $count ? $count : $wp_query->found_posts; ?></span>
                <?php trans('Matching Results'); ?>
            </div>
        </div>
    </div>
</section>


