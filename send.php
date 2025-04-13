<?php
// Проверка, что форма была отправлена методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получаем данные из формы
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $service = isset($_POST['paslauga']) ? htmlspecialchars($_POST['paslauga']) : '';

    // Указываем адрес электронной почты, на который будет отправляться запрос
    $to = "kraber000@gmail.com"; // Замените на свой email

    // Тема письма
    $subject = "Новая заявка с сайта";

    // Сообщение, которое будет отправлено
    $message = "
        <html>
        <head>
            <title>Новая заявка с сайта</title>
        </head>
        <body>
            <p><strong>Имя:</strong> $name</p>
            <p><strong>Телефон:</strong> $phone</p>
            <p><strong>Выбранная услуга:</strong> $service</p>
        </body>
        </html>
    ";

    // Заголовки письма (для отправки HTML-сообщений)
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        // Если письмо отправлено успешно, перенаправляем на страницу подтверждения или выводим сообщение
        echo "<p>Dėkojame už paraišką! Susisieksime su jumis kuo greičiau.</p>";
    } else {
        // Если произошла ошибка при отправке письма
        echo "<p>Pateikiant paraišką įvyko klaida. Prašome pabandyti vėliau.</p>";
    }
}
?>
