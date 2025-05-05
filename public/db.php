<?php
$host = 'localhost';
$dbname = 'task_manager';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    Flight::set('db', $pdo);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}
