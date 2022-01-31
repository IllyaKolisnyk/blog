<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
$error = '';
if(strlen($username) <= 3)
    $error = "Введіть ваше ім'я!";
else if(strlen($email) <= 3)
    $error = 'Введіть ваш email!';
else if(strlen($message) <= 3)
    $error = 'Введіть ваше повідомлення!';
if($error != ''){
    echo $error;
    exit();
}
$my_email = "kolisnyk.illya@chnu.edu.ua";
$subject = "=?utf-8?B?".base64_encode("Нове повідомлення з сайту!")."?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/plain; charset=utf-8\r\n";
mail($my_email, $subject, $message, $headers);
echo 'Готово';