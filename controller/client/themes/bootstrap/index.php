<?php

// Данный код создан и распространяется по лицензии GPL v3
// Изначальный автор данного кода - Грибов Павел
// http://грибовы.рф
$fromapp=  _GET("fromapp");
include_once("header.php");      // главное меню
    include_once("controller/client/themes/$cfg->theme/$content_page.php");            
include_once("footer.php");     // подвал страницы    

?>