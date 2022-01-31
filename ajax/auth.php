<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
$error = '';
if(strlen($login) <= 3)
	$error = 'Введіть ваш логін!';
else if(strlen($password) <= 3)
	$error = 'Введіть ваш пароль!';
if($error != ''){
	echo $error;
	exit();
}
$hash = 'jskldjlksdjfklsjdfjhsjdkhfksjhdf';
$password = md5($password . $hash);
require_once '../mysql_connect.php';
$sql = "SELECT login, password FROM users";
$query = $pdo->query($sql);
while ($rezult = $query->fetch()) {
	if($login == $rezult['login'] && $password == $rezult['password']) {
		setcookie('login', $login, time() + 3600 * 24 * 30, '/');
        echo 'Готово';
		exit();
	}
}
echo 'Такого користувача не існує!';