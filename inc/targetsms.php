<?php

function SendSMS($txt){
    global $smsphone,$smslogin,$smspass;
    $src='<?xml version="1.0" encoding="utf-8" ?>
    <request>
    <message type="sms"></message>
    <message> 
    <sender>INETKTV</sender> 
    <text>'.$txt.'</text>
    <abonent phone="'.$smsphone.'"  number_sms="1"/>
    </message>
    <security>
    <login value="'.$smslogin.'" />
    <password value="'.$smspass.'" />
    </security>
    </request>';    
    $href = 'https://sms.targetsms.ru/xml/index.php'; // адрес сервера $res= '';		
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CRLF, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $src);
    curl_setopt($ch, CURLOPT_URL, $href);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    $result = curl_exec($ch);    
    return $result;
};