<?php
$usersurname = trim(filter_var($_POST['usersurname'], FILTER_SANITIZE_STRING));
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
$password_again = trim(filter_var($_POST['password_again'], FILTER_SANITIZE_STRING));
$error = '';
if(strlen($usersurname) <= 3)
	$error = 'Введіть ваше прізвище!';
else if(strlen($username) <= 3)
		$error = "Введіть ваше ім'я!";
else if(strlen($email) <= 3)
		$error = 'Введіть ваш email!';
else if(strlen($login) <= 3)
		$error = 'Введіть ваш логін!';
else if(strlen($password) <= 3)
		$error = 'Введіть ваш пароль!';
else if(strlen($password_again) <= 3)
		$error = 'Введіть ваш пароль знову!';
else if(strlen($password) != strlen($password_again))
		$error = 'Паролі не співпадають!';
if($error != ''){
	echo $error;
	exit();
}
$hash = 'jskldjlksdjfklsjdfjhsjdkhfksjhdf';
$password = md5($password . $hash);
require_once '../mysql_connect.php';
$sql = "INSERT INTO users(usersurname, username, email, login, password) VALUES ('$usersurname', '$username', '$email', '$login', '$password')";
$query = $pdo->query($sql);
echo 'Готово';