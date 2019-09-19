<?php
/*
Template Name: Expertise
Template Post Type: expertise
*/
has_term('', 'practice') ? $taxonomy = 'practice' : $taxonomy = 'sector';
if (function_exists('get_field')) {
    $cases = get_field('expertise_cases');
    $lawyers = get_field('expertise_lawyers');
    $related_tax = get_field('related_taxonomies');
    $testimonials = get_field('expertise_testimonials');
}
global $people_link;
get_header('post');
global $wp_query; ?>
    <section class="service-sect">
        <div class="container">
            <h2 class="service-sect__title">
                <?php if(function_exists('trans')) trans('Services'); ?>
            </h2>
                <?php if(function_exists('getExpertiseList')) getExpertiseList('raw', null, null, true, get_the_ID()); ?>
        </div>
    </section>
    <section class="overview-sect">
        <div class="article-content">
            <div class="overview">
                <div class="overview__wrap_left">
                    <h2 class="overview-sect__title">
                        Overview
                    </h2>
                    <div class="overview__content-text">
                        <p class="overview__intro">
                            <?php if (function_exists('get_field')) the_field('expertise_intro') ?>
                        </p>
                        <div class="overview__wysiwyg">
                            <?php if (get_the_content()) {
                                the_content();
                            } else {
                                echo '<h2>' . trans('Sorry...Page under construction', false) . '</h2>';
                            }; ?>
                        </div>
                    </div>
                </div>
                <?php if (function_exists('getLawyerSidebar') && get_field('expertise_head')):; ?>
                    <div class="overview__wrap_right">
                        <div class="overview__head">
                            <?php if(function_exists('getLawyerSidebar')) getLawyerSidebar(array(get_field('expertise_head')), 'publication'); ?>
                        </div>
                        <?php if (!empty($related_tax)): ?>
                            <div class="overview__tags">
                                <h3 class="overview__tag-title"><?php trans('Related ' . (($taxonomy === 'sector') ? 'industrial ' : '') . $taxonomy . 's') ?></h3>
                                <ul class="overview__wrap-tag">
                                    <?php foreach ($related_tax as $tax) : ?>
                                        <li class="overview__tag-item"><a
                                                    href="<?php the_permalink($tax->ID); ?>"><?= wpm_translate_string($tax->post_title); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="overview__print-share">
                            <form action="<?= get_permalink(get_the_ID()); ?>" method="post">
                                <button type="submit" class="overview__print">
                                        <span>
                                            <i>
                                                <svg class="overview__pr-svg" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M12.0054 8.15918L7.5 12.6646L2.99458 8.15918L3.82324 7.33051L6.91406 10.4213V0H8.08594V10.4213L11.1768 7.33051L12.0054 8.15918ZM15 13.8281H0V15H15V13.8281Z"
                                                            class="overview__pr-path"/>
                                                </svg>
                                            </i>
                                            Printable PDF
                                        </span>
                                    <svg width="174" height="64" viewBox="0 0 174 64"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect x='0' y='0' fill='none' width='174' height='64'/>
                                    </svg>
                                </button>
                                <input type="hidden" name="post_id" value="<?php the_ID(); ?>">
                                <input type="hidden" name="get_pdf" value="service">
                            </form>
                            <ul class="overview__share">
                                <li class="overview__sh-main">
                                    <div class="overview__sh-btn">
                                        <i>
                                            <svg class="overview__sh-svg overview__sh-svg_share" viewBox="0 0 13 14"
                                                 fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path class="overview__sh-path"
                                                      d="M10.2308 8.61539C9.27769 8.61539 8.44523 9.11347 7.96708 9.86031L5.08415 8.21262C5.26991 7.84646 5.38461 7.43884 5.38461 7C5.38461 6.72914 5.33237 6.47286 5.25807 6.22622L8.25785 4.51229C8.74947 5.04538 9.44837 5.38461 10.2308 5.38461C11.7175 5.38461 12.9231 4.17899 12.9231 2.69231C12.9231 1.20563 11.7175 0 10.2308 0C8.74409 0 7.53846 1.20563 7.53846 2.69231C7.53846 2.96316 7.5907 3.21945 7.66499 3.46609L4.66523 5.18055C4.1736 4.64692 3.47468 4.30769 2.69231 4.30769C1.20563 4.30769 0 5.51277 0 7C0 8.48668 1.20563 9.69231 2.69231 9.69231C3.30615 9.69231 3.86508 9.47908 4.31791 9.13286L7.56754 11.0164C7.55732 11.1138 7.53846 11.2081 7.53846 11.3077C7.53846 12.7944 8.74409 14 10.2308 14C11.7175 14 12.9231 12.7944 12.9231 11.3077C12.9231 9.82101 11.7175 8.61539 10.2308 8.61539Z"/>
                                            </svg>
                                        </i>
                                        <span>
                                                    Share
                                                </span>
                                    </div>
                                    <ul class="overview__sh-wrapper">
                                        <li class="overview__sh-item">
                                            <?php
                                            $title = get_the_title();
                                            $summary = get_the_excerpt();
                                            $url = get_permalink();
                                            ?>
                                            <a title="Share to Facebook" target="_parent"
                                               href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"
                                               class="overview__sh-link sh-link">
                                                <i>
                                                    <svg class="overview__sh-svg overview__sh-svg_fb"
                                                         viewBox="0 0 7 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="overview__sh-path"
                                                              d="M1.45673 14H4.44935L4.44935 6.99618H6.45774C6.45774 6.99618 6.64581 5.86597 6.73752 4.63021H4.46099V3.0184C4.46099 2.7776 4.78698 2.45417 5.1101 2.45417H6.74074V0L4.52296 0C1.38311 0 1.45673 2.3592 1.45673 2.71146L1.45673 4.63837H0L0 6.99531H1.45673L1.45673 14Z"/>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                        <li class="overview__sh-item">
                                            <a title="Share to Twitter"
                                               href="http://twitter.com/share?text=<?php echo $title; ?>&via=twitterfeed&related=truemisha&url=<?php echo $url; ?>"
                                               class="overview__sh-link sh-link">
                                                <i>
                                                    <svg class="overview__sh-svg overview__sh-svg_tw"
                                                         viewBox="0 0 15 12" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="overview__sh-path"
                                                              d="M0 10.6388C1.33703 11.4985 2.92518 12 4.63168 12C10.1893 12 13.2282 7.38395 13.2282 3.38041C13.2282 3.24931 13.2253 3.11856 13.2197 2.98856C13.8101 2.56154 14.3222 2.02795 14.7273 1.42039C14.1854 1.66137 13.6032 1.82434 12.9919 1.89758C13.6158 1.52257 14.0948 0.928922 14.3204 0.221564C13.7365 0.56856 13.09 0.820887 12.4018 0.956572C11.8507 0.36787 11.0654 0 10.1962 0C8.52772 0 7.1748 1.35649 7.1748 3.02939C7.1748 3.2667 7.20164 3.49797 7.25315 3.71972C4.74217 3.59337 2.51573 2.3874 1.02547 0.55446C0.765402 1.00198 0.616376 1.5222 0.616376 2.07758C0.616376 3.12845 1.14965 4.05573 1.96053 4.59902C1.46506 4.58327 0.999168 4.44685 0.591903 4.21998C0.591721 4.2328 0.591721 4.24543 0.591721 4.25825C0.591721 5.72588 1.63326 6.95035 3.0154 7.22868C2.76191 7.29771 2.49491 7.33506 2.21932 7.33506C2.02463 7.33506 1.83543 7.31602 1.65079 7.2805C2.03523 8.48409 3.15128 9.35991 4.47334 9.38426C3.43929 10.1969 2.1364 10.6812 0.72084 10.6812C0.476847 10.6812 0.236323 10.667 0 10.6388Z"/>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                        <li class="overview__sh-item">
                                            <a title="Share to Linkedin"
                                               href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo urlencode($title); ?>&source=<?php echo get_home_url(); ?>"
                                               class="overview__sh-link sh-link">
                                                <i>
                                                    <svg class="overview__sh-svg overview__sh-svg_in"
                                                         viewBox="0 0 15 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path class="overview__sh-path"
                                                              d="M0.185369 4.55382L3.30106 4.55382L3.30106 14H0.185369L0.185369 4.55382Z"/>
                                                        <path class="overview__sh-path"
                                                              d="M1.72262 3.26464H1.74318C2.83011 3.26464 3.506 2.539 3.506 1.63205C3.48545 0.705107 2.83011 0 1.76355 0C0.697162 0 0 0.705107 0 1.63205C0 2.539 0.677511 3.26464 1.72262 3.26464Z"/>
                                                        <path class="overview__sh-path"
                                                              d="M8.14159 13.9998V8.72411C8.14159 8.44105 8.16304 8.16053 8.24507 7.95868C8.47061 7.39365 8.98244 6.81027 9.84384 6.81027C10.9717 6.81027 11.4221 7.67671 11.4221 8.94594V13.9996H14.5385V8.58276C14.5385 5.68148 13.0012 4.33177 10.9504 4.33177C9.29487 4.33177 8.5557 5.24999 8.14159 5.89205V5.92294H8.12121C8.12662 5.91276 8.13546 5.90241 8.14159 5.89205L8.14159 4.5536H5.02464C5.06647 5.43966 5.02464 13.9996 5.02464 13.9996L8.14159 13.9998Z"/>
                                                    </svg>
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php if ($cases): ?>
    <section class="rep-cases-sect">
        <div class="container">
            <h2 class="rep-cases__title">
                <?php if(function_exists('trans')) trans('Representative cases'); ?>
            </h2>
            <ul class="rep-cases__wrap">
                <?php foreach ($cases as $case) : ?>
                    <li class="rep-cases__item tog-slide">
                        <h3 class="rep-cases__subtitle"><span><?= $case['case_title'] ?></span><i></i></h3>
                        <div class="rep-cases__content tog-cont">
                            <?= $case['text'] ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>
<?php if ($lawyers): ?>
    <section class="key-law-sect key-law_single-practice">
        <div class="container">
            <h2 class="key-law__title">
                <?php if(function_exists('trans')) trans('Key lawyers') ?>
            </h2>
            <div class="layers">
                <?php if(function_exists('getHomeLawyers')) getHomeLawyers($lawyers); ?>
            </div>
            <a href="<?= wpm_translate_url($people_link); ?>" class="key-law__btn">
                <span><?php if(function_exists('trans')) trans('find a professional'); ?></span>
                <svg width="292" height="64" viewBox="0 0 292 64" xmlns="http://www.w3.org/2000/svg">
                    <rect x='0' y='0' fill='none' width='292' height='64'/>
                </svg>
            </a>
        </div>
    </section>
<?php endif; ?>
<?php if(function_exists('getTestimonials')) getTestimonials($testimonials); ?>
    <section class="home-insights home-insights_single-practice">
        <?php get_template_part('template-parts/insights/insights', 'home'); ?>
    </section>
<?php get_template_part('template-parts/bottom/bottom', 'contacts');
get_footer();
