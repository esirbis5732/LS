<pre>
<?php
$bmw = [
	'model' => 'X5',
	'speed' => '120',
	'doors' => '5',
	'year' => '2015'
];
$toyota = [
	'model' => 'Kamry',
	'speed' => '150',
	'doors' => '6',
	'year' => '2017'
];
$opel = [
	'model' => 'Mokka',
	'speed' => '140',
	'doors' => '4',
	'year' => '2011'
];
$result['bmw'] = $bmw;
$result['toyota'] = $toyota;
$result['opel'] = $opel;
print_r($result);
echo PHP_EOL;
foreach ($result as $key => $value) {
	echo 'CAR ' . $key . PHP_EOL;
	foreach ($value as $val) {
		echo $val . " ";
	}
	echo PHP_EOL;
}
