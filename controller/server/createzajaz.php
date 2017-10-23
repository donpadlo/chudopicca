<?php
 include_once(WUO_ROOT.'/inc/lib/PHPMailerAutoload.php'); 
 $backet=_POST("backet");
 if ($backet!=""){
	 $backet=json_decode($backet);
		$mail = new PHPMailer;		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'pavel_grb@mail.ru';                 // SMTP username
		$mail->Password = '345t24rt2345';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
		$mail->From = 'pavel_grb@mail.ru';
		$mail->FromName = 'Грибов Павел';
		$mail->addAddress('donpadlo@gmail.com', 'Абырвалг');     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		};		
		echo "ok";
 } else {
	 echo '<div class="alert alert-error"><strong>Ошибка!</strong><br/>Возникла не известная ошибка во время передачи заказа! Попробуйте оформить заказ снова..</div>';	 
 };
 
?>