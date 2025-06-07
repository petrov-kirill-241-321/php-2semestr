<?php
$host = 'localhost';
$dbname = 'contacts_db';
$user = 'root'; // замените на своего пользователя
$pass = '';     // замените на свой пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}
?>
