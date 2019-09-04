<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
    <?php if (is_page(12)):?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDONeJojxMq_7-PIIds7FCrrmUXmF1wNis"></script>
    <?php endif;?>
</head>