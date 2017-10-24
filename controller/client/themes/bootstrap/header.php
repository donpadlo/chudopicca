<?php
// Данный код создан и распространяется по лицензии GPL v3
// Разработчики:
//   Грибов Павел,
//   http://грибовы.рф
?>
<!-- saved from url=(0014)about:internet -->
<!DOCTYPE html>
<html lang="ru-RU">
<head id="idheader">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Сайт ЧудоПицца">
	<meta name="author" content="(c) 2017 by Gribov Pavel">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $cfg->sitename;?></title>
	<meta name="generator" content="yarus">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/jquery-ui.min.css">
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/simplegrid.css">
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/chudo.css">	
	<link rel="stylesheet" href="controller/client/themes/<?php echo $cfg->theme; ?>/css/jquery.toast.min.css">		
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/jquery-3.2.1.min.js"></script>
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/jquery-ui.min.js"></script>	
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/bootstrap.min.js"></script>	
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/simple-list-grid.js"></script>		
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/chudopicca.js"></script>	
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/jquery.maskedinput.min.js"></script>		
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/device.min.js"></script>			
	<script src="controller/client/themes/<?php echo $cfg->theme; ?>/js/jquery.toast.min.js"></script>			
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img class="logotitle" src="/controller/client/themes/bootstrap/img/chudopicca.png"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
	<li <?php if ($content_page=="home"){echo "class=\"active\"";};?>><a href="index.php?content_page=home">Меню</a></li>
	<li <?php if ($content_page=="about"){echo "class=\"active\"";};?>><a href="index.php?content_page=about">Где мы</a></li>
	</li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>    
<div id="dialog-choise-cart" title="Содержимое корзины">    
    <div id="list_cart">
    </div>        
</div>
<div id="widjet_cart" class="widjet_cart">
    <img id="imgcart" onclick="OpenCart();" height="40px" width="40px" src="controller/client/themes/bootstrap/img/backet_empty.png" />
</div>
<div id="widjet_cost" class="widjet_cost">
</div>
<a href="#" class="scrollup">Наверх</a>       
