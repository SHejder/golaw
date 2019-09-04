<?php $data = $this->getExternalData();?>
<div class="lawyer-ab__law">
    <?php for($i = 0; $i <= $data['people_count']; $i++):?>
    <div class="lawyer-ab__wrap-head-main">
        
        <div class="lawyer-ab__wrap-about">
            <figure class="lawyer-ab__wrap-img">
                <img src="<?= $data['photo_'.$i][0]; ?>" style="width: 268px; height: 268px" alt="Name img">
            </figure>
            <div class="lawyer-ab__wrap-name-pos" style="padding: 0; width: 350px;">
                <h2 class="lawyer-ab__name">
                    <a href="#" class="lawyer-ab__name-link" style="text-transform: capitalize;">
                        <?= wpm_translate_string($data['name_'.$i]); ?>
                    </a>
                </h2>
                <p class="lawyer-ab__position">
                    <?= $data['description_'.$i]; ?>
                </p>
            </div>
            <div class="lawyer-ab__wrapper">
                <ul class="lawyer-ab__wrap-cont article-law">
                    <li class="lawyer-ab__item-rec lawyer-ab__item-cont_title">
                        <?php trans('Recognition');?>
                    </li>
                    <?= $data['recognitions_'.$i]; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endfor;?>
    <div style="clear: both"></div>
</div>