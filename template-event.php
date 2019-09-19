<?php
/*
Template Name: Event
Template Post Type: post

 */
global $insights_link;
get_header('post');
$category = get_the_category();
if (function_exists('get_field')){
    $topics = get_field('related_topics');
}
if (have_posts()):
    while (have_posts()):the_post(); ?>
        <section class="article-sect">
            <div class="article-content">
                <div class="article">
                    <div class="article__wrap_left">
                        <div class="article__date-topic article__date-topic_event">
                            <div class="article__wrap-date">
                                <span class="article__date"><?= get_the_date('d F Y'); ?></span>
                                <span class="article__type">- <?= $category[0]->name ?></span>
                            </div>
                        </div>
                        <?php if (function_exists('the_field')): ?>
                            <?php if (get_field('event_intro')): ?>
                                <div class="article__block-intro bl-num">
                                    <?php the_field('event_intro'); ?>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <span>ACF not working! Please check the plugin exist!</span>
                        <?php endif; ?>
                        <div class="article__block-text bl-num">
                            <?php content(); ?>
                        </div>
                    </div>
                    <div class="article__wrap_right">
                        <div class="event">
                            <h2 class="event__title"><?php trans('Registration'); ?></h2>
                            <?php if (function_exists('the_field')): ?>
                                <ul class="event__wrap">
                                    <?php if (get_field('event_location')): ?>
                                        <li class="event__item">
                                            <i>
                                                <svg width="11" height="16" viewBox="0 0 11 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M10.7401 3.98225C10.6833 3.7688 10.5679 3.54136 10.4825 3.34223C9.46076 0.881778 7.2283 0 5.4257 0C3.01259 0 0.354833 1.62138 0 4.96342V5.64622C0 5.67471 0.00980077 5.93068 0.0237223 6.05872C0.222634 7.65146 1.47687 9.34419 2.41359 10.9369C3.42136 12.6434 4.46708 14.322 5.5031 16C6.14193 14.905 6.77846 13.7956 7.40274 12.7289C7.57288 12.4159 7.77038 12.1031 7.94071 11.8043C8.05423 11.6053 8.27111 11.4064 8.3702 11.2213C9.37793 9.37249 11 7.50943 11 5.67468V4.92094C11 4.72203 10.754 4.02514 10.7401 3.98225ZM5.46987 7.40988C4.76054 7.40988 3.98413 7.05448 3.6009 6.07297C3.5438 5.91673 3.5484 5.60362 3.5484 5.57494V5.13406C3.5484 3.88281 4.60867 3.31381 5.53105 3.31381C6.66661 3.31381 7.54485 4.22416 7.54485 5.36201C7.54485 6.49984 6.60543 7.40988 5.46987 7.40988Z"
                                                            fill="#002E5D"/>
                                                </svg>
                                            </i>
                                            <a href="<?php the_field('locat_link');?>" target="_blank">
                                                <span><?php the_field('event_location'); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (get_field('event_date')): ?>
                                        <li class="event__item">
                                            <i>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M9.625 1.375H9.16669V0.458305C9.16669 0.20536 8.96133 0 8.70831 0H8.25C7.99697 0 7.79169 0.20536 7.79169 0.458305V1.375H3.20831V0.458305C3.20831 0.20536 3.00303 0 2.75 0H2.29169C2.03867 0 1.83331 0.20536 1.83331 0.458305V1.375H1.375C0.61692 1.375 0 1.99192 0 2.75V9.625C0 10.3831 0.61692 11 1.375 11H9.625C10.3831 11 11 10.3831 11 9.625V2.75C11 1.99192 10.3831 1.375 9.625 1.375ZM10.0833 9.625C10.0833 9.87753 9.87753 10.0833 9.625 10.0833H1.375C1.12247 10.0833 0.916695 9.87753 0.916695 9.625V4.60168H10.0833V9.625Z"
                                                            fill="#002E5D"/>
                                                </svg>
                                            </i>
                                            <span><?php the_field('event_date'); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (get_field('event_start_time') || get_field('event_end_time')): ?>
                                        <li class="event__item">
                                            <i>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M5.49991 0C2.46243 0 0 2.4625 0 5.49991C0 8.53732 2.46243 11 5.49991 11C8.53739 11 11 8.53732 11 5.49991C11 2.4625 8.53739 0 5.49991 0ZM7.87767 6.54599H5.54593C5.53804 6.54599 5.53071 6.54408 5.5229 6.54379C5.51509 6.54416 5.50779 6.54599 5.49987 6.54599C5.2898 6.54599 5.11949 6.37567 5.11949 6.1656V2.2825C5.11949 2.07243 5.2898 1.90212 5.49987 1.90212C5.70994 1.90212 5.88026 2.07243 5.88026 2.2825V5.78522H7.87752C8.08759 5.78522 8.25791 5.95554 8.25791 6.1656C8.25791 6.37567 8.08774 6.54599 7.87767 6.54599Z"
                                                            fill="#002E5D"/>
                                                </svg>
                                            </i>
                                            <span><?php the_field('event_start_time'); ?>-<?php the_field('event_end_time'); ?> GMT</span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php else: ?>
                                <span>ACF not working! Please check the plugin exist!</span>
                            <?php endif; ?>
                            <a href="<?php the_field('registration_link'); ?>"
                               class="event__btn<?= get_field('is_actual') ? '' : ' disabled' ?>"><?php trans('Register now'); ?></a>
                        </div>
                        <?php if (function_exists('getLawyerSidebar') && get_field('event_speakers')): ?>
                            <div class="overview__head event_speaker">
                                <h2 class="event__title"><?php trans('Speakers') ?></h2>
                                <?php getLawyerSidebar(get_field('event_speakers'), 'event'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($topics): ?>
                            <div class="overview__tags">
                                <h3 class="overview__tag-title"><?php trans('Related tags'); ?></h3>
                                <ul class="overview__wrap-tag">
                                    <?php foreach ($topics as $topic):; ?>
                                        <li class="overview__tag-item">
                                            <a href="<?= wpm_translate_url($insights_link) . '?t=' . $topic->term_id; ?>">
                                                <?= $topic->name; ?>
                                            </a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="overview__print-share">
                            <form action="<?= get_permalink(get_the_ID());?>" method="post">
                                <button type="submit" class="overview__print" >
                                        <span>
                                            <i>
                                                <svg class="overview__pr-svg" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M12.0054 8.15918L7.5 12.6646L2.99458 8.15918L3.82324 7.33051L6.91406 10.4213V0H8.08594V10.4213L11.1768 7.33051L12.0054 8.15918ZM15 13.8281H0V15H15V13.8281Z"
                                                            class="overview__pr-path"/>
                                                </svg>
                                            </i>
                                            <?php trans('Printable PDF'); ?>
                                        </span>
                                    <svg width="174" height="64" viewBox="0 0 174 64"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect x='0' y='0' fill='none' width='174' height='64'/>
                                    </svg>
                                </button>
                                <input type="hidden" name="post_id" value="<?php the_ID();?>">
                                <input type="hidden" name="get_pdf" value="article">
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
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/insights/insights', 'related'); ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_template_part('template-parts/bottom/bottom', 'subscribe');
get_footer();
