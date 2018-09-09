<?php
// Модуль для подключения к базе
// Файл с параметрами подключения
$config = include_once 'config.php';
foreach ($config['db'] as $key => $value) {
    ${$key} = $value;
}
try {
    $dsn = "mysql:host='127.0.0.1';dbname=$dbname;charset=$charset utf-8";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    // Подключаемся к базе
    $dbh = new PDO($dsn, $user, $password, $opt);
    return $dbh;
} catch (PDOException $e) {
    return false;
}
