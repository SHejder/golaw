<?php
function getExpertiseList( string $type,  $taxonomy, array $exclude = null, bool $child = false){
    $args =[
        'post_type' => 'expertise',
    ];
    if (is_string($taxonomy)) {
        $args['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'operator' => 'EXISTS'
            ]
        ];
    }
    if (is_array($taxonomy)){
        $args['tax_query'] = [
            'relation' => 'OR',
        ];
        foreach ($taxonomy as $item){
            $term = [
                'taxonomy' => $item,
                'operator' => 'EXISTS'
            ];
            array_push($args['tax_query'],$term);
            unset($term);
        }
    }

    if($exclude){
        $args['post__not_in'] = $exclude;
    }

    $services = new WP_Query($args);
    if ($services->have_posts()){
        while ($services->have_posts()){
            $services->the_post();
            if (!$child){
                if (get_post_ancestors(get_the_ID()) === array()){
                    get_template_part('template-parts/expertise', $type);
                }
            } else {
                if (get_post_ancestors(get_the_ID()) !== array()){
                    get_template_part('template-parts/expertise', $type);
                }
            }
            continue;
        }
        wp_reset_postdata();
    }
}

