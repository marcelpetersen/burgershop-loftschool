<?php

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $street = $_POST['street'];
  $house = $_POST['house'];
  $corp = $_POST['corp'];
  $flat = $_POST['flat'];
  $floor = $_POST['floor'];
  $comment = $_POST['comment'];
  $payment = $_POST['payment'];
  $callback = $_POST['callback'];

  $callback = isset($callback) ? 'Нет' : 'Да';

  $mail_message = '
    <html>
    <head>
      <title>Заявка</title>
    </head>
    <body>
      <h2>Заказ</h2>
      <ul>
        <li>Имя: '. $name .'</li>
        <li>Телефон: '. $phone .'</li>
        <li>Улица: '. $street .'</li>
        <li>Дом: '. $house .'</li>
        <li>Корпус: '. $corp .'</li>
        <li>Квартира: '. $flat .'</li>
        <li>Этаж: '. $floor .'</li>
        <li>Комментарий: '. $comment .'</li>
        <li>Оплата: '. $payment .'</li>
        <li>Нужно перрезвонить: '. $callback .'</li>
      </ul>
    </body>
  </html>    
';

$headers = "From: Администратор сайта <dimon200685@mail.ru>\r\n".
"MiME-Version: 1.0" . "\r\n" .
"Content-type: text/html; charset=UTF-8" . "\r\n";

$mail = mail('dimon200685@mail.ru', 'Order', $mail_message, $headers);

$data = [];
$data['name'] = $name;

    if ($mail) {
        $data['status'] = "OK";
        $data['mes'] = "Письмо успешно отправлено";
    }else{
        $data['status'] = "NO";
        $data['mes'] = "На сервере произошла ошибка";
    }

    echo json_encode($data);

?>