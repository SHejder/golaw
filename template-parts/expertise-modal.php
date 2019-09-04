<div class="modal-static">
    <div class="modal-ex__wrap-title">
        <h2 class="modal-ex__title"><?php trans('Our expertise'); ?></h2>
    </div>
    <div class="modal-ex__tabs">
        <div class="modal-ex__tabs-title">
            <ul class="modal-ex__wrapper">
                <li class="modal-ex__tab-item">
                    <button class="modal-ex__tab-title ex-tab-2 active" data-id="1">
                        <span><?php trans('Practice Areas'); ?></span></button>
                </li>
                <li class="modal-ex__tab-item">
                    <button class="modal-ex__tab-title ex-tab-2" data-id="2">
                        <span><?php trans('Industry Sectors'); ?></span></button>
                </li>
                <li class="modal-ex__tab-item">
                    <button class="modal-ex__tab-title ex-tab-2" data-id="3">
                        <span><?php trans('All Services'); ?></span></button>
                </li>
            </ul>
        </div>

        <div class="modal-ex__tabs-content">
            <div class="modal-ex__content">
                <div data-id="1" class="modal-ex__wrap-cont cont-tab-2 scroll-cont active">
                    <ul class="modal-ex__tab-cont">
                        <li class="modal-ex__one-side modal-ex__one-side_2">
                            <ul class="modal-ex__side">
                                <?php getExpertiseList('list', 'practice');?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div data-id="2" class="modal-ex__wrap-cont cont-tab-2 scroll-cont">
                    <ul class="modal-ex__tab-cont">
                        <li class="modal-ex__one-side modal-ex__one-side_2">
                            <ul class="modal-ex__side">
                                <?php getExpertiseList('list', 'sector');?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div data-id="3" class="modal-ex__wrap-cont cont-tab-2 scroll-cont">
                    <ul class="modal-ex__tab-cont">
                        <li class="modal-ex__one-side modal-ex__one-side_1">
                            <ul class="modal-ex__side">
                                <?php getExpertiseList('list', array('practice', 'sector'), null, true);?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

