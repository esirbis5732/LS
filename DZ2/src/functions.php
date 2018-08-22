<?php
function task1($array, $check = false)
{
	echo '<p>' . implode('</p><p>', $array) . '</p>';
	if ($check == true) {
		return implode(' ', $array);
	}
}

function task2()
{
	$args = func_get_args()[0];
	$action = $args[0];
	$numbers = array_slice($args, 1);
	$result = $args[1];
	if (count($args) > 3) {
		for ($i = 2; $i < count($args); $i++) {
			switch ($action) {
				case '+':
					$result += $args[$i];
					break;
				case '-':
					$result -= $args[$i];
					break;
				case '*':
					$result *= $args[$i];
					break;
				case '/':
					$result /= $args[$i];
					break;
			}
		}
	}
	return implode($action, $numbers) . ' = ' . $result;
}

function task3($args)
{
	if (count($args) !== 2) {
		return 'Целых параметров должно быть 2.';
	} else {
		for ($k = 1; $k < $args[0] + 1; $k++) {
			echo '<table>';
			for ($i = 1; $i < $k + 1; $i++) {
				echo '<tr>';
				for ($j = 1; $j < $k + 1; $j++) {
					echo '<td>' . $i * $j . '</td>';
				}
				echo '</tr>';
			}
			echo '</table><br>';
		};
	}
}

function task4($file)
{
	foreach ($file as $data) {
		echo $data;
	}
}


