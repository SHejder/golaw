<?php
$location = get_the_terms(get_the_ID(),'location');?>
<li  data-id="<?php the_ID();?>" class="modal-job__item ch-cont">
    <h2 class="modal-job__position"><?php the_title()?></h2>
    <div class="modal-job__wrap-city">
        <p class="modal-job__city"><?= $location[0]->name;?></p>
    </div>
</li>

