<?php
// Модуль для подключения к базе
// Файл с параметрами подключения
$dsn = "mysql:host=localhost;charset=utf8;";
$pdo= new PDO($dsn,'root','');
$pdo->query('use burger;');
return $pdo;
