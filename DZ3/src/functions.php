<pre>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function task1()
{
    $xmlFileName = __DIR__ . DIRECTORY_SEPARATOR . 'data.xml';
    $xml = simplexml_load_file($xmlFileName);
    if ($xml === false) {
        return null;
    }
    include 'order_blank.php';
}
function task2()
{
    $avto1 = [
        1 => [
            'mark' => 'bmw',
            'model' => 'x4',
            'age' => 8,
            'broken' => true,
            'repairs' => [1 => 'Кузов', 2 => 'Двигатель', 3 => 'Тормоза']
        ],
        2 => [
            'mark' => 'opel',
            'model' => 'astra',
            'age' => 6,
            'broken' => false,
            'repairs' => []
        ],
        3 => [
            'mark' => 'lada',
            'model' => 'Granta',
            'age' => 4,
            'broken' => true,
            'repairs' => [1 => 'Двигатель']
        ]
    ];
    $json = json_encode($avto1, JSON_UNESCAPED_UNICODE);
    file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'output.json', $json);
    if (rand(0, 1)) {
        $str = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'output.json');
    $avto2 = json_decode($str, true);}
    else {
        $str = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'output2.json');
        $avto2 = json_decode($str, true);
    }
    echo '<br>';
    for ($i = 1; $i <= count($avto1); $i++) {
        $persdata1 = $avto1[$i];
        $persdata2 = $avto2[$i];
        foreach ($persdata1 as $key => $value) {
            if (is_array($value)) {
                $str1 = '[' . implode(', ', $value) . ']';
                $str2 = '[' . implode(', ', $persdata2[$key]) . ']';
            } else {
                $str1 = var_export($value, true);
                $str2 = var_export($persdata2[$key], true);
            }
            // Сравниваем и выводим
            if ($str1 != $str2) {
                echo "ДО :&nbsp; $key = " . $str1 . '<br>';
                echo "После:&nbsp; $key = " . $str2 . '<br>';
            }
        }
    }
}
function task3()
{
    $arrRand = [];
    for ($i = 0; $i <= 50; $i++) {
        $arrRand[] = rand(1, 100);
    }
    $csvFileName = __DIR__ . DIRECTORY_SEPARATOR . 'random_numbers.csv';
    $csvFile = fopen($csvFileName, 'wb');
    fputcsv($csvFile, $arrRand, ';');
    fclose($csvFile);
    //подсчет суммы четных чисел
    $csvFile = fopen($csvFileName, 'rb');
    if ($csvFile === false) {
        return null;
    }
    $arrRandNums = fgetcsv($csvFile, 0, ';');
    $sum = 0;
    foreach ($arrRandNums as $num) {
        if ($num % 2 == 0) {
            $sum += $num;
        }
    }
    echo '<br>';
    echo 'Сумма чётных чисел = ' . $sum;
    echo '<br>';
}
function task4()
{
    $link = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
    $json = file_get_contents($link);
    $data = json_decode($json, true);
    echo '<br>';
    // Ищем в массиве значение по ключу 'title'
    $title = find_value($data, 'title');
    if (!empty($title)) {
        echo 'title = ' . $title . '<br>';
    }
    $page_id = find_value($data, 'page_id');
    if (!empty($page_id)) {
        echo 'page_id = ' . $page_id . '<br>';
    }
}
