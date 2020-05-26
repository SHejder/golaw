<?php $data = $this->getExternalData();?>
<div class="lawyer-ab__law">
    <?php for($i = 0; $i <= $data['people_count']; $i++):?>
    <div class="lawyer-ab__wrap-head-main">
        <hr>
        <div class="lawyer-ab__wrap-about" style="width: 100%;">
            <figure class="lawyer-ab__wrap-img" style="width: 100%;">
                <img src="<?= $data['photo_'.$i][0]; ?>" style="width: 150px; height: 150px; float: left" alt="Name img">

                    
                <div class="lawyer-ab__wrap-name-pos" style="padding: 0; margin-left: 30px; float: right;">
                    <h2 class="lawyer-ab__name" style="margin-top: 0; ">
                    <?= wpm_translate_string($data['name_'.$i]); ?>
                    <p class="lawyer-ab__position" style="font-size: 12px; margin-top:10px; width: 100%">
                        <?= $data['description_'.$i]; ?>
                    </p>
                </h2>
                     <!-- <ul class="lawyer-ab__wrap-cont article-law" style="padding-left: 0;"> -->
                        <!-- <li class="lawyer-ab__item-rec lawyer-ab__item-cont_title">
                            <?php trans('Recognition');?>
                        </li>
                        <?= $data['recognitions_'.$i]; ?> -->
                    <!-- </ul> -->
                </div> 
                <div style="clear: both"></div>
            </figure>
        </div>
    </div>
    
    <?php endfor;?>
</div>