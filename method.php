<?php
require_once "swiftmailer-5.x/swiftmailer-5.x/lib/swift_required.php";
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
->setUsername('asesordiegoye@gmail.com')
->setPassword('procesadordecorreos');

$mailer = Swift_Mailer::newInstance($transport);
$mail = $_POST['email'];
$name = $_POST['name'];
$messagex = $_POST['message'];
$tel = $_POST['phone'];
$cell = $_POST['cellphone'];
$message = Swift_Message::newInstance('Mensaje Recibido')
->setFrom(array("asesordiegoye@gmail.com"=>'Asesor de Productos Ye'))
->setTo(array($mail=>"cliente"))
->setBody('<div style="background-color:#D40042;font-size:30px;height:auto;width:100%">El asesor de productos Ye ha recibido su mensaje. En un período
menor a 24 horas, el responderá su mensaje. En caso de no ser así, mandar
un mensaje al número: 8123703188</div>', 'text/html');
/*
$newTransport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
  ->setUsername('asesordiegoye@gmail.com')
  ->setPassword('procesadordecorreos');

$newMailer = Swift_Mailer::newInstance($newTransport);

$newMessage = Swift_Message::newInstance('Cliente solicita información')
->setFrom(array('asesordiegoye@gmail.com'=>'Asesor de Productos Ye'))
->setTo(array('diego13132011@me.com'=>'A'))
->setBody('Un cliente llamado' . $name . "solicita informacion de los productos, dejo este mensaje: <br>" . $message . "<br>
su numero de telefono es: " . $tel . "<br>Su celular es: " . $cell . "<br>Su correo es: " . $mail  , "text/html");
$newMailer->send($newMessage);
*/
$newMailer = Swift_Mailer::newInstance($transport);
$newMessage = Swift_Message::newInstance('Cliente solicita información')
->setFrom(array('asesordiegoye@gmail.com'=>'Asesor de Productos Ye'))
->setTo(array('diego13132011@me.com'=>'A'))
->setBody('Un cliente llamado' . $name . "solicita informacion de los productos, dejo este mensaje: <br>" . $messagex . "<br>
su numero de telefono es: " . $tel . "<br>Su celular es: " . $cell . "<br>Su correo es: " . $mail  , "text/html");
if ($mailer->send($message)){
    echo "Mensaje enviad";
    echo $messagex;
    $newMailer->send($newMessage);

}


?>
