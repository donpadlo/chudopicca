<?php
 include_once(WUO_ROOT.'/inc/lib/PHPMailerAutoload.php'); 
 $corder=file_get_contents(WUO_ROOT.'/../orders.txt');
 $corder++;
 $backet=_POST("backet");
 $mobile=_POST("mobile");
 $address=_POST("address");
 $fromcart=_POST("fromcart");
 $samo=_POST("samo");
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
		$mail->addAddress($mailto, "Новый заказ!№$corder");
		$mail->isHTML(true);                                  
		$mail->Subject = "Сделан новый заказ!№$corder";
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
			$ht=$ht.'<td><strong>'.$pbacket->name.'</strong><br/>'.$pbacket->descr;
			 if ($pbacket->sous!=""){
			    $ht=$ht."Бесплатный соус:".$pbacket->sous;     
			 };
			$ht=$ht.'</td>';
			$ht=$ht.'<td>'.$pbacket->width.'гр.</td>';
			$ht=$ht.'<td>'.$pbacket->count.'</td>';
			$summ=$pbacket->cost*$pbacket->count;
			$total=$total+$summ;
			$ht=$ht.'<td>'.$summ.'</td>';
			$ht=$ht.'</tr>';
		 };	
		$ht=$ht."<tr><th></th><th>Всего</th><th></th><th></th><th>".$total."<i class='fa fa-rub' aria-hidden='true'></i></th></tr>"; 
		$ht=$ht.'</table><br/>';		    		
		$ht=$ht."Телефон: $mobile<br/>";
		$ht=$ht."Адрес: $address<br/>";
		$ht=$ht."Оплата с карточки: $fromcart<br/>";
		$ht=$ht."Самовывоз: $samo<br/>";		
		$mail->Body    = $ht;		
		if(!$mail->send()) {			
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo "ok";
		    @file_put_contents(WUO_ROOT.'/../orders.txt', $corder);
		    @file_put_contents(WUO_ROOT.'/../bakets.txt', date("d.m.Y H:i")."::"._POST("backet")."::$mobile::$address::$fromcart::$samo\n",FILE_APPEND );
		    SendSMS("Новый заказ №$corder");
		};			
 } else {
	 echo '<div class="alert alert-error"><strong>Ошибка!</strong><br/>Возникла не известная ошибка во время передачи заказа! Попробуйте оформить заказ снова..</div>';	 
 };
 
?>