<?php
define('HEADER_TMP_PATH','template-parts/header/header');
define('DICTIONARY','includes/translation/dictionary.php' );
define('ADMIN_EMAIL',get_field('admin_email','option'));
$pages = get_field('pages', 'option');
$insights_link = $pages['insights_page'];
$people_link = $pages['people_page'];
$contacts_link = $pages['contact_page'];
