<?php

# TRADUÇÃO #
if ( isset($_COOKIE[CLIENTE.'_linguagem']) && !empty($_COOKIE[CLIENTE.'_linguagem']) ){
	$idioma = $_COOKIE[CLIENTE.'_linguagem'];
} else {
	$idioma = 'pt';
	setcookie(CLIENTE.'_linguagem', $idioma, '0', '/');
}
//$idioma = 'en';
//require('en.php');

if ( !isset($idioma) ) {
	require('pt.php');
} elseif ($idioma != 'pt') {
	require($idioma.'.php');
} else {
	require('pt.php');
}

// *.tpl => {'saiba_mais'|trad}
// pt.php => $_LANG['saiba_mais'] = 'Saiba mais';
$smarty->registerPlugin('modifier', 'trad', 'trad');
function trad($string){
	global $_LANG;
	return $_LANG[$string];
}
?>
