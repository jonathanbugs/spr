<?php
### Configuracoes do Projeto
define('PROJETO','spr');
define('CLIENTE','spr');

### Configuracoes de Meta Tags do Site
$title = 'SPR - Ousadia Para Ser Memorável';
$subtag = '';
$subtitle = '';
$description = '';
$keywords = '';
$analytics = '';

### Redes Sociais
$redes_sociais = array(
//	facebook / twitter / youtube / flickr / gplus / instagram / pinterest
	'facebook' => 'http://www.facebook.com/agenciaspr',
	'pinterest' => 'http://www.pinterest.com/grupospr/',
	'linkedin' => 'http://br.linkedin.com/company/spr_3',
	'instagram' => 'http://instagram.com/monstrodacavernaspr'
);

### Informacoes de Contato
$contato = array(
	'DDD' => '+55 51',
	'Fone' => '3066.3333',
	'FoneLink' => '+555130663333',
	'Email' => 'spr@spr.com.br'
);

$endereco = array(
	'Rua' => 'Av. Dr. Maurício Cardoso',
	'Numero' => '1240',
	'CEP' => '93510-250',
	'Bairro' => 'Hamburgo Velho',
	'Cidade' => 'Novo Hamburgo',
	'Estado' => 'RS',
	'Pais' => 'Brasil'
);

if(PROJETO == ''){ die('Verifique o arquivo config.php e preencha corretamente as informa&ccedil;&otilde;es.'); }

### Configuracoes de Diretorio
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) or preg_match('/^10.0./', $_SERVER['HTTP_HOST']) ){
	define('ROOT','/'.PROJETO.'/');
	define('ROOT_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
	define('BASE_DIR','http://'.$_SERVER['HTTP_HOST'].ROOT.'');
} else {
	define('ROOT','/');
	define('ROOT_DIR','http://'.$_SERVER['HTTP_HOST'].''.ROOT.'');
	define('BASE_DIR','http://'.$_SERVER['HTTP_HOST'].''.ROOT.'');
}
define('JS_DIR',BASE_DIR.'js/');
define('IMG_DIR',BASE_DIR.'img/');
define('CSS_DIR',BASE_DIR.'css/');
define('TPL_DIR',BASE_DIR.'templates/');
define('PHP_ROOT',dirname(dirname(__FILE__)));
define('MIDIA_ROOT',PHP_ROOT.'/midia/');
define('MIDIA_DIR',ROOT_DIR.'midia/');
define('CLASS_DIR',PHP_ROOT.'/classes/');

### Configuracoes do Smarty
require_once(PHP_ROOT.'/smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';
$smarty->caching = false;
$smarty->cache_lifetime = 3600;
$smarty->force_compile = true;
$smarty->compile_check = true;
$smarty->debugging = false;

## Configuracoes de projeto Smarty
$smarty->assign('PROJETO',PROJETO);
$smarty->assign('CLIENTE',CLIENTE);

### Configuracoes de diretorio Smarty
$smarty->assign('ROOT_DIR',ROOT_DIR);
$smarty->assign('BASE_DIR',BASE_DIR);
$smarty->assign('JS_DIR',JS_DIR);
$smarty->assign('IMG_DIR',IMG_DIR);
$smarty->assign('CSS_DIR',CSS_DIR);
$smarty->assign('TPL_DIR',TPL_DIR);
$smarty->assign('MIDIA_DIR',MIDIA_DIR);

### Configuracoes do Banco
require_once(PHP_ROOT.'/configs/database.php');

### Classes PHP
require_once(PHP_ROOT.'/classes/funcoes.php');
require_once(PHP_ROOT.'/classes/funcoes_projeto.php');
//ConectarBanco();
// require_once(PHP_ROOT.'/linguagem/traducao.php');

### Arrays de Javascript e CSS
$css_files = array(
	CSS_DIR.'template.css'
);
$js_files = array(
	JS_DIR.'jquery.js',
	JS_DIR.'plugins.js',
	JS_DIR.'funcoes.js'
);
$scriptPre = '';
$scriptExtra = '';
$scriptRodape = '';

if(!isset($ajax)){
	### Assigns
	$smarty->assign('title',$title);
	$smarty->assign('subtag',$subtag);
	$smarty->assign('subtitle',$subtitle);
	$smarty->assign('description',$description);
	$smarty->assign('subject',$subject);
	$smarty->assign('abstract',$abstract);
	$smarty->assign('keywords',$keywords);
	$smarty->assign('charset',$charset);
	$smarty->assign('analytics',$analytics);
	$smarty->assign('redes_sociais', $redes_sociais);
	$smarty->assign('css_files', $css_files, true);
	$smarty->assign('js_files', $js_files, true);
	$smarty->assign('scriptPre',$scriptPre, true);
	$smarty->assign('scriptExtra',$scriptExtra, true);
	$smarty->assign('scriptRodape',$scriptRodape, true);
	$smarty->assign('contato',$contato);
	$smarty->assign('endereco',$endereco);
}


### liveReload - http://livereload.com
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) or preg_match('/^10.0./', $_SERVER['HTTP_HOST']) ){
	$liveReload = "<script src=\"http://$_SERVER[HTTP_HOST]:35729/livereload.js?ext=Chrome&extver=2.0.9\"></script>";
	if(isset($redirect) && $redirect !== $_SERVER['HTTP_REFERER'])
		$liveReload .= "<script>window.location.href = '$redirect';</script>";
	$smarty->assign('liveReload',$liveReload);
}


### Navegador
$navegador = (preg_match('/MSIE 6.0|MSIE 7.0|MSIE 8.0/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false ;
$smarty->assign('navegador',$navegador);

$ipad = (preg_match('/iPad/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false ;
$smarty->assign('ipad',$ipad);

$iphone = (preg_match('/iPhone/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false ;
$smarty->assign('iphone',$iphone);

$android = (preg_match('/android/i', $_SERVER['HTTP_USER_AGENT'])) ? true : false ;
$smarty->assign('android',$android);
?>
