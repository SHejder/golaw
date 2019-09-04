<?php
function lang_switcher ($type) {
    if (function_exists('wpm_get_languages')) {
        $languages = wpm_get_languages();
        $current = wpm_get_language();
        if ($type === 'dropdawn') {
            $out = '<span class="nav-lang__cur">'.$current.'</span>'.
                ' <ul class="nav-lang__inside">';
        } elseif ($type === 'column') {
            $out = '<ul class="h-langs">';
        } else {
            $out = '';
        }


        foreach ($languages as $code => $language) {
            if ($code === $current && $type === 'dropdawn') {
                continue;
            }
            $toggle_url = esc_url(wpm_translate_current_url($code));
            if ($type === 'dropdawn') {
                $css_classes = 'nav-lang__link';

                $out .= '<li class="nav-lang__item">'.
                    '<a href="' . $toggle_url . '" class="' . $css_classes . '">';
                $out .= strtoupper(esc_attr($code));
            } elseif ($type === 'column') {
                $css_classes = 'h-langs__item ';

                if ($code === $current) {
                    $css_classes .= 'active-'.esc_attr($code);
                }

                $out .= '<li class="'.$css_classes.'">'.
                    '<a href="' . $toggle_url . '" class="h-langs__link">';
                $out .= '<span>'.esc_attr($code).'</span>';

            } else {
                $css_classes = '';
                $out .= '<li><a href="#">';
            }
            $out .= '</a></li>';
        }

        $out .= '</ul>';

        echo $out;
    }
}
