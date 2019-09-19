<div class="container">
    <div class="expertise__wrap-title">
        <h2 class="expertise__title"><?php trans('Our expertise'); ?></h2>
    </div>
    <div class="expertise__tabs">
        <div class="expertise__tabs-title">
            <ul class="expertise__wrapper">
                <li class="expertise__tab-item">
                    <button class="expertise__tab-title ex-tab active" data-id="1">
                        <span><?php trans('Practice Areas'); ?></span>
                    </button>
                </li>
                <li class="expertise__tab-item">
                    <button class="expertise__tab-title ex-tab" data-id="2">
                        <span><?php trans('Industry Sectors'); ?></span>
                    </button>
                </li>
                <li class="expertise__tab-item">
                    <button class="expertise__tab-title ex-tab" data-id="3"><span><?php trans('All Services'); ?></span></button>
                </li>
            </ul>
        </div>
        <div class="expertise__tabs-content">
            <div class="expertise__content">
                <div data-id="1" class="expertise__wrap-cont cont-tab scroll-cont active">
                    <ul class="expertise__tab-cont">
                        <li class="expertise__one-side expertise__one-side_1">
                            <ul class="expertise__side">
                                <?php getExpertiseList('list', 'practice');?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.expertise__wrap-cont -->
                <div data-id="2" class="expertise__wrap-cont cont-tab scroll-cont">
                    <ul class="expertise__tab-cont">
                        <li class="expertise__one-side expertise__one-side_2">
                            <ul class="expertise__side">
                                <?php getExpertiseList('list', 'sector');?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.expertise__wrap-cont -->
                <div data-id="3" class="expertise__wrap-cont cont-tab scroll-cont">
                    <ul class="expertise__tab-cont">
                        <li class="expertise__one-side expertise__one-side_1">
                            <ul class="expertise__side">
                                <?php getExpertiseList('list', array('practice', 'sector'), null, true);?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

