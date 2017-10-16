<?php

// Данный код создан и распространяется по лицензии GPL v3
// Изначальный автор данного кода - Грибов Павел
// http://грибовы.рф

include_once("header.php");      // главное меню

echo "<div id='ajaxpage'>";
    include_once("controller/client/themes/$cfg->theme/$content_page.php");            
echo "</div>";
include_once("footer.php");     // подвал страницы    

?>