<?php
echo '<table>';
for ($i = 1; $i <= 10; $i++) {
	echo '<tr>';
	for ($j = 1; $j <= 10; $j++) {
		if (($i % 2 == 0) && ($j % 2 == 0)) {
            echo "<td>".'('.$i."x".$j."=".$i * $j.')'."</td>";
		} elseif (($i % 2 == 1) && ($j % 2 == 1)) {
            echo "<td>".'['.$i."x".$j."=".$i * $j.']'."</td>";
		}
}
echo '</tr>';
}
echo '</table>';