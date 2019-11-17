<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(!isset($_POST['cadastroc'])){
	echo "<script>document.location = 'index.php';</script>";
	return;
}
require_once "conexao.php";
$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$email = $_POST['email'];
$emailcripto = base64_encode($email);
$senha = $_POST['senha'];
$senhac = $_POST['senhacon'];
$senhacripto = password_hash($senha, PASSWORD_DEFAULT);
$status = "pendente";
$sqlexistente = "SELECT * FROM cliente WHERE usuario = '$usuario' OR email = '$email'";
mysqli_query($conn, $sqlexistente);
if(mysqli_affected_rows($conn))
{
	echo "Cliente já cadastrado. Tente novamente <a href='cadastro.php'>aqui</a>";
	mysqli_close($conn);
	return; 
}
if($senha != $senhac){
	echo "<span style='color: red;'>Senhas não coincidem. Tente novamente <a href='cadastro.php'>aqui</a></span>";
	mysqli_close($conn);
	return;
}
$sqlmanda = "INSERT INTO cliente (usuario, email, senha, cadstate) VALUES ('$usuario', '$email', '$senhacripto', '$status')";
$salvacadastro = mysqli_query($conn, $sqlmanda);
if($salvacadastro)
{
	mysqli_close($conn);
	email();
}
else{
	echo "Erro ao cadastrar cliente";
	mysqli_close($conn);
}
function email(){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// Load Composer's autoloader
	require 'vendor/autoload.php';
	$email = $GLOBALS['email'];
	$usuario = $GLOBALS['usuario'];
	$emailcripto = $GLOBALS['emailcripto'];
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
    $mail->addAddress($email, $usuario); // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = 'Confirmação de cadastro';
    $mail->Body = "<div style='color: purple; border-bottom: 5px solid blue; height: 300px; padding: 10px; background: #e6e6ff; box-shadow: 2px 2px gray;'>Olá, <b style='color: blue;'>$usuario</b>,<br><br>Clique <a href='https://technologymb.000webhostapp.com/confirmar.php?email=$emailcripto'>aqui</a> para confirmar o cadastro!</div>";
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
    echo "<span style='color: red'>Confirme o seu cadastro no seu email. Verifique a caixa de SPAM ou espere alguns minutos. Faça seu login <a href='login.php'>aqui</a></span>";
} catch (Exception $e) {
	echo "A mensagem não foi enviada. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
