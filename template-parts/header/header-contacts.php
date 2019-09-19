<?php
if (function_exists('get_field')){
    $contacts = get_field('contacts');
};?>
<header class="header-inside">
    <?php get_template_part(HEADER_TMP_PATH, 'breadcrumbs'); ?>
    <div class="container">
        <ul class="place-map">
            <?php $count = 1; foreach ($contacts as $contact):?>
                <li data-id="<?= $count;?>" class="place-map__item map-titl <?= ($count === 1)?'active':'';?>">
                    <button data-marker-id="<?= $count-1;?>" data-lat="<?= $contact['coordinats']['latitude'];?>" data-lang="<?= $contact['coordinats']['longitude'];?>" class="place-map__tab map-tab">
                        <span><?= $contact['location']->name;?></span>
                    </button>
                    <?php $count++;?>
            <?php endforeach;?>
        </ul>
    </div>
</header>

