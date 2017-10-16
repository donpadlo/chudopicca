<?php
// Данный код создан и распространяется по лицензии GPL v3
// Разработчики:
//   Грибов Павел,
//   Сергей Солодягин (solodyagin@gmail.com)
//   (добавляйте себя если что-то делали)
// http://грибовы.рф

define('WUO_ROOT', dirname(__FILE__));

// Загружаем первоначальные настройки. Если не получилось - запускаем инсталлятор
$rez = @include_once(WUO_ROOT.'/config.php');

$time_start = microtime(true); // Засекаем время начала выполнения скрипта

header('Content-Type: text/html; charset=utf-8');

// Загружаем классы
include_once(WUO_ROOT.'/class/sql.php'); // Класс работы с БД
include_once(WUO_ROOT.'/class/config.php'); // Класс работы с конфигами

// Загружаем все что нужно для работы движка
include_once(WUO_ROOT.'/inc/connect.php');   // Соединяемся с БД, получаем $mysql_base_id
include_once(WUO_ROOT.'/inc/config.php');   // получаем оновные настройки
include_once(WUO_ROOT.'/inc/functions.php'); // Загружаем функции

// Если указан маршрут, то подключаем указанный в маршруте скрипт и выходим
if (isset($_GET['route'])) {
	$uri = $_SERVER['REQUEST_URI'];
	// Удаляем лишнее
	if (strpos($uri, '/route') === 0) {
		$uri = substr($uri, 6);
	} else {
		$pos = strpos($uri, '?route=');
		if ($pos) {
			$uri = substr($uri, $pos + 7);
		}
	}
	// Получаем путь до скрипта ($route) и переданные ему параметры ($PARAMS)
	// иначе ссылка вида index.php?route=/controller/server/lanbilling/sos/vlan_hist.php&blibase=1
	// обрабатывается не корректно!	
	$uri_tmp=explode("&", $uri);
	$uri= $uri_tmp[0]; //отсекаем из пути, всё что правее знака &	
	list($route, $p) = array_pad(explode('?', $uri, 2), 2, null);
	if ($p) {
		parse_str($p, $PARAMS);
	}
	// Разрешаем подключать php-скрипты только из каталога /controller
	if ((strpos($route, '/controller') !== 0) || (strpos($route, '..') !== false)) {
		die("Запрещён доступ к '$route'");
	}
	// Подключаем запрашиваемый скрипт		
	if (is_file(WUO_ROOT.$route)) {
		// Разрешаем доступ только выполнившим вход пользователям
		if ($user->id == '') {
			die('Доступ ограничен');
		}
		include_once(WUO_ROOT.$route);
	} else {
		die("На сервере отсутствует указанный путь '$route'");
	}
	exit();
};


$content_page = (isset($_GET['content_page'])) ? $_GET['content_page'] : 'home';

// Загружаем и выполняем сначала /modules/$content_page.php, затем /controller/client/themes/$cfg->theme/$content_page.php
// Если таких файлов нет, то принудительно выполняем только /controller/client/themes/$cfg->theme/home.php
if (!is_file(WUO_ROOT."/controller/client/themes/$cfg->theme/$content_page.php")) {
	$content_page = 'home';
	$err[] = 'Вы попытались открыть несуществующий раздел!';
}
if (!is_file(WUO_ROOT."/modules/$content_page.php")) {
	@include_once(WUO_ROOT.'/modules/home.php');
} else {
	include_once(WUO_ROOT."/modules/$content_page.php");
}

// Загружаем главный файл темы, который разруливает что отображать на экране
include_once(WUO_ROOT."/controller/client/themes/$cfg->theme/index.php");

