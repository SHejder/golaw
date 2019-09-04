</main>
<?php
get_sidebar();
get_template_part('template-parts/bottom', 'modals');
get_template_part('template-parts/bottom', 'cookie');
global $contacts_link;?>
<footer class="footer">
    <div class="container">
        <div class="footer__wrap">
            <div class="footer__logo">
                <a href="<?php echo get_home_url(); ?>" class="footer__logo-link">
                    <svg width="136" height="24" viewBox="0 0 136 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="logo__img"
                              d="M20.0223 7.13453C18.0383 5.33383 14.9391 4.29468 12.5699 4.29468C8.21673 4.29468 5.18621 7.79217 5.18621 12.0141C5.18621 15.9629 7.83306 19.7024 12.9178 19.7024C14.9734 19.7024 17.271 19.1486 18.6996 18.1793V14.3715H11.8324V10.2861H23.3603V20.4327C20.4 22.615 16.2558 23.9659 12.7043 23.9659C5.43104 23.9614 0 18.632 0 11.9829C0 5.36797 5.5027 0 12.5401 0C16.1229 0 20.0626 1.42067 23.3365 4.0527L20.0223 7.13453ZM40.0491 0C47.2581 0 53.037 5.36797 53.037 11.9488C53.037 18.6662 47.2551 24 40.0491 24C32.843 24 27.1985 18.6662 27.1985 11.9488C27.1985 5.36797 32.843 0 40.0491 0ZM40.0491 19.7439C44.4023 19.7439 47.812 16.2123 47.812 11.9532C47.8096 10.9432 47.6068 9.94363 47.215 9.01178C46.8233 8.07993 46.2503 7.23417 45.5291 6.52303C44.8078 5.81189 43.9525 5.24937 43.0121 4.86774C42.0717 4.4861 41.0648 4.29287 40.0491 4.29913C35.7661 4.29913 32.4235 7.76248 32.4235 11.9532C32.4235 16.2078 35.7661 19.7395 40.0491 19.7395V19.7439ZM62.4794 0.697717V19.8478H76.4451V23.3097H58.5785V0.693264L62.4794 0.697717ZM88.5657 0.697717H92.1172L102.67 23.3112H98.3798L95.63 17.2158H84.8037L82.0882 23.3112H78.0126L88.5657 0.697717ZM86.198 14.0954H94.2416L90.3422 5.3368H90.1332L86.198 14.0954ZM104.907 0.693264L111.414 17.3197H111.623L117.02 0.693264H119.807L125.205 17.3197H125.414L131.92 0.693264H136L127.294 23.3067H123.394L118.414 8.17369H118.205L113.225 23.3067H109.324L100.619 0.693264H104.907Z"/>
                    </svg>
                </a>
                <div class="footer__wrap_pl">
                    <ul class="footer__plasess">
                        <li class="footer__item_pl">
                            <a href="<?= wpm_translate_url($contacts_link); ?>?tab=0" class="footer__link">
                                <span><?php trans('Kyiv'); ?></span>
                            </a>
                        </li>
                        <li class="footer__item_pl">
                            <a href="<?= wpm_translate_url($contacts_link); ?>?tab=1" class="footer__link">
                                <span><?php trans('Berlin'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__quick">
                <h3 class="footer__title"><?php trans('Quick links'); ?></h3>
                <ul class="footer__wrap_qu">
                    <li class="footer__item_wrp">
                        <ul class="footer__wrapper footer__wrapper_qu">
                            <?php wp_nav_menu([
                                'menu' => 'Footer',
                                'container' => '',
                                'echo' => true,
                                'items_wrap' => '%3$s',
                                'after' => false,

                            ]); ?>
                            <li>
                                <span class="subs">
                                    <b>Subscribe to newsletters</b>
                                </span>
                            </li>
                            <li>
                                <span class="exp">
                                    <b>Our Expertise</b>
                                </span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="footer__social">
                <h3 class="footer__title"><?php trans('Follow us'); ?></h3>
                <?php get_template_part('template-parts/social', 'links') ?>
            </div>
        </div>
        <div class="footer__wrap_bot">
            <div class="footer__copy">
                <p class="footer__copy_text">
                    &copy; Copyright <?= date('Y'); ?>
                </p>
            </div>
            <ul class="footer__other">
                <li class="footer__item_pol">
                    <a href="<?= get_permalink(366); ?>" class="footer__link-pl">
                        <span>Sitemap</span>
                    </a>
                </li>
                <li class="footer__item_pol">
                    <a href="<?= get_permalink(362); ?>" class="footer__link-pl">
                        <span>Privacy Policy</span>
                    </a>
                </li>
                <li class="footer__item_pol">
                    <a href="<?= get_permalink(364); ?>" class="footer__link-pl">
                        <span>Cookies Policy</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<?php if (get_page_link() === wpm_translate_url($contacts_link)): ?>
    <script>
        var mapStyle =
                [
                    {
                        "featureType": "all",
                        "stylers": [
                            {
                                "saturation": 0
                            },
                            {
                                "hue": "#e7ecf0"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "stylers": [
                            {
                                "saturation": -70
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "saturation": -60
                            }
                        ]
                    }
                ],
            doc = document,
            dataMarkerOne = 'button[data-marker-id="0"]',
            dataMarkerTwo = 'button[data-marker-id="1"]',
            dataLat = 'data-lat',
            dataLang = 'data-lang',
            coordinatesKyivLat = +doc.querySelector(dataMarkerOne).getAttribute(dataLat),
            coordinatesKyivLang = +doc.querySelector(dataMarkerOne).getAttribute(dataLang),
            coordinatesBerlinLat = +doc.querySelector(dataMarkerTwo).getAttribute(dataLat),
            coordinatesBerlinLang = +doc.querySelector(dataMarkerTwo).getAttribute(dataLang);


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: {
                lat: 50.445847,
                lng: 30.5337243
            },
            scrollwheel: false,
            styles: mapStyle,
            // disableDefaultUI: true
        });
        var markers = [
            new google.maps.Marker({
                position: {
                    lat: coordinatesKyivLat,
                    lng: coordinatesKyivLang
                },
                map: map,
                icon: "http://crius-bogdan.gitlab.io/golaw/img/loc.svg"
            }),
            new google.maps.Marker({
                position: {
                    lat: coordinatesBerlinLat,
                    lng: coordinatesBerlinLang
                },
                map: map,
                icon: "http://crius-bogdan.gitlab.io/golaw/img/loc.svg"
            })
        ];

        google.maps.event.addDomListener(window, 'load', initMap);

        // Sets the map on all markers in the array.
        function initMap() {
            $(doc).on('click', '.map-tab', function (event) {
                // event.preventDefault();
                clearMarkers();

                markers[$(this).data('marker-id')].setMap(map);
                map.setZoom(Math.max(15));
                map.setCenter(new google.maps.LatLng(markers[$(this).data('marker-id')].getPosition().lat(), markers[$(this).data('marker-id')].getPosition().lng()));
                return false;
            });
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        function clearMarkers() {
            setMapOnAll(null);
        }
    </script>
<?php endif; ?>
</body>
</html>



