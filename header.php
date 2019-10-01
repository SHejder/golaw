<?php
global $contacts_link;
$body_classes = 'page-lang-' . wpm_get_language();
$nav_classes = 'navigation';
$templates = [
    'templates/template-expertise.php',
    'templates/template-vacancies.php',
    'templates/template-about.php',
];

if (is_front_page()) {
    $body_classes .= ' home';
    $type = 'home';
} elseif (is_home()) {
    $type = 'insights';
} elseif (is_post_type_archive('people')) {
    $type = 'people';
} elseif (is_page_template('templates/template-service.php') ||
    is_post_type_archive('expertise')) {
    $body_classes .= ' page-policy';
    $body_classes .= ' page-exp';
    $nav_classes .= ' nav-policy';
} elseif (is_page_template('templates/template-contacts.php')) {
    $body_classes .= ' page-contact';
    $type = 'contacts';
} elseif (is_singular(['post', 'people']) || is_page_template($templates) || is_search()) {
    $type = 'default';
} else {
    $type = 'default';
    $body_classes .= ' page-policy';
    $nav_classes .= ' nav-policy';
};

if(isset($type)){
    ob_start();
    get_template_part(HEADER_TMP_PATH,$type);
    $header = ob_get_clean();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
    <?php if (get_page_link() === wpm_translate_url($contacts_link)):?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONeJojxMq_7-PIIds7FCrrmUXmF1wNis"></script>
    <?php endif;?>
</head>
<body class="<?= $body_classes; ?>">
<nav class="<?= $nav_classes; ?>">
    <div class="container">
        <div class="logo">
            <a href="<?php echo get_home_url(); ?>" class="logo__link">
                <svg width="136" height="24" viewBox="0 0 136 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="logo__img"
                          d="M20.0223 7.13453C18.0383 5.33383 14.9391 4.29468 12.5699 4.29468C8.21673 4.29468 5.18621 7.79217 5.18621 12.0141C5.18621 15.9629 7.83306 19.7024 12.9178 19.7024C14.9734 19.7024 17.271 19.1486 18.6996 18.1793V14.3715H11.8324V10.2861H23.3603V20.4327C20.4 22.615 16.2558 23.9659 12.7043 23.9659C5.43104 23.9614 0 18.632 0 11.9829C0 5.36797 5.5027 0 12.5401 0C16.1229 0 20.0626 1.42067 23.3365 4.0527L20.0223 7.13453ZM40.0491 0C47.2581 0 53.037 5.36797 53.037 11.9488C53.037 18.6662 47.2551 24 40.0491 24C32.843 24 27.1985 18.6662 27.1985 11.9488C27.1985 5.36797 32.843 0 40.0491 0ZM40.0491 19.7439C44.4023 19.7439 47.812 16.2123 47.812 11.9532C47.8096 10.9432 47.6068 9.94363 47.215 9.01178C46.8233 8.07993 46.2503 7.23417 45.5291 6.52303C44.8078 5.81189 43.9525 5.24937 43.0121 4.86774C42.0717 4.4861 41.0648 4.29287 40.0491 4.29913C35.7661 4.29913 32.4235 7.76248 32.4235 11.9532C32.4235 16.2078 35.7661 19.7395 40.0491 19.7395V19.7439ZM62.4794 0.697717V19.8478H76.4451V23.3097H58.5785V0.693264L62.4794 0.697717ZM88.5657 0.697717H92.1172L102.67 23.3112H98.3798L95.63 17.2158H84.8037L82.0882 23.3112H78.0126L88.5657 0.697717ZM86.198 14.0954H94.2416L90.3422 5.3368H90.1332L86.198 14.0954ZM104.907 0.693264L111.414 17.3197H111.623L117.02 0.693264H119.807L125.205 17.3197H125.414L131.92 0.693264H136L127.294 23.3067H123.394L118.414 8.17369H118.205L113.225 23.3067H109.324L100.619 0.693264H104.907Z"/>
                </svg>
            </a>
        </div>
        <?php wp_nav_menu([
            'menu' => 'Main menu',
            'container' => 'div',
            'container_class' => 'menu',
            'echo' => true,
            'menu_class' => 'menu__wrapper',
            'after' => false,

        ]); ?>
        <div class="nav-btns">
            <div class="nav-btns__wrap">
                <form role="search" method="get" action="<?php echo home_url('/') ?>" class="nav-search header-search">
                    <div class="nav-search__wrap">
                        <input type="text" class="nav-search__input header-search-input" data-head-search
                               data-mod-text="<?php trans('Enter keyword'); ?>..."
                               placeholder="<?php trans('Search by keyword'); ?>"
                               value="<?php echo get_search_query() ?>">
                    </div>
                    <button type="submit" class="nav-search__btn">
                        <svg class="nav-search__svg" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="nav-search__path"
                                  d="M23.7061 22.2955L17.9363 16.5257C19.3665 14.782 20.2286 12.5486 20.2286 10.1143C20.2286 4.53061 15.698 0 10.1143 0C4.52571 0 0 4.53061 0 10.1143C0 15.698 4.52571 20.2286 10.1143 20.2286C12.5486 20.2286 14.7771 19.3714 16.5208 17.9412L22.2906 23.7061C22.6824 24.098 23.3143 24.098 23.7061 23.7061C24.098 23.3192 24.098 22.6824 23.7061 22.2955ZM10.1143 18.2155C5.64245 18.2155 2.00816 14.5812 2.00816 10.1143C2.00816 5.64735 5.64245 2.00816 10.1143 2.00816C14.5812 2.00816 18.2204 5.64735 18.2204 10.1143C18.2204 14.5812 14.5812 18.2155 10.1143 18.2155Z"/>
                        </svg>
                    </button>
                </form>
                <div class="nav-lang">

                    <ul class="nav-lang__wrap">
                        <li class="nav-lang__item-cur">
                            <?php if (function_exists('lang_switcher')) lang_switcher('dropdawn'); ?>
                        </li>
                    </ul>
                </div>
                <div class="nav-burger">
                    <button class="nav-burger__btn btn-menu">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-progress"></div>
</nav>
<main class="main">
<?=  isset($header) ? $header:'';?>
