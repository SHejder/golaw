<header class="header-inside header-inside_search-bar">
    <?php get_template_part(HEADER_TMP_PATH, 'breadcrumbs');?>
    <div class="container">
        <form action="" id="insights-search" class="search-bar ins-s" method="post">
            <div class="search-bar__main-input">
                <input type="text" id="search-field" name="s" class="search-bar__input s-field" placeholder="<?php trans('Search for a topic by keywords')?>"
                       value="<?= isset($query)? esc_attr( $query ): ''; ?>">
                <button type="submit" class="search-bar__submit">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M23.7061 22.2955L17.9363 16.5257C19.3665 14.782 20.2286 12.5486 20.2286 10.1143C20.2286 4.53061 15.698 0 10.1143 0C4.52571 0 0 4.53061 0 10.1143C0 15.698 4.52571 20.2286 10.1143 20.2286C12.5486 20.2286 14.7771 19.3714 16.5208 17.9412L22.2906 23.7061C22.6824 24.098 23.3143 24.098 23.7061 23.7061C24.098 23.3192 24.098 22.6824 23.7061 22.2955ZM10.1143 18.2155C5.64245 18.2155 2.00816 14.5812 2.00816 10.1143C2.00816 5.64735 5.64245 2.00816 10.1143 2.00816C14.5812 2.00816 18.2204 5.64735 18.2204 10.1143C18.2204 14.5812 14.5812 18.2155 10.1143 18.2155Z"
                                        fill="black"/>
                            </svg>
                        </span>
                </button>

            </div>
            <div class="search-bar__wrapper">
                <div class="search-bar__wrap-select search-bar__wrap-select_ins">
                    <i></i>
                    <?php show_categories('select') ?>
                </div>
                <div class="search-bar__wrap-select search-bar__wrap-select_ins">
                    <i></i>
                    <?php show_topics(); ?>
                </div>
            </div>
        </form>
        <script>
            let session_cat = <?= isset($_SESSION['insights']['cat']) ? $_SESSION['insights']['cat'] : '0';?>,
                session_topic = <?= isset($_SESSION['insights']['tag_id']) ? $_SESSION['insights']['tag_id'] : '0'?>;
            if(session_cat !== undefined || session_topic !== undefined){
                $('#search_topic').val(session_topic);
                $('#search_category').val(session_cat);
            }
        </script>
    </div>
</header>



