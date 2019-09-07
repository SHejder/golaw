<?php

use classes\pdf\ArticlePdf;
use classes\pdf\Pdf;
use classes\pdf\ServicePdf;
use Mpdf\Mpdf;

require_once __DIR__ . '/inc/vendor/autoload.php';

include 'inc/env.php';
include 'inc/handlers.php';
include 'inc/lang-switcher.php';
include 'inc/show-selects.php';
include 'inc/loadmore.php';
include 'inc/taxonomy.php';
include 'inc/post-types.php';
include 'inc/modalForm.php';
include 'inc/get-content.php';


//filters
remove_filter('the_excerpt', 'wpautop');
add_filter('excerpt_more', function ($more) { return '...';});
add_filter('excerpt_length', function () { return 25;});
add_filter('wpseo_breadcrumb_single_link', 'cut_wpseo_breadcrumb_last');
add_filter('category_link', function ($slug) { return str_replace('category/', '', $slug);}, 99);
add_filter( 'the_content', 'kama_contents_shortcode', 20 );
add_filter( 'get_the_archive_title', function( $title ){
    return preg_replace('~^[^:]+: ~', '', $title );
});

//actions
//loadmore ajax
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
//modal ajax
add_action('wp_ajax_modalForm', 'modalForm');
add_action('wp_ajax_nopriv_modalForm', 'modalForm');
//post search ajax
add_action('wp_ajax_ajaxSearch', 'posts_search');
add_action('wp_ajax_nopriv_ajaxSearch', 'posts_search');
//people search ajax
add_action('wp_ajax_getLawyers', 'getLawyers');
add_action('wp_ajax_nopriv_getLawyers', 'getLawyers');

add_action('wp_enqueue_scripts', 'ajax_data', 99);
add_action('template_redirect', 'bs_change_search_url');
add_action('init', 'customPostTypes');
add_action('init', 'customTaxonomies');
add_action('init', 'start_session', 1);
add_action('wp_logout', 'end_session');
add_action('wp_login', 'end_session');
add_action('end_session_action', 'end_session');
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('main.css', get_template_directory_uri() . '/css/main.css', array(), '5.1');
    wp_deregister_script('jquery-core');
    wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('swiper.min.js', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.3', true);
    wp_enqueue_script('simplebar.min.js', get_template_directory_uri() . '/js/simplebar.min.js', array(), '1.0.3', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '7.1', true);
    wp_enqueue_script('function', get_template_directory_uri() . '/js/function.js', 'main', '6.1', true);
});
add_action('save_post_people', 'convertPdf', 10, 3);
add_action('init', 'utmCookie');


//theme configuration
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header',array(
        'default-image' => get_template_directory_uri().'/img/hero-bg.jpg',
        'uploads' => true,
        'flex-width'    => true,
        'height' => 1035,
        'width' => 1920,
    ));

}

//shortcodes
add_shortcode('block','blockWrapper');
add_shortcode('slider','contentSlider');


add_action( 'save_post_people', 'savePDF', 10, 3 );
if(function_exists('add_image_size')){
    add_image_size('post', 384, 256, true);
    add_image_size('people', 280, 268);
}


if(isset($_POST['get_pdf'])&& !empty($_POST['get_pdf'])){
    $pdf = new Pdf(new Mpdf());
    if($_POST['get_pdf'] === 'article'){
        $pdf->setStrategy(new ArticlePdf());
    } else if($_POST['get_pdf'] === 'service'){
        $pdf->setStrategy(new ServicePdf());
    }
    $pdf->savePDF(get_post($_POST['post_id']));

}
