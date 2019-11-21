<?php

use classes\Bitrix24;

function modalForm()
{
    $lang = wpm_get_language();
    $message = "New message from Web-site.\n";
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    isset($_POST['message'])? $text = htmlspecialchars($_POST['message']):$text = '';
    if(!empty($_POST['post_id']) && !empty(get_field('digest_pdf_' . $lang,
            htmlspecialchars($_POST['post_id']))))
        $digest = get_field('digest_pdf_' . $lang, htmlspecialchars($_POST['post_id']));


    if (!empty($_POST['name'])) $message .= "Name: {$name}\n";
    if (!empty($_POST['email'])) $message .= "Email: {$email}\n";
    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $types = [];
        foreach ($_POST['type'] as $item) {
            array_push($types, $item);
        }
        $string = implode(', ', $types);
        $message .= "Subscribe types: {$string}\n";
    }
    if (isset($text) && !empty($text)) $message .= "Message text:\n {$text}";
    if (wp_mail(ADMIN_EMAIL, 'New message', $message)) {
        if (isset($_POST['file']) && isset($digest)) {
            echo $digest['url'];
        }
        sendDataToCRM($name, $email, $text);
        die();
    } else {
        header("HTTP/1.0 500 Internal server error");
        die();
    }
}

;

function sendDataToCRM($name, $email, $text)
{
    $bitrix = new Bitrix24('golaw.bitrix24.ua', '132', 'nx3t15dqenlcjebk');
    $bitrix->setMethod();
    $data = array(
        'name' => $name,
        'email' => $email,
        'message' => $text,
        'types' => isset($_POST['type'])?$_POST['type']:'',
    );
    if(isset($_POST['utm_source'])) $data['utm_source'] = $_POST['utm_source'];
    if(isset($_POST['utm_content'])) $data['utm_content'] = $_POST['utm_content'];
    if(isset($_POST['utm_medium'])) $data['utm_medium'] = $_POST['utm_medium'];
    if(isset($_POST['utm_campaign'])) $data['utm_campaign'] = $_POST['utm_campaign'];
    if(isset($_POST['utm_term'])) $data['utm_term'] = $_POST['utm_term'];
    $bitrix->setQueryData($data);
    $bitrix->executeREST();
}
