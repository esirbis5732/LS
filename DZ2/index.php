<pre>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('src/functions.php');
echo '<h2>Задание №1</h2>';
$arr = ['1 сентября', '2 сентября', '3 сентября'];
echo task1($arr, true).PHP_EOL;
echo '<h2>Задание №2</h2>';
$arr = ['+', 1, 2, 3, 5.2];
echo task2($arr).PHP_EOL;
echo '<h2>Задание №3</h2>';
$arr = [5, 3];
echo task3($arr).PHP_EOL;
echo '<h2>Задание №4</h2>';
echo date("d.m.Y i:s") .PHP_EOL;
echo date("d.m.Y i:s", mktime(0, 0, 0, 2, 24, 2016)).PHP_EOL;
echo '<h2>Задание №5</h2>';
$str = 'Карл у Клары украл Кораллы';
echo $str .PHP_EOL;
$str = str_replace("К", "", $str);
echo $str.PHP_EOL;
echo '<h2>Задание №6</h2>';
$text = 'Hello again!';
$file = fopen('text.txt', 'w');
fwrite($file, $text);
fclose($file);
$filename = file('src/vivid.txt');
task4($filename);