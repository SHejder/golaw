<?php
$args = [
    'taxonomy' => 'category',
    'child_of' => 0,
];
global $insights_link;
$categories = get_categories($args);
$tab_index = 2;
if (posts_exist()) : ?>
    <div class="container">
        <div class="insights__wrap insights__wrap_top">
            <h2 class="insights__title"><?php trans('insights');?></h2>
            <ul class="insights__tabs">
                <li class="insights__tab-title">
                    <button data-id="1" class="insights__tab-link ins-tab active">
                        <?php trans('All');?>
                    </button>
                </li>
                 <?php foreach ($categories as $category):?>
                     <?php if (posts_exist($category->term_id)): ?>
                     <li class="insights__tab-title">
                        <button data-id="<?= $tab_index; ?>" data-category="<?= $category->term_id;?>" class="insights__tab-link ins-tab">
                            <?= $category->name ?>
                        </button>
                     </li>
                     <?php endif; ?>
                 <?php
                 $tab_index++;
                 endforeach;
                 $tab_index = 2;
                 ?>
            </ul>
        </div>
        <div class="insights__content">
            <div data-id="1" class="insights__tab-wrap cont-tab-ins active">
                <?php show_posts(null, 3); ?>
            </div>
            <?php foreach ($categories as $category):?>
                <div data-id="<?= $tab_index; ?>" class="insights__tab-wrap cont-tab-ins">
                    <?php  show_posts( $category->term_id, 3); ?>
                </div>
            <?php
            $tab_index++;
            endforeach;
            ?>
        </div>
        <a href="<?= wpm_translate_url($insights_link);?>" class="insights__more ins-view">
            <span><?php trans('view all');?></span>
            <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                <rect x='0' y='0' fill='none' width='242' height='64' />
            </svg>
        </a>
    </div>
<?php endif;
