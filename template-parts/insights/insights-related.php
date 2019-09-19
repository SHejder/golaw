<?php $category = get_the_category();
global $insights_link;?>
<?php if(posts_exist($category[0]->term_id, array(get_the_ID()))):?>
    <section class="achivs-sect achivs-sect_article">
        <div class="container">
            <div class="insights__wrap insights__wrap_top">
                <h2 class="achivs__title"><?php trans('Related insights');?></h2>
            </div>
            <div class="insights__content achivs__content op-cont">
                <div class="achivs__tab-wrap cont-tab-ins active">
                    <?php if(function_exists('show_posts')) show_posts( $category[0]->term_id, 3, array(get_the_ID()))?>
                </div>
            </div>
            <a href="<?=  wpm_translate_url($insights_link) .'?c='.$category[0]->term_id;?>" class="insights__more">
                <span><?php trans('View all');?></span>
                <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='242' height='64' />
                </svg>
            </a>
        </div>
    </section>
<?php endif;?>

