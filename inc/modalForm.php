<?php

use classes\Bitrix24;

function modalForm()
{
    $message = "New message from Web-site.\n";
    $email = htmlspecialchars($_POST['email']);
    $name = htmlspecialchars($_POST['name']);
    $text = htmlspecialchars($_POST['message']);
    $digest = get_field('digest_pdf', $_POST['post_id']);


    if (!empty($_POST['name'])) $message .= "Name: {$name}\n";
    if (!empty($_POST['email'])) $message .= "Email: {$email}\n";
    if ($_POST['type'] && !empty($_POST['type'])) {
        $types = [];
        foreach ($_POST['type'] as $item) {
            array_push($types, $item);
        }
        $string = implode(', ', $types);
        $message .= "Subscribe types: {$string}\n";
    }
    if ($_POST['message'] && !empty($_POST['message'])) $message .= "Message text:\n {$text}";
    if (wp_mail(ADMIN_EMAIL, 'New message', $message)) {
        if ($_POST['file']) {
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
        'types' => $_POST['type']
    );
    if(isset($_POST['utm_source'])) $data['utm_source'] = $_POST['utm_source'];
    if(isset($_POST['utm_content'])) $data['utm_content'] = $_POST['utm_content'];
    if(isset($_POST['utm_medium'])) $data['utm_medium'] = $_POST['utm_medium'];
    if(isset($_POST['utm_campaign'])) $data['utm_campaign'] = $_POST['utm_campaign'];
    if(isset($_POST['utm_term'])) $data['utm_term'] = $_POST['utm_term'];
    $bitrix->setQueryData($data);
    $bitrix->executeREST();
}
