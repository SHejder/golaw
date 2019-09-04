<?php get_template_part(HEADER_TMP_PATH, 'basic');
global $contacts_link, $people_link;?>
<header class="header-hero">
    <img src="<?php header_image(); ?>" alt="image" class="header-hero__img">
    <div class="container">
            <div class="header-wrap header-wrap_1">
                <div class="header-lang">
					<?php if ( function_exists ( 'lang_switcher' ) ) lang_switcher ('column'); ?>               
                </div>               
                <div class="offer">
                    <h1 class="offer__title">
                        <?php dt_get_title();?>
                    </h1>
                    <a href="<?= wpm_translate_url($contacts_link);?>" class="offer__contact">
                        <span><?php trans('Contact us');?></span>
                    </a>
                </div>
            </div>
            <div class="header-wrap header-wrap_2">
                <form action="<?= wpm_translate_url($people_link);?>" method="get" class="find-prof">
                    <h2 class="find-prof__title"><?php trans('Find a professional');?></h2>
                    <div class="find-prof__wrap">
                        <input id="home_people-search" type="text" name="q" class="find-prof__input" placeholder="<?php trans('Search by name or surname');?>">
                        <button type="submit" class="find-prof__btn">
                                <span>
                                    <svg class="find-prof__svg" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path class="find-prof__path"
                                              d="M23.7061 22.2945L17.9363 16.5247C19.3665 14.7811 20.2286 12.5476 20.2286 10.1133C20.2286 4.52964 15.698 -0.000976562 10.1143 -0.000976562C4.52571 -0.000976562 0 4.52964 0 10.1133C0 15.697 4.52571 20.2276 10.1143 20.2276C12.5486 20.2276 14.7771 19.3705 16.5208 17.9402L22.2906 23.7051C22.6824 24.097 23.3143 24.097 23.7061 23.7051C24.098 23.3182 24.098 22.6815 23.7061 22.2945ZM10.1143 18.2145C5.64245 18.2145 2.00816 14.5802 2.00816 10.1133C2.00816 5.64637 5.64245 2.00719 10.1143 2.00719C14.5812 2.00719 18.2204 5.64637 18.2204 10.1133C18.2204 14.5802 14.5812 18.2145 10.1143 18.2145Z"/>
                                    </svg>
                                </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-wrap header-wrap_3">
            <?php get_template_part('template-parts/social', 'links') ?>
        </div>
</header>


