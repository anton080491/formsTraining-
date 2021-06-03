<?php 

$name = $_POST['name'];   //записываем все названия в наших инпутах
$phone = $_POST['phone'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // определяем какой пс наш почтный ящик
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'interestclubchannel';                 // Наш логин почты с которой типа будут отправляться сообщения
$mail->Password = '0804914277anton';                           // Наш пароль от ящика с которого типа будут отправляться сообщения
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // проверить кодировку smtp
 
$mail->setFrom('interestclubchannel@gmail.com', 'test');   // От кого письмо 
$mail->addAddress('interestclubchannel@gmail.com');     // куда будут приходить письма!
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';     // Верстаем само письмо!
$mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '';

if(!$mail->send()) {
    return false;
} else {
    header('location: index.php');
}

?>