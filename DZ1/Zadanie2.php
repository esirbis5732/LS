<pre>
<?php//создаем константы
//const Risunki=80.0;
//const Flomastery=23.0;
//const Karandashi=40.0;

define('RISUNKI',80);
define('FLOMASTERY',23);
define('KARANDACHI',40);
$KRASKI = RISUNKI - FLOMASTERY - KARANDACHI;
//находим количество красок через вычитание
echo $KRASKI;