<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('class.phpmailer.php');
require('class.smtp.php');
$mail = new PHPMailer();

    $cuerpo = "Nombre: " . $_POST["nombre"] . "\r\n"; 
    $cuerpo .= " --- Email: " . $_POST["email"] . "\r\n";
	$cuerpo .= " --- Consulta: " . $_POST["consulta"] . "\r\n";


//------------------------------------------------------
    $correo_destino="claudio.llorena@gmail.com"; //a que correo llega
    $nombre_destino="Claudio LLorena"; //nombre de quien recibe
    $correo_emisor="claudio@programadorinformatico.cl"; //tu correo
    $nombre_emisor="Claudio LLorena"; //tu nombre
    $contrasena="Cplla1963*"; //contraseña de tu usuario
//--------------------------------------------------------


$mail->IsSMTP();
//$mail->SMTPAuth = true;
$mail->Host = "smtp.zoho.com";
$mail->Port = "465";
$mail->SMTPSecure = "ssl";
$mail->From = $correo_emisor;
$mail->FromName = $nombre_emisor;
$mail->Subject = "Mensaje Pagina";
$mail->AltBody = "Cuerpo alternativo para cuando el visor no puede leer HTML en el cuerpo";
$mail->MsgHTML($cuerpo);
// podemos hacer varios AddAdress
$mail->AddAddress($correo_destino, $nombre_destino);
$mail->SMTPAuth = "true";
//$mail->SMTPDebug = "3";
// credenciales usuario
$mail->Username = "claudio@programadorinformatico.cl";
$mail->Password = "Cplla1963*";

if(!$mail->Send()) {
echo "Error enviando: " . $mail->ErrorInfo;
} else {
echo "¡¡Enviado!!";
} 
?>
