<?php
// Данный код создан и распространяется по лицензии GPL v3
// Разработчики:
//   Грибов Павел,
//   Сергей Солодягин (solodyagin@gmail.com)
//   (добавляйте себя если что-то делали)
// http://грибовы.рф

/**
 * Массив переданных скрипту параметров при загрузке его через index.php
 * Например, index.php?route=/script.php?par1=value&par2=value2
 * $PARAMS['par1'] = 'value'
 * $PARAMS['par2'] = 'value2'
 */
$PARAMS = array();

/**
 * Возвращает значение $_GET[$name] или $def
 * @param string $name
 * @param string $def
 * @return string
 */
function GetDef($name, $def = '') {
	global $PARAMS;
	if (isset($_GET[$name])) {
		return $_GET[$name];
	} else if (isset($PARAMS[$name])) {
		return $PARAMS[$name];
	} else {
		return $def;
	}
}

/**
 * Возвращает значение $_POST[$name] или $def
 * @param string $name
 * @param string $def
 * @return string
 */
function PostDef($name, $def = '') {
	return (isset($_POST[$name])) ? $_POST[$name] : $def;
}

/** Проверка, а есть ли содержимое $_GET[] и присвоение пустого значения или содержимого
 * @param type $name
 * @return string
 */
function _GET($name) {
	return (isset($_GET[$name])) ? $_GET[$name] : '';
}

/** Проверка, а есть ли содержимое $_POST[] и присвоение пустого значения или содержимого
 * @param type $name
 * @return string
 */
function _POST($name) {
	return (isset($_POST[$name])) ? $_POST[$name] : '';
}

/** на выходе - массив из папок в укзанной папке
 * @param type $dir
 * @return type
 */
function GetArrayFilesInDir($dir) {
	$includes_dir = opendir("$dir");
	$files = array();
	while (($inc_file = readdir($includes_dir)) != false) {
		if (($inc_file != '.') and ( $inc_file != '..')) {
			$files[] = $inc_file;
		}
	}
	closedir($includes_dir);
	sort($files);
	return $files;
}


/** Получить случайный идентификатор длинной $n
 * @param type $n
 * @return string
 */
function GetRandomId($n) { // результат - случайная строка из цифр длинной n
	$id = '';
	for ($i = 1; $i <= $n; $i++) {
		$id .= chr(rand(48, 56));
	}
	return $id;
}

// Преобразует дату типа dd.mm.2012 в формат MySQL 2012-01-01 00:00:00
function DateToMySQLDateTime2($dt) {
	$str_exp = explode('.', $dt);
	//$str_exp2 = explode(" ", $str_exp[2]);
	//$dtt=$str_exp2[0]."-".$str_exp[1]."-".$str_exp[0]." $str_exp2[1]:00";   
	if ((strpos($str_exp[2], ' ') === FALSE)) {
		$dtt = $str_exp[2].'-'.$str_exp[1].'-'.$str_exp[0];
	} else {
		//   echo "$str_exp[2]";
		$st2 = explode(' ', $str_exp[2]);
		$yy = trim($st2[0]);
		$dtt = $yy.'-'.$str_exp[1].'-'.$str_exp[0];
	}
	return $dtt;
}

// Преобразует дату MySQL 2012-01-01 00:00:00 в dd.mm.2012 00:00:00
function MySQLDateTimeToDateTime($dt) {
    if (strlen($dt)==10){$dt=$dt." 00:00:00";};
	$str1 = @explode('-', $dt);
	$str2 = @explode(' ', $str1[2]);
	$dtt = @$str2[0].'.'.@$str1[1].'.'.@$str1[0].' '.@$str2[1];
	return $dtt;
}

// Преобразует дату MySQL 2012-01-01 00:00:00 в dd.mm.2012 00:00:00
function MySQLDateToDate($dt) {
	$str1 = explode('-', $dt);
	$dtt = $str1[2].'.'.$str1[1].'.'.$str1[0];
	return $dtt;
}

// Преобразует дату MySQL 2012-01-01 00:00:00 в dd.mm.2012
function MySQLDateTimeToDateTimeNoTime($dt) {
	$str1 = explode('-', $dt);
	$str2 = explode(' ', $str1[2]);
	$dtt = $str2[0].'.'.$str1[1].'.'.$str1[0];
	return $dtt;
}


function real_date_diff($date1, $date2 = NULL) {
	$diff = array();

	//Если вторая дата не задана принимаем ее как текущую
	if (!$date2) {
		$cd = getdate();
		$date2 = $cd['year'].'-'.$cd['mon'].'-'.$cd['mday'].' '.$cd['hours'].':'.$cd['minutes'].':'.$cd['seconds'];
	}

	//Преобразуем даты в массив
	$pattern = '/(\d+)-(\d+)-(\d+)(\s+(\d+):(\d+):(\d+))?/';
	preg_match($pattern, $date1, $matches);
	$d1 = array((int) $matches[1], (int) $matches[2], (int) $matches[3], (int) $matches[5], (int) $matches[6], (int) $matches[7]);
	preg_match($pattern, $date2, $matches);
	$d2 = array((int) $matches[1], (int) $matches[2], (int) $matches[3], (int) $matches[5], (int) $matches[6], (int) $matches[7]);

	//Если вторая дата меньше чем первая, меняем их местами
	for ($i = 0; $i < count($d2); $i++) {
		if ($d2[$i] > $d1[$i])
			break;
		if ($d2[$i] < $d1[$i]) {
			$t = $d1;
			$d1 = $d2;
			$d2 = $t;
			break;
		}
	}

	//Вычисляем разность между датами (как в столбик)
	$md1 = array(31, $d1[0] % 4 || (!($d1[0] % 100) && $d1[0] % 400) ? 28 : 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$md2 = array(31, $d2[0] % 4 || (!($d2[0] % 100) && $d2[0] % 400) ? 28 : 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$min_v = array(NULL, 1, 1, 0, 0, 0);
	$max_v = array(NULL, 12, $d2[1] == 1 ? $md2[11] : $md2[$d2[1] - 2], 23, 59, 59);
	for ($i = 5; $i >= 0; $i--) {
		if ($d2[$i] < $min_v[$i]) {
			$d2[$i - 1] --;
			$d2[$i] = $max_v[$i];
		}
		$diff[$i] = $d2[$i] - $d1[$i];
		if ($diff[$i] < 0) {
			$d2[$i - 1] --;
			$i == 2 ? $diff[$i] += $md1[$d1[1] - 1] : $diff[$i] += $max_v[$i] - $min_v[$i] + 1;
		}
	}

	//Возвращаем результат
	return $diff;
}


function generate_password($number) {
	$arr = array('a', 'b', 'c', 'd', 'e', 'f',
		'g', 'h', 'i', 'j', 'k', 'l',
		'm', 'n', 'o', 'p', 'r', 's',
		't', 'u', 'v', 'x', 'y', 'z',
		'A', 'B', 'C', 'D', 'E', 'F',
		'G', 'H', 'I', 'J', 'K', 'L',
		'M', 'N', 'O', 'P', 'R', 'S',
		'T', 'U', 'V', 'X', 'Y', 'Z',
		'1', '2', '3', '4', '5', '6',
		'7', '8', '9', '0');
	// Генерируем пароль
	$pass = '';
	for ($i = 0; $i < $number; $i++) {
		// Вычисляем случайный индекс массива
		$index = rand(0, count($arr) - 1);
		$pass .= $arr[$index];
	}
	return $pass;
}

function getLastDayOfMonth($dateInISO8601) {
	// Проверяем дату на корректность
	$date = explode('-', $dateInISO8601);
	if (!checkdate($date[1], $date[2], $date[0]))
		return false;

	$start = new DateTime($dateInISO8601);
	$end = new DateTime($dateInISO8601);
	$end->add(new DateInterval('P2M'));
	$interval = new DateInterval('P1D');
	$daterange = new DatePeriod($start, $interval, $end);

	$prev = $start;
	// Проходимся по периодам, если номер месяца
	// предыдущего периода не совпадает с текущим номером месяца
	// то возвращаем последний день предыдущего месяца
	foreach ($daterange as $date) {
		if ($prev->format('m') != $date->format('m'))
			return (int) $prev->format('d');

		$prev = $date;
	}

	return false;
}


function get_duration_dates($date_from, $date_till) {
	$date_from = explode('-', $date_from);
	$date_till = explode('-', $date_till);

	$time_from = @mktime(0, 0, 0, $date_from[1], $date_from[2], $date_from[0]);
	$time_till = @mktime(0, 0, 0, $date_till[1], $date_till[2], $date_till[0]);

	$diff = ($time_till - $time_from) / 60 / 60 / 24;
	//$diff = date('d', $diff); - как делал))

	return $diff;
}

function generateSalt() {
	$salt = '';
	$length = rand(5, 10); // длина соли (от 5 до 10 сомволов)
	for ($i = 0; $i < $length; $i++) {
		$salt .= chr(rand(33, 126)); // символ из ASCII-table
	}
	return $salt;
}

function jsonExit($data) {
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($data);
	exit;
}

function human_sz($sz) {
	$units = array('Б', 'КБ', 'МБ', 'ГБ', 'ТБ');
	$power = $sz > 0 ? floor(log($sz, 1024)) : 0;
	return number_format($sz / pow(1024, $power), 2, ',', ' ') . ' ' . $units[$power];
}
/**
 * Возвращает сумму прописью
 * https://habrahabr.ru/post/53210/
  */
function num2str($num) {
	$nul='ноль';
	$ten=array(
		array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
		array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
	);
	$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
	$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
	$hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
	$unit=array( // Units
		array('копейка' ,'копейки' ,'копеек',	 1),
		array('рубль'   ,'рубля'   ,'рублей'    ,0),
		array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
		array('миллион' ,'миллиона','миллионов' ,0),
		array('миллиард','милиарда','миллиардов',0),
	);
	//
	list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
	$out = array();
	if (intval($rub)>0) {
		foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1; // unit key
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
			// mega-logic
			$out[] = $hundred[$i1]; # 1xx-9xx
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
			// units without rub & kop
			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		} //foreach
	}
	else $out[] = $nul;
	$out[] = morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
	$out[] = $kop.' '.morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
	return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
}

/**
 * Склоняем словоформу
 * https://habrahabr.ru/post/53210/
 */
function morph($n, $f1, $f2, $f5) {
	$n = abs(intval($n)) % 100;
	if ($n>10 && $n<20) return $f5;
	$n = $n % 10;
	if ($n>1 && $n<5) return $f2;
	if ($n==1) return $f1;
	return $f5;
};

/**
 * Чистим ВООБЩЕ все кукисы установленные
 * @global type $_COOKIE
 */
function UnsetAllCookies(){
    global $_COOKIE;
    foreach ($_COOKIE as $key=>$value) {
    SetCookie("$key","",time()+3600000,'/'); // трем  кукисы..
    };
};

/**
 * Обновляем ВООБЩЕ все кукисы установленные
 * @global type $_COOKIE
 */
function UpdateAllCookies(){
    global $_COOKIE;
    foreach ($_COOKIE as $key=>$value) {
      SetCookie("$key","$value",strtotime('+30 days'),'/');       
    };
};

