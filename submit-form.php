<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Считывание типа формы из скрытого поля
    $formType = isset($_POST['form-type']) ? $_POST['form-type'] : 'Неизвестный тип';

    // Общие данные
    $userName = isset($_POST['user-name']) ? htmlspecialchars($_POST['user-name']) : 'Не указано';
    $userPhone = isset($_POST['user-phone']) ? htmlspecialchars($_POST['user-phone']) : 'Не указано';
    $userEmail = isset($_POST['user-mail']) ? htmlspecialchars($_POST['user-mail']) : 'Не указано';
    $userMessage = isset($_POST['user-text']) ? htmlspecialchars($_POST['user-text']) : 'Не указано';
    $userAgree = isset($_POST['user-agree']) ? 'Согласие получено' : 'Согласие не получено';

    // IP-адрес пользователя и URL страницы
    $userIP = $_SERVER['REMOTE_ADDR']; // IP-адрес пользователя
    $pageURL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Неизвестный URL'; // Страница отправки формы

    // Подготовка данных к отправке
    $to = 'ronin.code4web@yandex.ru';
    $subject = "Новая заявка: $formType";
    $message = "Тип формы: $formType\nИмя: $userName\nТелефон: $userPhone\nE-mail: $userEmail\nСообщение: $userMessage\nСогласие на обработку данных: $userAgree\nIP-адрес: $userIP\nСтраница отправки: $pageURL";
    $headers = 'From: webmaster@web-code.pro' . "\r\n" .
               'Reply-To: webmaster@web-code.pro' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Отправка почты
    mail($to, $subject, $message, $headers);

    // Перенаправление пользователя на страницу благодарности
    header('Location: thank-you.html');
    exit;
}
?>
