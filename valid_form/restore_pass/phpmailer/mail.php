<?php 

require_once('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'test.email.1986@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '2oIkOiRLpt4&'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('test.email.1986@bk.ru'); // от кого будет уходить письмо?
$mail->addAddress($email);     // Кому будет уходить письмо 

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'восстановления почты';
$mail->Body    = $rand_number;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'письмо не удалось отправить';
} else {
    header('location: check_number.php');
}
?>