<?php


namespace classes\pdf;


interface Strategy
{
    function getHTML(\WP_Post $post);

    function getDesc();

    function getFilename();

}