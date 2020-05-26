<?php $data = $this->getExternalData();?>
<div class="lawyer-ab__text-content">
    <h2 style="margin-bottom: 20px;"><?php trans('Speakers');?></h2>
</div>
<div class="lawyer-ab__law" style="margin-top: 0;">
    <?php for($i = 0; $i <= $data['people_count']; $i++):?>
    <div class="lawyer-ab__wrap-head-main">
        <figure class="lawyer-ab__wrap-img">
            <img src="<?= $data['photo_'.$i][0]; ?>" style="width: 150px; height: 150px; float: left" alt="Name img">
                <div class="lawyer-ab__wrap-name-pos" style="padding: 0; margin-left: 30px;">
                    <h2 class="lawyer-ab__name" style="margin-top: 0; ">
                    <?= wpm_translate_string($data['name_'.$i]); ?>
                    <p class="lawyer-ab__position" style="font-size: 12px; margin-top:10px; ">
                        <?= $data['description_'.$i]; ?>
                    </p>
                </h2>
        </figure>
        <!-- <div class="lawyer-ab__wrap-about">
            <div class="lawyer-ab__wrap-name-pos" style="padding: 0; width: 350px;">
                <h2 class="lawyer-ab__name"  style="text-transform: capitalize;">
                    <a href="#" class="lawyer-ab__name-link" style="text-transform: capitalize;">
                        <?= wpm_translate_string($data['name_'.$i]); ?>
                    </a>
                </h2>
                <p class="lawyer-ab__position">
                    <?= $data['description_'.$i]; ?>
                </p>
            </div>
        </div> -->
    </div>
    <hr>
    <?php endfor;?>

    <div class="lawyer-ab__wrapper" style="padding: 0; margin: 0;">
                <ul class="lawyer-ab__wrap-cont" style="padding: 0; margin: 0;">
                    <li class="lawyer-ab__item-rec lawyer-ab__item-cont_title" style="font-weight: bold; margin-bottom:15px;">
                        <?php trans('Registration') ?>
                    </li>
                    <li style="margin-left: 0;" class="lawyer-ab__item-cont">
                        <i>
                            <svg class="lawyer-ab__cont-svg" width="11" height="16" viewBox="0 0 11 16"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="lawyer-ab__cont-path"
                                      d="M10.7401 3.98225C10.6833 3.7688 10.5679 3.54136 10.4825 3.34223C9.46076 0.881778 7.2283 0 5.4257 0C3.01259 0 0.354833 1.62138 0 4.96342V5.64622C0 5.67471 0.00980078 5.93068 0.0237223 6.05872C0.222634 7.65146 1.47687 9.34419 2.41359 10.9369C3.42136 12.6434 4.46708 14.322 5.5031 16C6.14193 14.905 6.77846 13.7956 7.40274 12.7289C7.57288 12.4159 7.77038 12.1031 7.94071 11.8043C8.05424 11.6053 8.27111 11.4064 8.3702 11.2213C9.37793 9.3725 11 7.50943 11 5.67468V4.92094C11 4.72203 10.754 4.02514 10.7401 3.98225ZM5.46987 7.40988C4.76054 7.40988 3.98413 7.05448 3.6009 6.07297C3.5438 5.91673 3.5484 5.60362 3.5484 5.57494V5.13406C3.5484 3.88281 4.60867 3.31381 5.53105 3.31381C6.66661 3.31381 7.54485 4.22415 7.54485 5.36201C7.54485 6.49984 6.60543 7.40988 5.46987 7.40988Z" fill="#C8102E"/>
                            </svg>
                        </i>
                        <span>
                                    <?= wpm_translate_string($data['location']); ?>
                                </span>
                    </li>
                    <li style="margin-left: 0;" class="lawyer-ab__item-rec">
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M9.625 1.375H9.16669V0.458305C9.16669 0.20536 8.96133 0 8.70831 0H8.25C7.99697 0 7.79169 0.20536 7.79169 0.458305V1.375H3.20831V0.458305C3.20831 0.20536 3.00303 0 2.75 0H2.29169C2.03867 0 1.83331 0.20536 1.83331 0.458305V1.375H1.375C0.61692 1.375 0 1.99192 0 2.75V9.625C0 10.3831 0.61692 11 1.375 11H9.625C10.3831 11 11 10.3831 11 9.625V2.75C11 1.99192 10.3831 1.375 9.625 1.375ZM10.0833 9.625C10.0833 9.87753 9.87753 10.0833 9.625 10.0833H1.375C1.12247 10.0833 0.916695 9.87753 0.916695 9.625V4.60168H10.0833V9.625Z"
                                        fill="#C8102E"/>
                            </svg>
                        </i>
                        <span><?= $data['event_date']; ?></span>
                    </li>
                    <li style="margin-left: 0;" class="lawyer-ab__item-rec">
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M5.49991 0C2.46243 0 0 2.4625 0 5.49991C0 8.53732 2.46243 11 5.49991 11C8.53739 11 11 8.53732 11 5.49991C11 2.4625 8.53739 0 5.49991 0ZM7.87767 6.54599H5.54593C5.53804 6.54599 5.53071 6.54408 5.5229 6.54379C5.51509 6.54416 5.50779 6.54599 5.49987 6.54599C5.2898 6.54599 5.11949 6.37567 5.11949 6.1656V2.2825C5.11949 2.07243 5.2898 1.90212 5.49987 1.90212C5.70994 1.90212 5.88026 2.07243 5.88026 2.2825V5.78522H7.87752C8.08759 5.78522 8.25791 5.95554 8.25791 6.1656C8.25791 6.37567 8.08774 6.54599 7.87767 6.54599Z"
                                        fill="#C8102E"/>
                            </svg>
                        </i>
                        <span><?= $data['event_start']; ?>-<?= $data['event_end']; ?> GMT</span>
                    </li>
                </ul>
            </div>
    <div style="clear: both"></div>
</div>
