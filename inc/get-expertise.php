<?php
function getExpertiseList( string $type, $taxonomy = null, array $exclude = null,
                           bool $child = false, int $parent_id = null){
    $args =[
        'post_type' => 'expertise',
        'posts_per_page' => -1,
    ];
    if (!empty($taxonomy)){
        if (is_string($taxonomy)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => $taxonomy,
                    'operator' => 'EXISTS'
                ]
            ];
        } elseif (is_array($taxonomy)){
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

    }

    if(!empty($parent_id) && $child){
        $args['post_parent'] = $parent_id;
    }

    if(!empty($exclude)){
        $args['post__not_in'] = $exclude;
    }
    $services = new WP_Query($args);
    if ($services->have_posts()){
        if ($type === 'raw') echo '<div class="service op-cont">';
            while ($services->have_posts()){
                $services->the_post();
                if (!$child){
                    if (get_post_ancestors(get_the_ID()) === array()){
                        get_template_part('template-parts/expertise/expertise', $type);
                    }
                } else {
                    if (get_post_ancestors(get_the_ID()) !== array()){
                        get_template_part('template-parts/expertise/expertise', $type);
                    }
                }
                continue;
            }
            wp_reset_postdata();
        if ($type === 'raw') {
            echo '</div>';
            if ($services->found_posts > 3){
                echo '<button class="service__more ach-m">
                    <span>+ More</span>
                    <span>- Less</span>
                    <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0" y="0" fill="none" width="242" height="64"/>
                    </svg>
                </button>';
            }
        }

    }
}

