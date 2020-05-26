<?php
$args = array(
    'post_type' => 'people',
    'orderby' => 'menu_order',
    'sentence' => 1,
    'order' => 'ASC',
    'posts_per_page' => 9

);
$query = new WP_Query($args);

query_posts($args);
setFilterCookie($query);
get_header(); ?>
  <div id="ajaxContent">
      <?php
      get_template_part('template-parts/people/people', 'filters');
      echo '<section class="search-law-sect res-sect">
            <div class="container">';
      if ($query->have_posts()) {
          echo '<div class="search-law">';
          while ($query->have_posts()) {
              $query->the_post();
              get_template_part('template-parts/people/people', 'list');
          }
          echo '</div>';
          wp_reset_postdata();
      } else {
          echo '<h2 class="not-found">';
          trans("No Lawyers found for the criteria you entered. Please try another search.");
          echo '</h2>';
      }
      echo '</div>
        </section>'; ?>
  </div>
<?php get_footer();
