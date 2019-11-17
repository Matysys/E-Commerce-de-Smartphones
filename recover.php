<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "<script src='removeBanner.js'></script>";
echo "<meta http-equiv='refresh' content='4;URL=index.php'>";
require_once "conexao.php";
$email = $_POST['email'];
$sqlrecuperacao = "SELECT * FROM cliente WHERE email = '$email'";
mysqli_query($conn, $sqlrecuperacao);
if(mysqli_affected_rows($conn)){
 mysqli_close($conn);
 $emailcripto = base64_encode($email);
 $assunto = "Recuperação de senha";
 $mensagem = "<span style='color:purple;'>Clique <a href='https://technologymb.000webhostapp.com/alterarsenha.php?email=$emailcripto'>aqui</a> para alterar a sua senha!</span>";
 email();
}
else{
echo "Esse e-mail não existe, tente novamente <a href='esqueci.php'>aqui</a>";
mysqli_close($conn);
}
function email(){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// Load Composer's autoloader
require 'vendor/autoload.php';
$email = $GLOBALS['email'];
$assunto = $GLOBALS['assunto'];
$mensagem = $GLOBALS['mensagem'];
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
    $mail->addAddress($email, 'Caro usuário!'); // Add a recipient
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
    $mail->Body = $mensagem;
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
    echo "Verifique seu email para recuperar sua senha! Volte a página inicial <a href='index.php'>aqui</a>";
} catch (Exception $e) {
    echo "A mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
