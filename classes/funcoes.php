<?php
function ConectarBanco() {
	$CB_conexaoBanco = @mysql_connect(DB_HOST,DB_USER,DB_PASS) or exit(mysql_error());
	$CB_baseDeDados	 = @mysql_select_db(DB_BASE,$CB_conexaoBanco) or exit(mysql_error());
}

function FecharBanco() {
	mysql_close() or exit(mysql_error());
}

function ExecutarSQL($sql) {
	$colecao = mysql_query($sql) or exit($sql."<br>".mysql_error());
	return $colecao;
}

function Consultar($dados) {
	$colecaoNova = array();
		while($colecao = mysql_fetch_array($dados)) {
			array_push($colecaoNova,$colecao);
		}
	return $colecaoNova;
}

function ConsultarSQL($sql){
	$colecao = ExecutarSQL($sql);
	$colecaoNova = Consultar($colecao);
	return $colecaoNova;
}

function DataAtualBanco() {
	$dataatual = ExecutarSQL("SELECT CURDATE()");
	$dataatual = Consultar($dataatual);
	return $dataatual[0][0];
}

function DiaAtualBanco() {
	$dataatual = DataAtualBanco();
	return (int) $dataatual[8].$dataatual[9];
}

function MesAtualBanco() {
	$dataatual = DataAtualBanco();
	return (int) $dataatual[5].$dataatual[6];
}

function AnoAtualBanco() {
	$dataatual = DataAtualBanco();
	return (int) $dataatual[0].$dataatual[1].$dataatual[2].$dataatual[3];
}

function HoraAtualBanco() {
	$horaatual = ExecutarSQL("SELECT CURTIME()");
	$horaatual = Consultar($horaatual);
	return $horaatual[0][0];
}

function UltimoDiaMes($mes, $ano) {
	$mes = (int) $mes;
	$ano = (int) $ano;
	if(empty($mes) || $mes < 1 || $mes > 12)
		return null;
	if(empty($ano) || $ano < 1901 || $ano > 2099)
		return null;
	$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
	$ano = str_pad($ano, 4, "0", STR_PAD_LEFT);
	$ultimoDiaMes = ExecutarSQL("SELECT LAST_DAY('$ano-$mes-01')");
	$ultimoDiaMes = Consultar($ultimoDiaMes);
	$ultimoDiaMes = $ultimoDiaMes[0][0];
	return (int) $ultimoDiaMes[8].$ultimoDiaMes[9];
}

function Data($string, $format = '%d/%m/%Y', $default_date = '', $formatter='auto') {
	if ($string != '') {
		$timestamp = smarty_make_timestamp($string);
	} elseif ($default_date != '') {
		$timestamp = smarty_make_timestamp($default_date);
	} else {
		return;
	}
	if($formatter=='strftime'||($formatter=='auto'&&strpos($format,'%')!==false)) {
		if (DS == '\\') {
			$_win_from = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
			$_win_to = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');
			if (strpos($format, '%e') !== false) {
				$_win_from[] = '%e';
				$_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
			}
			if (strpos($format, '%l') !== false) {
				$_win_from[] = '%l';
				$_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
			}
			$format = str_replace($_win_from, $_win_to, $format);
		}
		return strftime($format, $timestamp);
	} else {
		return date($format, $timestamp);
	}
}

function smarty_make_timestamp($string) {
	if(empty($string)) {
		return time();
	} elseif ($string instanceof DateTime) {
		return $string->getTimestamp();
	} elseif (preg_match('/^\d{14}$/', $string)) {
		// it is mysql timestamp format of YYYYMMDDHHMMSS?
		return mktime(substr($string, 8, 2),substr($string, 10, 2),substr($string, 12, 2),
					substr($string, 4, 2),substr($string, 6, 2),substr($string, 0, 4));
	} elseif (is_numeric($string)) {
		// it is a numeric string, we handle it as timestamp
		return (int)$string;
	} else {
		// strtotime should handle it
		$time = strtotime($string);
		if ($time == -1 || $time === false) {
			// strtotime() was not able to parse $string, use "now":
			return time();
		}
		return $time;
	}
}

function Truncate($string, $length = 80, $etc = '...', $break_words = false, $middle = false) {
	if ($length == 0)
		return '';

	if (is_callable('mb_strlen')) {
		if (mb_detect_encoding($string, 'UTF-8, ISO-8859-1') === 'UTF-8') {
			// $string has utf-8 encoding
			if (mb_strlen($string) > $length) {
				$length -= min($length, mb_strlen($etc));
				if (!$break_words && !$middle) {
					$string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length + 1));
				}
				if (!$middle) {
					return mb_substr($string, 0, $length) . $etc;
				} else {
					return mb_substr($string, 0, $length / 2) . $etc . mb_substr($string, - $length / 2);
				}
			} else {
				return $string;
			}
		}
	}

	if (strlen($string) > $length) {
		$length -= min($length, strlen($etc));
		if (!$break_words && !$middle) {
			$string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
		}
		if (!$middle) {
			return substr($string, 0, $length) . $etc;
		} else {
			return substr($string, 0, $length / 2) . $etc . substr($string, - $length / 2);
		}
	} else {
		return $string;
	}
}

function EvitarInjecao($dado) {
	$colecaoProibida = array(
		"=", "+", "{", "}", "/",
		"\\", "\"", "'", "?", "<", ">",
		"delete", "DELETE", "update", "UPDATE",
		"insert", "INSERT", "select", "SELECT",
		"0=0", "1=1", ";", "drop", "DROP",
		"show tables", "SHOW TABLES", "where",
		"WHERE", "or=", "OR=", "or =",
		"OR =", "and=", "and =", "AND=",
		"AND ="
	);
	$dado = str_replace($colecaoProibida, "", $dado);
	return $dado;
}

function TentativaInjecao($dado) {
	$colecaoProibida = array(
		"=", "+", "{", "}", "/",
		"\\", "\"", "'", "?", "<", ">",
		"delete", "DELETE", "update", "UPDATE",
		"insert", "INSERT", "select", "SELECT",
		"0=0", "1=1", ";", "drop", "DROP",
		"show tables", "SHOW TABLES", "where",
		"WHERE", "or=", "OR=", "or =",
		"OR =", "and=", "and =", "AND=",
		"AND ="
	);
	if(in_array($dado,$colecaoProibida)){
		return true;
	} else {
		return false;
	}
}

function RandomString($length = 10, $letters = '1234567890QWERTYUIOPASDFGHJKLZXCVBNM[]?@<>.') {
	$s = '';
	$lettersLength = strlen($letters)-1;
	for($i = 0 ; $i < $length ; $i++){
		$s .= $letters[rand(0,$lettersLength)];
	}
	return $s;
}

function RemoveAcentos($str, $enc = 'ISO-8859-1'){
	$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/',
		'-'	=> '/ |\\/|\\\/',
		''	=> '/\\%|\\:|\\,|\\./'
	);
	$str = strtolower(preg_replace($acentos, array_keys($acentos), htmlentities($str, ENT_NOQUOTES, $enc)));
	$str = preg_replace("([^0-9a-z\-])", "", $str);
	$str = preg_replace("(-+)", "-", $str);
	return $str;
}

function OrderArray ($array, $index, $order='asc', $natsort=FALSE, $case_sensitive=FALSE) {
	if(is_array($array) && count($array)>0) {
		foreach(array_keys($array) as $key) $temp[$key]=$array[$key][$index];
		if(!$natsort) ($order=='asc')? asort($temp) : arsort($temp);
		else {
			($case_sensitive)? natsort($temp) : natcasesort($temp);
			if($order!='asc') $temp=array_reverse($temp,TRUE);
		}
		foreach(array_keys($temp) as $key) (is_numeric($key))? $sorted[]=$array[$key] : $sorted[$key]=$array[$key];
		return $sorted;
	}
	return $array;
}

function printr	($arr){
	print "<pre>";
	print_r($arr);
	print "</pre>";
}

function ShuffleArray($list) {
	if (!is_array($list)) return $list;
	$keys = array_keys($list);
	shuffle($keys);
	$random = array();
	foreach ($keys as $key)
		$random[$key] = $list[$key];
	return $random;
}

?>
