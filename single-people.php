<?php

get_header('post');
if (function_exists('get_field')) {
    $contacts = get_field('contacts');
    $description = get_field('description');
}
$practises = get_field('people_practices');
$sectors = get_field('people_sectors');
$recognitions = get_field('recognitions');
global $insights_link;
if (have_posts()):
    while (have_posts()): the_post(); ?>
        <section class="lawyer-ab-sect">
            <div class="article-content">
                <div class="lawyer-ab">
                    <div class="lawyer-ab__wrap lawyer-ab__wrap_left">
                        <div class="lawyer-ab__text-content">
                            <?php content(); ?>
                        </div>
                    </div>
                    <div class="lawyer-ab__wrap lawyer-ab__wrap_right">
                        <div class="lawyer-ab__law">
                            <div class="lawyer-ab__wrap-head-main">
                                <figure class="lawyer-ab__wrap-img">
                                    <?php the_post_thumbnail('people', array('alt'=> get_the_title()));?>
                                </figure>
                                <div class="lawyer-ab__wrap-about">
                                    <div class="lawyer-ab__wrap-name-pos">
                                        <h2 class="lawyer-ab__name">
                                            <a href="#" class="lawyer-ab__name-link">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <p class="lawyer-ab__position">
                                            <?php $items = [];
                                            if(!empty($description)){
                                                foreach ($description as $item) {
                                                    array_push($items, $item['item']);
                                                }
                                            };
                                            echo implode(', ', $items);
                                            ?>
                                        </p>
                                    </div>
                                    <div class="lawyer-ab__wrapper">
                                        <ul class="lawyer-ab__wrap-cont">
                                            <li class="lawyer-ab__item-rec lawyer-ab__item-cont_title">
                                                <?php trans('Contact information'); ?>
                                            </li>
                                            <?php if ($contacts['office_addres']): ?>
                                                <li class="lawyer-ab__item-cont">
                                                    <i>
                                                        <svg class="lawyer-ab__cont-svg" width="11" height="16"
                                                             viewBox="0 0 11 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M10.7401 3.98225C10.6833 3.7688 10.5679 3.54136 10.4825 3.34223C9.46076 0.881778 7.2283 0 5.4257 0C3.01259 0 0.354833 1.62138 0 4.96342V5.64622C0 5.67471 0.00980078 5.93068 0.0237223 6.05872C0.222634 7.65146 1.47687 9.34419 2.41359 10.9369C3.42136 12.6434 4.46708 14.322 5.5031 16C6.14193 14.905 6.77846 13.7956 7.40274 12.7289C7.57288 12.4159 7.77038 12.1031 7.94071 11.8043C8.05424 11.6053 8.27111 11.4064 8.3702 11.2213C9.37793 9.3725 11 7.50943 11 5.67468V4.92094C11 4.72203 10.754 4.02514 10.7401 3.98225ZM5.46987 7.40988C4.76054 7.40988 3.98413 7.05448 3.6009 6.07297C3.5438 5.91673 3.5484 5.60362 3.5484 5.57494V5.13406C3.5484 3.88281 4.60867 3.31381 5.53105 3.31381C6.66661 3.31381 7.54485 4.22415 7.54485 5.36201C7.54485 6.49984 6.60543 7.40988 5.46987 7.40988Z"/>
                                                        </svg>
                                                    </i>
                                                    <span>
                                                    <?= $contacts['office_addres']; ?>
                                                </span>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($contacts['mail_box']): ?>

                                                <li class="lawyer-ab__item-rec">
                                                    <i>
                                                        <svg class="lawyer-ab__cont-svg" width="15" height="11"
                                                             viewBox="0 0 15 11" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M7.49879 7.69996L5.64321 6.03235L0.337891 10.7019C0.530734 10.8856 0.791071 11 1.07819 11H13.9194C14.2054 11 14.4647 10.8856 14.6565 10.7019L9.35437 6.03235L7.49879 7.69996Z"/>
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M14.6615 0.298103C14.4686 0.113301 14.2093 0 13.9211 0H1.07996C0.793906 0 0.53464 0.114401 0.341797 0.300303L7.50055 6.60006L14.6615 0.298103Z"/>
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M0 0.965698V10.1046L5.17783 5.58684L0 0.965698Z"/>
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M9.82227 5.58672L15.0001 10.1045V0.96228L9.82227 5.58672Z"/>
                                                        </svg>
                                                    </i>
                                                    <a href="mailto:<?= $contacts['mail_box'] ?>"
                                                       class="lawyer-ab__links">
                                                            <span>
                                                                <?= $contacts['mail_box']; ?>
                                                            </span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($contacts['phones']): ?>
                                                <li class="lawyer-ab__item-rec">
                                                    <i>
                                                        <svg class="lawyer-ab__cont-svg" width="16" height="16"
                                                             viewBox="0 0 16 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path class="lawyer-ab__cont-path"
                                                                  d="M5.02431 5.29684L1.32845 1.60043C1.80549 1.12357 2.28158 0.645757 2.75957 0.167945C2.98054 -0.0529485 3.33713 -0.0567407 3.55905 0.161309L6.43835 3.0424C6.65838 3.26235 6.65838 3.6245 6.43551 3.84634L5.80483 4.47584L5.21778 5.06268C5.1457 5.13568 5.08027 5.21342 5.02431 5.29684ZM8.06483 11.3179C7.45976 10.7974 6.87935 10.2447 6.31601 9.68248C5.75362 9.1165 5.20261 8.5382 4.68099 7.9305C4.25422 7.43752 4.17076 6.72365 4.39363 6.12259L0.600093 2.32948C-0.282854 3.23675 -0.169996 5.48645 0.797357 7.46312C1.21275 8.31825 1.75143 9.08996 2.30813 9.82374C2.86389 10.5518 3.4737 11.2401 4.11576 11.8867C4.75971 12.5323 5.44444 13.1447 6.1747 13.7003C6.90875 14.2587 7.68263 14.7934 8.53239 15.2077C10.5126 16.1737 12.7641 16.2799 13.6707 15.3963L9.87625 11.6032C9.27497 11.826 8.55989 11.7435 8.06483 11.3179ZM15.8368 12.4375L12.9576 9.55829C12.7366 9.34024 12.3743 9.34024 12.1533 9.56113H12.1514L11.5189 10.1925L10.9356 10.7784C10.8635 10.8505 10.7848 10.914 10.7013 10.9728L14.3963 14.6682C14.8742 14.1895 15.3513 13.7135 15.8302 13.2367C16.0531 13.0158 16.0578 12.6584 15.8368 12.4375Z"/>
                                                        </svg>
                                                    </i>
                                                    <?php foreach ($contacts['phones'] as $item): ?>
                                                        <a href="tel:<?= $item['phone']; ?>" class="lawyer-ab__links">
                                                            <span>
                                                                <?= $item['phone']; ?>
                                                            </span>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="lawyer-ab__btns">
                                            <?php get_template_part('template-parts/people','buttons');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (get_field('people_practices')): ?>
                            <div class="lawyer-ab__pract-sect">
                                <div class="lawyer-ab__ps-wrapper">
                                    <h2 class="lawyer-ab__ps-title"><?php trans('Practices'); ?></h2>
                                    <ul class="lawyer-ab__ps-list scroll-cont">
                                        <?php foreach ($practises as $practice) : ?>
                                            <li class="lawyer-ab__ps-item">
                                                <a href="<?php the_permalink($practice->ID); ?>"><?= wpm_translate_string($practice->post_title); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('people_sectors')): ?>
                            <div class="lawyer-ab__pract-sect">
                                <div class="lawyer-ab__pr-wrapper">
                                    <h2 class="lawyer-ab__ps-title"><?php trans('Sectors'); ?></h2>
                                    <ul class="lawyer-ab__ps-list scroll-cont">
                                        <?php foreach ($sectors as $sector) : ?>
                                            <li class="lawyer-ab__ps-item">
                                                <a href="<?php the_permalink($sector->ID); ?>"><?= wpm_translate_string($sector->post_title); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="rep-cases-sect rep-cases-sect_lawyer">
            <div class="container">
                <ul class="rep-cases__wrap">
                    <?php if (get_field('education')): ?>
                        <li class="rep-cases__item tog-slide">
                            <h3 class="rep-cases__subtitle"><span><?php trans('Education'); ?></span><i></i></h3>
                            <div class="rep-cases__content tog-cont">
                                <?= get_field('education'); ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if ($recognitions): ?>
                        <li class="rep-cases__item tog-slide">
                            <h3 class="rep-cases__subtitle"><span><?php trans('Recognitions'); ?></span><i></i></h3>
                            <div class="rep-cases__content tog-cont">
                                <?php foreach ($recognitions as $recognition): ?>
                                    <p>
                                        <?= $recognition['recognitions']['title']; ?> -
                                        <?= $recognition['recognitions']['description'] ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (get_field('membership')): ?>
                        <li class="rep-cases__item tog-slide">
                            <h3 class="rep-cases__subtitle"><span><?php trans('Membership'); ?></span><i></i></h3>
                            <div class="rep-cases__content tog-cont">
                                <?= get_field('membership'); ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (get_field('languages_1')): ?>
                        <li class="rep-cases__item tog-slide">
                            <h3 class="rep-cases__subtitle"><span><?php trans('Languages'); ?></span><i></i></h3>
                            <div class="rep-cases__content tog-cont">
                                <?= get_field('languages_1'); ?>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </section>
        <?php get_lawyer_publications(); ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

