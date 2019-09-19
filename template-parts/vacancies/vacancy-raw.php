<?php
$location = get_the_terms(get_the_ID(),'location');?>
<div data-city="<?= $location[0]->slug;?>" data-id="<?php the_ID();?>" class="jobs__item job-cont active j-open">
    <h3 class="jobs__position"><?php the_title()?></h3>
    <div class="jobs__wrap-item">
        <p class="jobs__city"><?= $location[0]->name;?></p>
        <button class="jobs__btn"></button>
    </div>
</div>

