<?php
$user = 'root';
$pass = 'admin';
$db = 'good_news';
$host = 'localhost';
$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $pass);