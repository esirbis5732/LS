<?php
function task1($array, $check = false)
{
	echo '<p>' . implode('</p><p>', $array) . '</p>';
	if ($check == true) {
		return '<p>' . implode(' ', $array);
	}
}

function task2()
{
	$args = func_get_args()[0];
	$action = $args[0];
	$result = $args[1];
	$kl=count($args);
		for ($i = 2; $i < $kl; $i++) {
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
                        if ($args[$i]!==0 || $args[1]== 0){
                            $result /= $args[$i];
                        }else{
                            $result = 'Делить на ноль нельзя';
                        }
                        break;
			    }
			    if( $result !== 'Делить на ноль нельзя') {
                return implode($action, $numbers) . ' = ' . $result;
            }
		}
}

function task3($args)
{
	if (count($args) !== 2 && count($args)%2!==0) {
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

function task4()
{
	    echo date("d.m.Y G:i") . PHP_EOL;
        echo date("d.m.Y H:i:s", mktime(0, 0, 0, 2, 24, 2016)) . PHP_EOL;

}

function task5()
{
    $str = 'Карл у Клары украл Кораллы';

    echo $str . PHP_EOL;
    $str = str_replace("К", "", $str);
    echo $str . PHP_EOL;
    $str = 'Две бутылки лимонада';
    echo $str . PHP_EOL;
    $str = str_replace("Две", "Три", $str);
    echo $str . PHP_EOL;
}

function task6()
{
    $text = 'Hello again!';
    $file = fopen('text.txt', 'w');
    fwrite($file, $text);
    fclose($file);
    $file=fopen("text.txt", "r");
    echo readfile("text.txt");
    fclose($file);
}
