<?php global $people_link, $contacts_link; ?>
<section class="contact-hero-sect">
    <div class="container">
        <div class="contact-hero">
            <h2 class="contact-hero__title"><?php trans('Need professional help with your case?'); ?></h2>
            <div class="contact-hero__wrap-text">
                <p class="contact-hero__text"><?php the_field('bottom_contact_text','option'); ?></p>
            </div>
            <ul class="contact-hero__list c-drop-down">
                <li class="contact-hero__first-item">
                    <p class="contact-hero__hero opener-c"><span><?php trans('Contact us'); ?></span></p>
                    <ul class="contact-hero__inside">
                        <li class="contact-hero__item">
                            <button class="contact-hero__btns subs">
                                <span><?php trans('Subscribe to newsletters') ?></span></button>
                        </li>
                        <li class="contact-hero__item">
                            <a href="<?= wpm_translate_url($people_link); ?>"
                               class="contact-hero__btns"><span><?php trans('Find a professional') ?></span></a>
                        </li>
                        <li class="contact-hero__item">
                            <a href="<?= get_permalink(305)?>"
                               class="contact-hero__btns"><span><?php trans('Find a job') ?></span></a>
                        </li>
                        <li class="contact-hero__item">
                            <a href="<?= wpm_translate_url($contacts_link) . '#touch'; ?>"
                               class="contact-hero__btns"><span><?php trans('Get in touch') ?></span></a>
                        </li>
                    </ul>
                </li>
                <li class="contact-hero__op op-btn"><span></span></li>
            </ul>
        </div>
        <?php if (is_front_page() || is_home()): ?>
            <div class="seo-text tg-sl">
                <div class="seo-text__wrap">
                    <h2 class="seo-text__title"><?php trans('More details');?><span> </span></h2>
                </div>
                <div class="seo-text__content tg-sl-cont">
                    <?php if(get_the_content()){
                        the_content();
                    } else {
                        echo '<h2>'.trans('Sorry...Page under construction', false).'</h2>';
                    };?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

