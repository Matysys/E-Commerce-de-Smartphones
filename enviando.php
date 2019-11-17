<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(!isset($_POST['enviar'])){
	header("location: index.php");
	return;
}
echo "<meta name='viewport' content='width=device-width, initial-scale=1>";
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
email();
function email(){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// Load Composer's autoloader
	require 'vendor/autoload.php';
	$email = $GLOBALS['email'];
	$assunto = $GLOBALS['assunto'];
	$mensagem = $GLOBALS['mensagem'];
	$nome = $GLOBALS['nome'];
// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);
	try {
    //Server settings
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'mateusbrunotrab@gmail.com';
    $mail->Password = 'mbtrabalho123';// SMTP password
    $mail->CharSet="UTF-8";
    $mail->SMTPSecure = "tls";// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587;// TCP port to connect to
    //Recipients
    $mail->setFrom('mateusbrunotrab@gmail.com', 'Technology M.B Mobile');
    $mail->addAddress('mateusbrunotrab@gmail.com', $nome); // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body = "Email: $email<br><br>$mensagem";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    /* Disable some SSL checks. */
    $mail->SMTPOptions = array(
    	'ssl' => array(
    		'verify_peer' => false,
    		'verify_peer_name' => false,
    		'allow_self_signed' => true
    	)
    );
    
    $mail->send();
    $mail->ClearAddresses();
    echo "<span style='color: black'>Enviado com sucesso, entraremos em contato através do e-mail.<br><a href='index.php'>Voltar para o site</a></span>";
} catch (Exception $e) {
	echo "A mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
