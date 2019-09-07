<?php

use classes\Kama_Contents;
use classes\SidebarMenu;
use classes\pdf\Pdf;
use classes\pdf\LocalPdf;
use Mpdf\Mpdf;

/**
 * @param string $menu_id
 */
function sidebar_menu($menu_id)
{
    $args = [
        'menu' => 'Sidebar',
        'container' => 'div',
        'container_class' => 'mod-menu__wrap',
        'echo' => true,
        'menu_class' => 'mod-menu__menu',
        'after' => false,
        'walker' => new SidebarMenu(),
    ];

    wp_nav_menu($args);
}

/**
 * Show title in dependency
 */
function dt_get_title()
{
    if (!is_front_page()) {
        if(is_home() || is_singular()){
            single_post_title();
        }
    } elseif (is_front_page()) {
        preg_match_all('/\w{3,}|\w{1,2}\s\w{3,}/iu', single_post_title('', false), $words);
        echo implode('<br>', $words[0]);
    } elseif (is_year() || is_archive()) {
        echo get_the_archive_title();
    } elseif (is_category() || is_tax()) {
        single_cat_title();
    } elseif (is_search()) {
        trans('Search');
    }
}

/**
 * @param mixed $var
 * For debuging
 */
function debug($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Search page's slug
 */
function bs_change_search_url()
{
    if (is_search() && !empty($_GET['s'])) {
        wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
        die();
    }
}

/**
 * @param $link_output
 * @return string
 */
function cut_wpseo_breadcrumb_last($link_output)
{

    if (false !== strpos($link_output, 'breadcrumb_last')) {

        if (strlen($link_output) > 100) {
            $link_output = substr($link_output, 0, 100).'...';
        }
    }

    return $link_output;
}

/**
 * PHP session enable
 */
function start_session()
{
    if (!session_id()) {
        session_start();
    }
}

/**
 * End session
 */
function end_session()
{
    session_destroy();
}

/**
 * Ajax handler path
 */
function ajax_data()
{
    wp_localize_script('jquery', 'ajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}

/**
 * ACF option page init
 */
if (function_exists('acf_add_options_page')) acf_add_options_page();

/**
 * Translation.
 * @param string $string
 * @param bool $echo
 * @return string
 */
function trans(string $string, bool $echo = true)
{
    $dictionary = include 'translation/dictionary.php';
    if (isset($dictionary[$string]) && $dictionary[$string]['en'] !== '') {
        $string = strtolower($string);
//        $dictionary = array_unique($dictionary);
//        foreach ($dictionary as $k => $v){
//            $str = strtolower($k).print_r($v, true);
//            file_put_contents(get_template_directory().'/trans.txt', $str, FILE_APPEND);
//
//        }
//        file_put_contents(get_template_directory().'/trans.txt', $string, FILE_APPEND);
        $out = "";
        foreach ($dictionary[$string] as $k => $v) {
            $out .= "[:{$k}]{$v}";
        }
        $out .= "[:]";
        $out = wpm_translate_string($out);
    } else {
        $out = $string;
    }
    if ($echo) {
        echo $out;
    } else {
        return $out;
    }
}

//Contents list
function kama_contents_shortcode($content)
{
    if (is_singular()) {
        $args = array(
            'to_menu' => '',
            'title' => trans('Contents', false),
            'selectors' => array('h2','h3'),
            'margin' => 0
        );

        return Kama_Contents::init($args)->shortcode($content);
    }
    else
        return Kama_Contents::init()->strip_shortcode($content);
}

//shortcodes
function blockWrapper($atts, $content)
{
    $atts = shortcode_atts(array(
        'type' => null,
    ), $atts);
    if ($atts['type'] === 'quote') {
        return '<div class="article__block-quote bl-num">' . $content . '</div>';
    } elseif ($atts['type'] === 'intro') {
        return '<div class="article__block-intro bl-num">' . $content . '</div>';
    } elseif ($atts['type'] === 'video') {
        return '<div class="article__block-video">' . $content . '</div>';
    } else {
        return '<div class="article__block-text bl-num">' . $content . '</div>';
    }
}

function contentSlider()
{
    if (function_exists('get_field')) {
        $images = get_field('slider');
        $slider_controls = '<div class="slider-btns slider_article__btns">
                                <button class="swiper-button-prev btn-arr btn-prev">
                                    <svg class="slider-svg" viewBox="0 0 12 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="slider-path"
                                            d="M12 2.19758L4.54054 9.41821L12 16.6388L9.72973 18.8364L0 9.41821L9.72973 1.56462e-07L12 2.19758Z" />
                                    </svg>
                                </button>
                                <button class="swiper-button-next btn-arr btn-next">
                                    <svg class="slider-svg" viewBox="0 0 12 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="slider-path"
                                            d="M2.05845e-06 16.6388L7.45946 9.41821L1.57106e-06 2.19758L2.27027 2.91281e-07L12 9.41821L2.27027 18.8364L2.05845e-06 16.6388Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="slider-pagin slider-pagin_article"></div>';
        $slides = '<div class="swiper-wrapper slider__wrapper">';
        foreach ($images as $image) {
            $slides .= '<div class="swiper-slide slider__item">
                            <div class="atl-slide">
                                <div class="atl-slide__wrap-img">
                                    <img src="' . $image['slide'] . '" alt="some-alt">
                                </div>
                            </div>
                        </div>';
        }
        $slides .= '</div>';
        $slider = '<div class="swiper-container slider slider_article">' . $slides . $slider_controls . '</div>';
        return $slider;
    }
}

function content() {
    if (get_the_content()) {
        the_content();
    } else {
        echo '<h2>' . trans('Sorry...Page under construction', false) . '</h2>';
    }
}

function savePDF($post_ID, $post, $update)
{
    $pdf = new Pdf(new Mpdf(), new LocalPdf() );
    $pdf->savePDF($post);
    unset($pdf);
}





