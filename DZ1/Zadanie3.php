<pre>
<?php
$age = 50;
if (($age >= 1) && ($age <= 17)) {
	echo "Вам еще рано работать";
} elseif (($age >= 18) && ($age <= 65)) {
	echo "Вам еще работать и работать";
} elseif ($age > 65) {
	echo "Вам пора на пенсию";
} else {
	echo "Неизвестный возраст";
}
echo PHP_EOL;