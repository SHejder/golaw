<?php
/*
Template Name: Contacts
Template Post Type: page
*/
get_header('contacts');
if (function_exists('get_field')){
    $contacts = get_field('contacts');
};
?>

<section class="contact-map-sect">
    <div class="contact-map">
        <div class="contact-map__block">
        <?php $count = 1; foreach ($contacts as $contact):?>
            <ul data-id="<?= $count;?>" class="contact-map__info map-cont <?= ($count === 1)?'active':'';?>">
                        <li class="contact-map__info-wrap">
                            <h2 class="contact-map__city"><?= $contact['location']->name;?></h2>
                            <ul class="contact-map__wrapper">
                                <?php if ($contact['contacts']['address']):?>
                                    <li class="contact-map__item">
                                        <i>
                                            <svg width="11" height="16" viewBox="0 0 11 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.7401 3.98225C10.6833 3.7688 10.5679 3.54136 10.4825 3.34223C9.46076 0.881778 7.2283 0 5.4257 0C3.01259 0 0.354833 1.62138 0 4.96342V5.64622C0 5.67471 0.00980077 5.93068 0.0237223 6.05872C0.222634 7.65146 1.47687 9.34419 2.41359 10.9369C3.42136 12.6434 4.46708 14.322 5.5031 16C6.14193 14.905 6.77846 13.7956 7.40274 12.7289C7.57288 12.4159 7.77038 12.1031 7.94071 11.8043C8.05423 11.6053 8.27111 11.4064 8.3702 11.2213C9.37793 9.37249 11 7.50943 11 5.67468V4.92094C11 4.72203 10.754 4.02514 10.7401 3.98225ZM5.46987 7.40988C4.76054 7.40988 3.98413 7.05448 3.6009 6.07297C3.5438 5.91673 3.5484 5.60362 3.5484 5.57494V5.13406C3.5484 3.88281 4.60867 3.31381 5.53105 3.31381C6.66661 3.31381 7.54485 4.22416 7.54485 5.36201C7.54485 6.49984 6.60543 7.40988 5.46987 7.40988Z"
                                                    fill="#002E5D" />
                                            </svg>
                                        </i>
                                        <span>
                                            <?= $contact['contacts']['address'];?>
                                        </span>
                                    </li>
                                <?php endif;?>
                                <?php if ($contact['contacts']['email']):?>
                                    <li class="contact-map__item">
                                        <i>
                                            <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.49879 7.69997L5.64321 6.03235L0.337891 10.7019C0.530734 10.8856 0.791071 11 1.07819 11H13.9194C14.2054 11 14.4647 10.8856 14.6565 10.7019L9.35437 6.03235L7.49879 7.69997Z"
                                                    fill="#002E5D" />
                                                <path
                                                    d="M14.6616 0.298103C14.4688 0.113301 14.2095 0 13.9213 0H1.08012C0.794066 0 0.5348 0.114401 0.341957 0.300303L7.50071 6.60006L14.6616 0.298103Z"
                                                    fill="#002E5D" />
                                                <path d="M0 0.965752V10.1046L5.17783 5.5869L0 0.965752Z" fill="#002E5D" />
                                                <path d="M9.82227 5.58672L15.0001 10.1045V0.962277L9.82227 5.58672Z"
                                                      fill="#002E5D" />
                                            </svg>
                                        </i>
                                        <a href="mailto:<?= $contact['contacts']['email'];?>"><?= $contact['contacts']['email'];?></a>
                                    </li>
                                <?php endif;?>
                                <?php if ($contact['contacts']['phone']):?>
                                    <li class="contact-map__item">
                                        <i>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.02431 5.29684L1.32845 1.60043C1.80549 1.12357 2.28158 0.645757 2.75957 0.167945C2.98054 -0.0529485 3.33713 -0.0567407 3.55905 0.161309L6.43835 3.0424C6.65838 3.26235 6.65838 3.6245 6.43551 3.84634L5.21778 5.06268C5.1457 5.13568 5.08027 5.21342 5.02431 5.29684ZM8.06483 11.3179C7.45976 10.7974 6.87935 10.2447 6.31601 9.68248C5.75362 9.1165 5.20261 8.5382 4.68099 7.9305C4.25422 7.43752 4.17076 6.72365 4.39363 6.12259L0.600093 2.32948C-0.282854 3.23675 -0.169996 5.48645 0.797357 7.46312C1.21275 8.31825 1.75143 9.08996 2.30813 9.82374C2.86389 10.5518 3.4737 11.2401 4.11576 11.8867C4.75971 12.5323 5.44444 13.1447 6.1747 13.7003C6.90875 14.2587 7.68263 14.7934 8.53239 15.2077C10.5126 16.1737 12.7641 16.2799 13.6707 15.3963L9.87625 11.6032C9.27497 11.826 8.55989 11.7435 8.06483 11.3179ZM15.8368 12.4375L12.9576 9.55829C12.7366 9.34024 12.3743 9.34024 12.1533 9.56113H12.1514L11.5189 10.1925L10.9356 10.7784C10.8635 10.8505 10.7848 10.914 10.7013 10.9728L14.3963 14.6682C14.8742 14.1895 15.3513 13.7136 15.8302 13.2367C16.0531 13.0158 16.0578 12.6584 15.8368 12.4375Z"
                                                    fill="#002E5D" />
                                            </svg>
                                        </i>
                                        <a href="tel:<?=$contact['contacts']['phone'];?>"><?=$contact['contacts']['phone'];?></a>
                                    </li>
                                <?php endif;?>
                                <?php if ($contact['contacts']['fax']):?>
                                    <li class="contact-map__item">
                                        <i>
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4 15.0001H12V10.0001H4V15.0001ZM5 11.0001H11V12.0001H5V11.0001ZM5 13.0001H11V14.0001H5V13.0001Z"
                                                    fill="#002E5D" />
                                                <path d="M12.0002 0H4.00022V4.99996H12.0002V0Z" fill="#002E5D" />
                                                <path
                                                    d="M14 2.99979H13V5.99977H3V2.99979H2C1 2.99979 0 3.99979 0 4.99978V9.99974C0 10.9997 1 11.9997 2 11.9997H3V8.99975H13V11.9997H14C15 11.9997 16 10.9997 16 9.99974V4.99978C16 3.99979 15 2.99979 14 2.99979Z"
                                                    fill="#002E5D" />
                                            </svg>
                                        </i>
                                        <span><?= $contact['contacts']['fax'];?></span>
                                    </li>
                                <?php endif;?>
                                <?php if ($contact['map']):?>
                                    <li>
                                        <a href="<?= $contact['map'];?>" class="overview__print" download>
                                                    <span>
                                                        <i>
                                                            <svg class="overview__pr-svg" viewBox="0 0 16 16" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.0054 8.15918L7.5 12.6646L2.99458 8.15918L3.82324 7.33051L6.91406 10.4213V0H8.08594V10.4213L11.1768 7.33051L12.0054 8.15918ZM15 13.8281H0V15H15V13.8281Z"
                                                                    class="overview__pr-path" />
                                                            </svg>
                                                        </i>
                                                        How to find us
                                                    </span>
                                            <svg width="174" height="64" viewBox="0 0 174 64"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect x='0' y='0' fill='none' width='174' height='64' />
                                            </svg>
                                        </a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </li>
                    </ul>
        <?php $count++;?>
        <?php  endforeach;?>
        </div>
        <div class="contact-map__map" id="map"></div>
    </div>
</section>
<section class="touch-sect" id="touch">
    <div class="container">
        <form id="contactForm" action="#" data-type="touch" class="touch ajaxForm" novalidate>
            <h2 class="touch__title"><?php trans('Get in touch');?></h2>
            <div class="touch__wrapper">
                <div class="touch__wrapper-inp wr-inp wr-1">
                        <input type="text" class="touch__input inp inp-name" placeholder="<?php trans('Name...'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a name'); ?></span>
                        </div>
                    </div>
                    <div class="touch__wrapper-inp wr-inp wr-2">
                        <input type="email" class="touch__input inp inp-email" placeholder="<?php trans('Email...'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a valid email address'); ?></span>
                        </div>
                    </div>
                <textarea id="Message" name="message" placeholder="<?php trans('Message...'); ?>"
                          class="touch__input touch__textarea mes-tar"></textarea>
            </div>
            <button class="touch__btn touch-btn">
                        <span>
                            <?php trans('Send');?>
                        </span>
                <span>
                            <?php trans('loading');echo '...'?>
                        </span>
                <span>
                            <svg class="modal-sub__svg" width="19" height="15" viewBox="0 0 19 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.04545 11.8657L1.51136 7.16418L0 8.73134L6.04545 15L19 1.56716L17.4886 0L6.04545 11.8657Z"
                                    fill="black"/>
                            </svg>
                        </span>
                <svg width="240" height="56" viewBox="0 0 240 56" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='240' height='56' />
                </svg>
            </button>
            <?php utmInputs();?>
        </form>
    </div>
</section>
<?php get_footer();

