<div class="modals">
    <div class="container">
        <div class="modal-nav">
            <div class="modal-nav__logo">
                <a href="<?php echo get_home_url(); ?>" class="modal-nav__logo-link">
                    <svg width="136" height="24" viewBox="0 0 136 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="logo__img"
                              d="M20.0223 7.13453C18.0383 5.33383 14.9391 4.29468 12.5699 4.29468C8.21673 4.29468 5.18621 7.79217 5.18621 12.0141C5.18621 15.9629 7.83306 19.7024 12.9178 19.7024C14.9734 19.7024 17.271 19.1486 18.6996 18.1793V14.3715H11.8324V10.2861H23.3603V20.4327C20.4 22.615 16.2558 23.9659 12.7043 23.9659C5.43104 23.9614 0 18.632 0 11.9829C0 5.36797 5.5027 0 12.5401 0C16.1229 0 20.0626 1.42067 23.3365 4.0527L20.0223 7.13453ZM40.0491 0C47.2581 0 53.037 5.36797 53.037 11.9488C53.037 18.6662 47.2551 24 40.0491 24C32.843 24 27.1985 18.6662 27.1985 11.9488C27.1985 5.36797 32.843 0 40.0491 0ZM40.0491 19.7439C44.4023 19.7439 47.812 16.2123 47.812 11.9532C47.8096 10.9432 47.6068 9.94363 47.215 9.01178C46.8233 8.07993 46.2503 7.23417 45.5291 6.52303C44.8078 5.81189 43.9525 5.24937 43.0121 4.86774C42.0717 4.4861 41.0648 4.29287 40.0491 4.29913C35.7661 4.29913 32.4235 7.76248 32.4235 11.9532C32.4235 16.2078 35.7661 19.7395 40.0491 19.7395V19.7439ZM62.4794 0.697717V19.8478H76.4451V23.3097H58.5785V0.693264L62.4794 0.697717ZM88.5657 0.697717H92.1172L102.67 23.3112H98.3798L95.63 17.2158H84.8037L82.0882 23.3112H78.0126L88.5657 0.697717ZM86.198 14.0954H94.2416L90.3422 5.3368H90.1332L86.198 14.0954ZM104.907 0.693264L111.414 17.3197H111.623L117.02 0.693264H119.807L125.205 17.3197H125.414L131.92 0.693264H136L127.294 23.3067H123.394L118.414 8.17369H118.205L113.225 23.3067H109.324L100.619 0.693264H104.907Z"/>
                    </svg>
                </a>
            </div>
            <div class="modal-nav__wrap_btn">
                <button class="modal-nav__close mod-close">
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <form data-type="pdf" action="#" class="modal-dow ajaxForm" novalidate>
            <h2 class="modal-dow__title"><?php trans('Download pdf'); ?></h2>
            <div class="modal-dow__wrapper">
                <div class="modal-dow__wrap-input">
                    <div class="modal-sub__wrapper-inp wr-inp wr-1">
                        <input type="text" class="modal-sub__input inp inp-name"
                               placeholder="<?php trans('Enter your name'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a name'); ?></span>
                        </div>
                    </div>
                    <div class="modal-sub__wrapper-inp wr-inp wr-2">
                        <input type="email" class="modal-sub__input inp inp-email"
                               placeholder="<?php trans('Enter your e-mail'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a valid email address'); ?></span>
                        </div>
                    </div>
                    <button class="modal-dow__btn pdf-sub">
                        <span><?php trans('Send'); ?></span>
                        <span> <?php trans('loading');
                            echo '...'; ?></span>
                        <span>
                                    <svg class="modal-dow__svg" width="19" height="15" viewBox="0 0 19 15" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M6.04545 11.8657L1.51136 7.16418L0 8.73134L6.04545 15L19 1.56716L17.4886 0L6.04545 11.8657Z"
                                                fill="black"/>
                                    </svg>
                                </span>
                        <svg width="240" height="56" viewBox="0 0 240 56" xmlns="http://www.w3.org/2000/svg">
                            <rect x='0' y='0' fill='none' width='240' height='56'/>
                        </svg>
                    </button>
                </div>
                <div class="modal-dow__text">
                    <?php trans('Enter your information in order to receive the file.'); ?>
                </div>
            </div>
            <?php utmInputs(); ?>
        </form>
        <form action="#" data-type="sub" class="modal-sub ajaxForm" novalidate>
            <h2 class="modal-sub__title"><?php trans('Sign up'); ?></h2>
            <div class="modal-sub__wrapper">
                <div class="modal-sub__wrap-input">
                    <div class="modal-sub__wrapper-inp wr-inp wr-1">
                        <input type="text" class="modal-sub__input inp inp-name"
                               placeholder="<?php trans('Enter your name'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a name'); ?></span>
                        </div>
                    </div>
                    <div class="modal-sub__wrapper-inp wr-inp wr-2">
                        <input type="email" class="modal-sub__input inp inp-email"
                               placeholder="<?php trans('Enter your e-mail'); ?>">
                        <div class="error-data">
                            <span><?php trans('Enter a valid email address'); ?></span>
                        </div>
                    </div>
                    <button type="submit" class="modal-sub__btn sub-btn">
                        <span><?php trans('Send'); ?></span>
                        <span> <?php trans('loading');
                            echo '...'; ?></span>
                        <span>
                               <svg class="modal-sub__svg" width="19" height="15" viewBox="0 0 19 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M6.04545 11.8657L1.51136 7.16418L0 8.73134L6.04545 15L19 1.56716L17.4886 0L6.04545 11.8657Z"
                                        fill="black"/>
                               </svg>
                         </span>
                        <svg width="240" height="56" viewBox="0 0 240 56" xmlns="http://www.w3.org/2000/svg">
                            <rect x='0' y='0' fill='none' width='240' height='56'/>
                        </svg>
                    </button>
                </div>
                <ul class="modal-sub__wrap-radio">
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" checked name="ch-sub" value="all"
                                   class="modal-sub__radio-input ch-sub ch-sub-0">
                            <span class="modal-sub__text"><?php trans('All insights'); ?>
                                    </span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			                             S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p><?php trans('Subscription to all types of newsletters'); ?>.</p>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" name="ch-sub" value="news" class="modal-sub__radio-input ch-sub">
                            <span class="modal-sub__text"><?php trans('News'); ?></span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
    			"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p>
                                        <?php trans('Subscription to all company news'); ?>.
                                    </p>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" value="tax" name="ch-sub" class="modal-sub__radio-input ch-sub">
                            <span class="modal-sub__text"><?php trans('Tax alert') ?></span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
    			"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p>
                                        <?php trans('Subscription to the tax legislation update newsletter'); ?>.
                                    </p>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" value="hotline" name="ch-sub" class="modal-sub__radio-input ch-sub">
                            <span class="modal-sub__text"><?php trans('Legal hotline'); ?></span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
    			"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p>
                                        <?php trans('Subscription to all legislation updates'); ?>.
                                    </p>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" value="energy" name="ch-sub" class="modal-sub__radio-input ch-sub">
                            <span class="modal-sub__text"><?php trans('Renewable energy'); ?></span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
    			"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p>
                                        <?php trans('Subscription to all legislative changes in the renewable energy sphere'); ?>
                                        .
                                    </p>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="modal-sub__item">
                        <label class="modal-sub__label">
                            <input type="checkbox" value="claims" name="ch-sub" class="modal-sub__radio-input ch-sub">
                            <span class="modal-sub__text"><?php trans('Restructuring, claims and recoveries'); ?></span>
                            <div class="tooltip">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65"
                                     style="enable-background:new 0 0 65 65;">
                                    <g>
                                        <g>
                                            <path d="M32.5,0C14.58,0,0,14.579,0,32.5S14.58,65,32.5,65S65,50.421,65,32.5S50.42,0,32.5,0z M32.5,61C16.785,61,4,48.215,4,32.5
    			S16.785,4,32.5,4S61,16.785,61,32.5S48.215,61,32.5,61z"/>
                                            <circle cx="33.018" cy="19.541" r="3.345"/>
                                            <path d="M32.137,28.342c-1.104,0-2,0.896-2,2v17c0,1.104,0.896,2,2,2s2-0.896,2-2v-17C34.137,29.237,33.241,28.342,32.137,28.342z
    			"/>
                                        </g>
                                    </g>
                                </svg>

                                <div class="tooltip-content">
                                    <div class="tooltip-arrow"></div>
                                    <p>
                                        <?php trans('Subscription to all legislative changes in the restructuring sphere'); ?>
                                        .
                                    </p>
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>
            <?php utmInputs(); ?>
        </form>
        <?php get_template_part('template-parts/expertise', 'modal'); ?>
    </div>
</div>
