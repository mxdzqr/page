<?php

    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";

    $headers = "Form: example@gmail.com\r\nReply-to: example@gmail.com\r\nContent-type: text/html; charset=utf-8\r\n";

    $success = mail($email,$subject,$message,$headers);
    echo $success;