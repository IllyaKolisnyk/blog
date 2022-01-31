<?php
$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = $_POST['text'];
$time = time() + 3600;
$login = $_COOKIE['login'];
$error = '';
if(strlen($title) <= 3)
    $error = 'Введіть назву статті!';
else if(strlen($intro) <= 15)
    $error = "Введіть інтро для статті!";
else if(strlen($text) <= 20)
    $error = 'Введіть текст статті!';
if($error != ''){
    echo $error;
    exit();
}
require_once '../mysql_connect.php';
$sql = "INSERT INTO articles(title, intro, text, date, avtor) VALUES ('$title', '$intro', '$text', '$time', '$login')";
$query = $pdo->query($sql);
echo "Готово";