<?php
	require './libs/phpmailer/Exception.php';
	require './libs/phpmailer/PHPMailer.php';
	require './libs/phpmailer/SMTP.php';

	//Import PHPMailer classes into the global namespace
	//These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->isSMTP();                                      //Send using SMTP
	    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'usuario@mail.com.br';        // SMTP username
	    $mail->Password = 'senha123';              // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('usuario@mail.com.br', 'App Send Mail');
	    $mail->addAddress($this->para, '');     // Add a recipient

	    //Content
	    $mail->isHTML(true); 
	    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
	    $mail->Subject = $this->assunto;
	    $mail->Body    = $this->mensagem;
	    $mail->AltBody = 'É necessário utilizar o client que suporte HTML.';

	    $mail->send();

	    $this->status['codigo'] = 1;
			$this->status['descricao'] = 'E-mail enviado com sucesso!';
	} catch (Exception $e) {
			$this->status['codigo'] = 0;
			$this->status['descricao'] = 'Não foi possivel enviar este e-mail. Ocorreu um erro ao enviar. Detalhes do erro: ' . $mail->ErrorInfo;
		}
?>