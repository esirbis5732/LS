<?php
$db=include_once 'db.php';
echo '<pre>';
print_r($_POST);
// Входной контроль поля email и phone  (т.к. в базе они помечены NOT NULL)
if ((empty($_REQUEST['email'])) || (empty($_REQUEST['phone']))) {
    echo json_encode(['result' => 'fail', 'error_code' => 4001], JSON_UNESCAPED_UNICODE);
    return;
}
// Подключаемся к базе
$dbh = require_once 'db.php';
if ($dbh === false) {
    echo json_encode(['result' => 'fail', 'error_code' => 4002], JSON_UNESCAPED_UNICODE);
    return;
}
//  Регистрация или "авторизация" пользователя
$email = $_REQUEST['email'];
// Ищем пользователя по email
/*try {
    $sth = $dbh->prepare('SELECT id FROM users WHERE email = :email');
    $sth->execute(array('email' => trim($email)));
    $userId = $sth->rowColumn();
} catch (PDOException $e) {
    return null;
}
if ($userId === false) {
    // Нет такого пользователя. Создаём.
    try {
        $sth = $dbh->prepare("INSERT INTO users(name, email, phone) VALUES (:fname, :femail, :fphone)");
        $sth->execute(array(
            "fname" => $_REQUEST['name'],
            "femail" => $_REQUEST['email'],
            "fphone" => $_REQUEST['phone']
        ));
        $userId = $dbh->lastInsertId();
    } catch (PDOException $e) {
        return null;
    }
}
return $userId;
if (empty($userId)) {
    echo json_encode(['result' => 'fail', 'error_code' => 4003], JSON_UNESCAPED_UNICODE);
    return;
}*/
// Фаза 2: Оформление заказа
// Записываем данные заказа в таблицу orders: в результате имеем orderId
((!empty($_REQUEST['payment'])) && ($_REQUEST['payment'] == 'card')) ? ($payment = 1) : ($payment = 0);
((!empty($_REQUEST['callback'])) && ($_REQUEST['callback'] == 'on')) ? ($callback = 1) : ($callback = 0);
$sql = "INSERT INTO orders" .
    "(user_id, street, home, part, appt, floor, comment, payment, callback) " .
    "VALUES " .
    "(:fuser_id, :fstreet, :fhome, :fpart, :fappt, :ffloor, :fcomment, :fpayment, :fcallback)";
try {
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
}
// Фаза 3: "Письмо" пользователю
// Получаем адрес и номер заказа данного пользователя
$userAddress = makeBeautyAddress($_REQUEST['street'], $_REQUEST['home'], $_REQUEST['part'], $_REQUEST['appt'], $_REQUEST['floor']);
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
echo json_encode(['result' => 'success', 'order_id' => $orderId], JSON_UNESCAPED_UNICODE);