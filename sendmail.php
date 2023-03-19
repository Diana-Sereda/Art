<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'files/phpmailer/src/Exception.php';
require 'files/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('en', 'phpmailer/language/');
$mail->IsHTML(true);

//Oт кого письмо
$mail->setFrom('***@mail.ru','From the artemission');
//Кому отправить
$mail->addAddress('**@novosibmetall.ru');
//Тема письма
$mail->Subject = 'Study aplication';


//Тело письма
$body = '<h1>User\'s informaton </h1>';

if(trim(!empty($_POST['name']))){
$body.='<p><strong>User name:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['tel']))){
$body.='<p><strong>User phone number:</strong> '.$_POST['tel'].'</p>';
}
if(trim(!empty($_POST['message']))){
$body.='<p><strong>Message:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

//Отправляем
if (!$mail->send()) {
  $message = 'Error';
} else {
  $message = 'Successfully sent!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>