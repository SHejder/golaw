<?php

use classes\Kama_Contents;
use classes\SidebarMenu;
use classes\pdf\Pdf;
use classes\pdf\LocalPdf;
use classes\translator\Translator;
use Mpdf\Mpdf;

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


function sidebar_menu()
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
        if (is_home() || is_singular()) {
            single_post_title();
        } elseif (is_year() || is_archive()) {
            trans(get_the_archive_title(), true);
        } elseif (is_category() || is_tax()) {
            single_cat_title();
        } elseif (is_search()) {
            trans('Search');
        }
    } else {
        preg_match_all('/\w{3,}|\w{1,2}\s\w{3,}/iu', single_post_title('', false), $words);
        echo implode('<br>', $words[0]);
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

        if (mb_strlen($link_output) > 100) {
            $link_output = mb_substr($link_output, 0, 100) . '...';
        }
    }

    return $link_output;
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
    $transliterator = new Translator($string);
    $out = $transliterator->getLocalString();
    if($echo){
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
            'selectors' => array('h2', 'h3'),
            'margin' => 0
        );

        return Kama_Contents::init($args)->shortcode($content);
    } else
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
        if (isset($images) && !empty($images)) {
            foreach ($images as $image) {
                $slides .= '<div class="swiper-slide slider__item">
                            <div class="atl-slide">
                                <div class="atl-slide__wrap-img">
                                    <img src="' . $image['slide'] . '" alt="some-alt">
                                </div>
                            </div>
                        </div>';
            }
        }
        $slides .= '</div>';
        $slider = '<div class="swiper-container slider slider_article">' . $slides . $slider_controls . '</div>';
        return $slider;
    }
    return false;
}

function content()
{
    if (get_the_content()) {
        the_content();
    } else {
        echo '<h2>' . trans('Sorry...Page under construction', false) . '</h2>';
    }
}

function savePDF($post_ID, $post, $update)
{
    remove_action( 'save_post_people', 'savePDF' );
    wp_update_post( array( 'ID' => $post_ID ) );
    $pdf = new Pdf(new Mpdf(), new LocalPdf());
    $pdf->savePDF($post);
    unset($pdf);
    add_action( 'save_post_people', 'savePDF' );
}

function saveUtmToCookie()
{
    if (isset($_GET['utm_source']) && !isset($_COOKIE['utm_source'])) {
        foreach ($_GET as $k => $v) {
            setcookie($k, $v, time() + 3600 * 24, '/');
        }
    }
}

function generateInputs(array $utm)
{
    foreach ($utm as $k => $v) {
        echo "<input type='hidden' class='{$k}' value='{$v}'>";
    }
}

function utmInputs()
{
    if (isset($_GET['utm_source']) && !isset($_COOKIE['utm_source'])) {
        $utm = $_GET;
    } elseif (isset($_COOKIE['utm_source'])) {
        isset($_COOKIE['utm_source']) ? $utm['utm_source'] = $_COOKIE['utm_source'] : null;
        isset($_COOKIE['utm_content']) ? $utm['utm_content'] = $_COOKIE['utm_content'] : null;
        isset($_COOKIE['utm_medium']) ? $utm['utm_medium'] = $_COOKIE['utm_medium'] : null;
        isset($_COOKIE['utm_campaign']) ? $utm['utm_campaign'] = $_COOKIE['utm_campaign'] : null;
        isset($_COOKIE['utm_term']) ? $utm['utm_term'] = $_COOKIE['utm_term'] : null;
    }
    if (isset($utm['utm_source']) && !empty($utm['utm_source'])) {
        generateInputs($utm);
    }
}

function setFilterCookie(WP_Query $query )
{
    $path = '/';
    $lifetime = time() + 3600;
    $cookie = [
        "query"         => [json_encode($query->query_vars), true],
        "max_pages"     => [$query->max_num_pages, false],
        "current_page"  => [get_query_var('paged') ? get_query_var('paged') : 1, false],
        "found_posts"    => [$query->found_posts, false],
    ];
    foreach ($cookie as $key => $value){
        setcookie($key, $value[0], $lifetime, $path);
    }

}

function post_set_alternate_links(){
    $languages   = array();

    if ( is_single() ) {
        $languages = get_post_meta( get_the_ID(), '_languages', true );
    }

    if ( is_category() || is_tag() || is_tax() ) {
        $languages = get_term_meta( get_queried_object_id(), '_languages', true );
    }

    $hreflangs = array();
    foreach ( wpm_get_languages() as $code => $language ) {
        if ( $languages && !in_array($code, $languages)) {
            continue;
        }

        if ( wpm_get_default_language() === $code ) {
            $hreflangs['x-default'] = sprintf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\"/>\n", esc_url( wpm_translate_current_url( $code ) ) );
        }

        $hreflangs[ $code ] = sprintf( "<link rel=\"alternate\" hreflang=\"%s\" href=\"%s\"/>\n", esc_attr( wpm_sanitize_lang_slug( $language['locale'] ) ), esc_url( wpm_translate_current_url( $code ) ) );
    }

    $hreflangs = apply_filters( 'wpm_alternate_links', $hreflangs, wpm_get_current_url() );

    echo implode( '', $hreflangs );

}

