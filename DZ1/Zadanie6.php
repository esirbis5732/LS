<?php
echo '<table>';
for ($i = 1; $i <= 10; $i++) {
	echo '<tr>';
	for ($j = 1; $j <= 10; $j++) {
		if (($i % 2 == 0) && ($j % 2 == 0)) {
			$chet = true;
		} elseif (($i % 2 == 1) && ($j % 2 == 1)) {
			$nechet = true;
		} else {
			$chet = false;
			$nechet = false;
		}
		echo '<td>';
		if ($chet == true) {
			echo '(';
		} elseif ($nechet == true) {
			echo '[';
		}
		echo $i * $j;
		if ($chet == true) {
			echo ')';
		} elseif ($nechet == true) {
			echo ']';
		}
		echo '</td>';
	}
	echo '</tr>';
}
echo '</table>';