<?php
 include_once(WUO_ROOT.'/inc/lib/PHPMailerAutoload.php'); 
 $backet=_POST("backet");
 if ($backet!=""){
	 $backet=json_decode($backet);
		$mail = new PHPMailer;		
		$mail->isSMTP();               
		$mail->Host = $smtp_server;  
		$mail->SMTPAuth = true;                               
		$mail->Username = $smptp_user;                
		$mail->Password = $smptp__pass;                     
		$mail->SMTPSecure = 'tls';                            
		$mail->From = $smptp_user;
		$mail->FromName = $smptp_username;
		$mail->CharSet="UTF8";
		$mail->addAddress($mailto, 'Новый заказ!');
		$mail->isHTML(true);                                  
		$mail->Subject = 'Сделан новый заказ!';
		$ht="";
		    $ht=$ht.'<table border=1">';
		    $ht=$ht.'<thead>';
		    $ht=$ht.'  <tr>';
		    $ht=$ht.'    <th>#</th>';
		    $ht=$ht.'    <th>Название</th>';
		    $ht=$ht.'    <th>Вес</th>';
		    $ht=$ht.'    <th>Кол.</th>';
		    $ht=$ht.'    <th>Сумма</th>';
		    $ht=$ht.'  </tr>';
		    $ht=$ht.'</thead>';	
		    $total=0;		    
		    // перечисляем заказ
		$i=0;		    
		foreach ($backet as $key => $pbacket) {				  
			$i++;
			$ht=$ht.'<tr>';
			$ht=$ht."<td>$i</td>";			
			$ht=$ht.'<td><strong>'.$pbacket->name.'</strong><br/>'.$pbacket->descr.'</td>';
			$ht=$ht.'<td>'.$pbacket->width.'гр.</td>';
			$ht=$ht.'<td>'.$pbacket->count.'</td>';
			$summ=$pbacket->cost*$pbacket->count;
			$total=$total+$summ;
			$ht=$ht.'<td>'.$summ.'</td>';
			$ht=$ht.'</tr>';
		 };	
		$ht=$ht."<tr><th></th><th>Всего</th><th></th><th></th><th>".$total."<i class='fa fa-rub' aria-hidden='true'></i></th></tr>"; 
		$ht=$ht.'</table>';		    		
		$mail->Body    = $ht;		
		if(!$mail->send()) {			
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo "ok";
		};			
 } else {
	 echo '<div class="alert alert-error"><strong>Ошибка!</strong><br/>Возникла не известная ошибка во время передачи заказа! Попробуйте оформить заказ снова..</div>';	 
 };
 
?>