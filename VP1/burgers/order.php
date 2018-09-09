<?php
echo '<pre>';
$db=include_once 'db.php';
require "func.php";

$Regis=Registr($_POST['email'],$db);
if (!$Regis){
    $Regis=RegUser($db,$_POST['name'], $_POST['email'],$_POST['phone']);
}
$data=RegOrder($db,json_encode($_POST), json_encode($_POST),$Regis['id']);
$adres=RegOrder($db,json_encode($_POST), json_encode($_POST),$Regis['ulica'],$Regis['korpus'],$Regis['kvartira'],$Regis['itaj']);
print_r($Regis);
file_put_contents('bloc','zakaz#'.$data['id'].'\n Ваш заказ будет доставлен по адресу:'.$adres['ulica'].'Содержимое заказа:\n DarkBeefBurger за 500 рублей, 1 шт\n Спасибо!\n Это Ваш #' . $data['id'] .  'заказ!\n');












/*$mailText = "Заказ № $orderId\n\n";
//$mailText .= "Ваш заказ будет доставлен по адресу:\n";
$mailText .= $userAddress . "\n\n";
$mailText .= "Содержимое заказа:\n";
$mailText .= "DarkBeefBurger за 500 рублей, 1 шт\n\n";
$mailText .= "Спасибо!\n";
$mailText .= "Это Ваш " . $userOrderNum . " заказ!\n";*/












// Фаза 2: Оформление заказа
// Записываем данные заказа в таблицу orders: в результате имеем orderId
/*((!empty($_REQUEST['payment'])) && ($_REQUEST['payment'] == 'card')) ? ($payment = 1) : ($payment = 0);
((!empty($_REQUEST['callback'])) && ($_REQUEST['callback'] == 'on')) ? ($callback = 1) : ($callback = 0);
$sql = "INSERT INTO orders" .
    "(user_id, street, home, part, appt, floor, comment, payment, callback) " .
    "VALUES " .
    "(:fuser_id, :fstreet, :fhome, :fpart, :fappt, :ffloor, :fcomment, :fpayment, :fcallback)";*/
/*try {
    $sth = $dbh->prepare($sql);
    $sth->execute(array(
        "fuser_id" => $userId,
        "fstreet" => $_REQUEST['street'],
        "fhome" => $_REQUEST['home'],
        "fpart" => $_REQUEST['part'],
        "fappt" => $_REQUEST['appt'],
        "ffloor" => $_REQUEST['floor'],
        "fcomment" => $_REQUEST['comment'],
        "fpayment" => $payment,
        "fcallback" => $callback
    ));
    $orderId = $dbh->lastInsertId();
} catch (PDOException $e) {
    return null;
}
return $orderId;
if (empty($orderId)) {
    echo json_encode(['result' => 'fail', 'error_code' => 4004], JSON_UNESCAPED_UNICODE);
    return;
}*/
// Фаза 3: "Письмо" пользователю
// Получаем адрес и номер заказа данного пользователя
/*$userAddress = makeBeautyAddress($_REQUEST['street'], $_REQUEST['home'], $_REQUEST['part'], $_REQUEST['appt'], $_REQUEST['floor']);
$userOrderNum = getOrderNumber($dbh, $userId);
// Создаём папку для писем, если её нет
$emailsFolder = __DIR__ . DIRECTORY_SEPARATOR . '_emails_';
if (!file_exists($emailsFolder)) {
    try {
        mkdir($emailsFolder, 0777);
    } catch (ErrorException $e) {
        return null;
    }
}
// Файл для сохранения текста письма
$emailFileName = $emailsFolder . DIRECTORY_SEPARATOR . date('Y-m-d__H-i-s') . '.txt';
// Получаем адрес и номер заказа данного пользователя
$userAddress = makeBeautyAddress($_REQUEST['street'], $_REQUEST['home'], $_REQUEST['part'], $_REQUEST['appt'], $_REQUEST['floor']);
$userOrderNum = getOrderNumber($dbh, $userId);
// Текст письма
$mailText = "Заказ № $orderId\n\n";
$mailText .= "Ваш заказ будет доставлен по адресу:\n";
$mailText .= $userAddress . "\n\n";
$mailText .= "Содержимое заказа:\n";
$mailText .= "DarkBeefBurger за 500 рублей, 1 шт\n\n";
$mailText .= "Спасибо!\n";
$mailText .= "Это Ваш " . $userOrderNum . " заказ!\n";
// Пишем в файл
try {
    file_put_contents($emailFileName, $mailText);
} catch (ErrorException $e) {
    return null;
}
if (empty($result)) {
    echo json_encode(['result' => 'fail', 'error_code' => 4005], JSON_UNESCAPED_UNICODE);
    return;
}
echo json_encode(['result' => 'success', 'order_id' => $orderId], JSON_UNESCAPED_UNICODE);*/