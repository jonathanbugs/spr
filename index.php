<?php
require('configs/config.php');

# GETs #
if( isset($_GET['pagina']) ){ $pagina = $_GET['pagina']; $sessao = $_GET['pagina']; }
	else { $pagina = ''; $sessao = 'inicial'; }
if( isset($_GET['interna']) ){ $paginaInterna = $_GET['interna']; }
	else { $paginaInterna = ''; }
$smarty->assign('pagina',$pagina,true);
$smarty->assign('sessao',$sessao,true);
$smarty->assign('paginaInterna',$paginaInterna,true);
(isset($_POST['ajax'])) ? $ajax=true : $ajax=false;

if( TentativaInjecao($sessao) ){
	die('Tentativa de MySQL Injection Bloqueada.');
} elseif ( !file_exists($sessao.'.php') ) {
	header('location: '.BASE_DIR.'erro-404.php');
}

# PAGE LOCATION #
require_once($sessao.'.php');
$smarty->assign('menu',$menu,true);


# TITULO DA PÁGINA #
$tituloFinal = null;
if ($subtag && !$pagina){ $tituloFinal .= $subtag.' | '; }
if ($paginaInterna){ $tituloFinal .=  $paginaTit.' | '.$navegacao.' | '; }
if ($pagina && !$paginaInterna){ $tituloFinal .=  $paginaTit.' | '; }
$tituloFinal .=  $title;
if ($subtitle && !$pagina){ $tituloFinal .=  ' - '.$subtitle; }
$smarty->assign('tituloFinal',$tituloFinal,true);

# TPLs #
if(!$ajax) $smarty->display('header.tpl');
$smarty->display($sessao.'.tpl');
if(!$ajax) $smarty->display('footer.tpl');

# FECHAR BANCO #
// FecharBanco();
?>
