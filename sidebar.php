<div class="mod-menu">
    <div class="mod-menu__close">
        <button class="nav-burger__btn btn-menu-close">
            <span></span>
            <span></span>
        </button>
    </div>
    <?php sidebar_menu('Sidebar');?>
    <div class="mod-menu__social">
        <?php get_template_part('template-parts/social', 'links') ?>
    </div>
</div>