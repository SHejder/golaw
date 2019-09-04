<?php get_template_part(HEADER_TMP_PATH, 'basic');
if($_GET){
    unset($_SESSION['people']);
    if ($_GET['q']) $_SESSION['people']['s'] = $_GET['q'];
}
$articles = array(6, 7, 8);
if (in_array($id, $articles)) {
    if (is_single() && in_category($articles)){
        $article = 1;
    } else {
        $article = 0;
    }
};?>

<header class="header-inside header-inside_search-bar header-inside_people">
    <div class="container">
        <div class="header-page">
            <h1 class="header-page__title<?= $article ? ' header-page__title_article' : ''; ?>">
                <?php trans('Find a professional');?>
            </h1>
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<ul class="breadcrumbs">','</ul>' );
            }
            ?>
        </div>
    </div>
    <div class="container">
        <form action="#" id="people-search" class="search-bar law-s">
            <div class="search-bar__main-input">
                <input type="text" id="people-query" name="query-people" value="<?=$_GET['q'] ? $_GET['q'] : ''?>"
                       class="search-bar__input s-field-law" placeholder="<?php trans('Search by name or surname')?>">
                <button class="search-bar__submit">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.7061 22.2955L17.9363 16.5257C19.3665 14.782 20.2286 12.5486 20.2286 10.1143C20.2286 4.53061 15.698 0 10.1143 0C4.52571 0 0 4.53061 0 10.1143C0 15.698 4.52571 20.2286 10.1143 20.2286C12.5486 20.2286 14.7771 19.3714 16.5208 17.9412L22.2906 23.7061C22.6824 24.098 23.3143 24.098 23.7061 23.7061C24.098 23.3192 24.098 22.6824 23.7061 22.2955ZM10.1143 18.2155C5.64245 18.2155 2.00816 14.5812 2.00816 10.1143C2.00816 5.64735 5.64245 2.00816 10.1143 2.00816C14.5812 2.00816 18.2204 5.64735 18.2204 10.1143C18.2204 14.5812 14.5812 18.2155 10.1143 18.2155Z"
                                        fill="black" />
                                </svg>
                            </span>
                </button>
            </div>
            <div class="search-bar__wrapper">
                <div class="search-bar__wrap-select">
                    <i></i>
                    <?php show_select('practice');?>
                </div>
                <div class="search-bar__wrap-select">
                    <i></i>
                    <?php show_select('sector');?>
                </div>
                <div class="search-bar__wrap-select">
                    <i></i>
                    <?php show_select('location');?>
                </div>
            </div>
        </form>
        <script>
            var session_practice = <?= $_SESSION['people']['results']['practice'] ? $_SESSION['people']['results']['practice'] : '0';?>,
                  session_location = <?= $_SESSION['people']['results']['location'] ? $_SESSION['people']['results']['location'] : '0'?>,
                  session_sector = <?= $_SESSION['people']['results']['sector'] ? $_SESSION['people']['results']['sector'] : '0'?>;
            if(session_practice !== undefined || session_location !== undefined || session_sector !== undefined){
                $('.s-practice').val(session_practice);
                $('.s-location').val(session_location);
                $('.s-sector').val(session_sector);
            }
        </script>

    </div>
</header>

