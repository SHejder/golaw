<?php
global $insights_link, $posts_count;
$args = [
    'posts_per_page' => $posts_count,
    'post_type' => 'post',
    'orderby' => 'date',
    'sentence' => true,
    'post_status' => 'publish',
];
$query = new WP_Query($args);
if ($query->max_num_pages > 1) {
    setFilterCookie($query);
}
get_header();
?>
  <div id="ajaxContent">
      <?php
      get_template_part('template-parts/insights/insights', 'filters');

      if ($query->have_posts()):?>
        <section class="search-ins-sect res-sect">
          <div class="container">
            <div class="search-ins">
                <?php while ($query->have_posts()):$query->the_post(); ?>
                    <?php get_template_part('template-parts/post', 'list'); ?>
                <?php endwhile; ?>
            </div>
              <?php if ($query->max_num_pages > 1) {
                  get_template_part('template-parts/loadmore', 'vars');
              } ?>
          </div>
        </section>
      <?php else: ?>
        <section class="search-ins-sect res-sect">
          <div class="container">
            <h2 class="not-found">
                <?php trans('No results found for the criteria you entered. Please search again.'); ?>
            </h2>
          </div>
        </section>
      <?php endif; ?>
  </div>
  <section class="topics-sect">
    <div class="container">
      <h2 class="topics__title"><?php trans('Trending Tags'); ?></h2>
      <ul class="topics__wrap">
          <?php $tags = get_tags(array(
              'number' => 10,
              'orderby' => 'count',
              'order' => 'DESC',
              'fields' => 'id=>name'
          ));
          foreach ($tags as $id => $name):; ?>
            <li style="padding: 14px; cursor: pointer;" class="topics__item topics__btn"
                data-id="<?= $id; ?>"><?= $name; ?></li>
          <?php endforeach; ?>
      </ul>
    </div>
  </section>
<?php
get_template_part('template-parts/bottom/bottom', 'subscribe');
get_footer();


