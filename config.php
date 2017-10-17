<?php
// Данный код создан и распространяется по лицензии GPL v3
// Изначальный автор данного кода - Грибов Павел
// http://грибовы.рф

# Режим отладки
$debug = true;             // РЕКОМЕНДУЮ поставить false !!!

$codemysql = 'utf8';        // Кодировка базы
$mysql_base_id = '';        // Идентификатор соединения

$mysql_host = 'localhost';  // Хост БД
$mysql_user = 'zapadlo';       // Пользователь БД
$mysql_pass = 'zapadlo';       // Пароль пользователя БД
$mysql_base = 'chudo';     // Имя базы

$err = array();             // Массив с сообщениями об ошибках для показа пользователю при генерации страницы
$ok = array();              // Массив с информационными сообщениями для показа пользователю при генерации страницы

# Временная зона по умолчанию
date_default_timezone_set('Europe/Moscow');
$userewrite=0;
# Если активен режим отладки, то показываем все ошибки и предупреждения
if ($debug) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

//состав
  $menu=array();
  $menu[]=["name"=>"name",
	   "descr"=>"descr",
	   "type"=>"main", //main or dop
	   "structure"=>array("1","2","3"),
	   "weight"=>array("400","500","800"),
	   "cost"=>array(250,300,400),   
	   "images"=>array("1.jpg","2.jpg"),
  ];

  $menu[]=["name"=>"name2",
	   "descr"=>"descr2",
	   "type"=>"main", //main or dop
	   "structure"=>array("1","2","3"),
	   "weight"=>array("400","500","800"),
	   "cost"=>array(250,300,400),    
	   "images"=>array("1.jpg","2.jpg"),
  ];
  $menu[]=["name"=>"name3",
	   "descr"=>"descr3",
	   "type"=>"dop", //main or dop
	   "structure"=>array("1","2","3"),
	   "weight"=>array("400","500","800"),
	   "cost"=>array(250,300,400),    
	   "images"=>array("1.jpg","2.jpg"),
  ];
  

//остальные настройки в inc/config.php

?>
