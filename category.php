<?php
global $wp_query;
get_header('post');?>
        <section class="search-ins-sect">
            <div class="container">
                <div class="search-ins" >
                    <?php while (have_posts()):the_post();?>
                        <?php get_template_part('template-parts/post', 'list');?>
                    <?php endwhile;?>
                </div>
                <?php if ( $wp_query->max_num_pages > 1 ) {
                    get_template_part('template-parts/loadmore', 'vars');
                }; ?>
            </div>
        </section>
<?php
get_footer();