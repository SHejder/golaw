<?php global $wp_query; ?>
<script>
    var true_posts = '<?= json_encode($wp_query->query_vars); ?>',
        current_page = <?= (get_query_var('paged')) ? get_query_var('paged') : 1; ?>,
        max_pages = '<?= $wp_query->max_num_pages; ?>';
</script>
<button  class="achivs__more s-more">
    <span>+ <?php trans('more');?></span>
    <span>- <?php trans('less');?></span>
    <svg width="242" height="64" viewBox="0 0 242 64" xmlns="http://www.w3.org/2000/svg">
        <rect x='0' y='0' fill='none' width='242' height='64' />
    </svg>
</button>

