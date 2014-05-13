<?php /* Smarty version Smarty-3.1.12, created on 2014-05-13 10:06:21
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:674066999537218cddaef78-75605933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1397050293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '674066999537218cddaef78-75605933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
    'tituloFinal' => 1,
    'analytics' => 0,
    'css_files' => 1,
    'css_uri' => 1,
    'BASE_DIR' => 0,
    'CLIENTE' => 0,
    'ipad' => 0,
    'iphone' => 0,
    'android' => 0,
    'scriptPre' => 1,
    'js_files' => 1,
    'js_uri' => 1,
    'scriptExtra' => 1,
    'navegador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_537218cde8fa40_72198370',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537218cde8fa40_72198370')) {function content_537218cde8fa40_72198370($_smarty_tpl) {?><!DOCTYPE HTML>
<html dir="ltr" lang="pt-br" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="format-detection" content="telephone=no">
<meta name="description" content="SPR Brand, Design, Agency e Digital: quatro maneiras de tratar muito bem de uma marca. Somos quatro empresas trabalhando de forma integrada. (51) 3066.3333" />
<meta name="keywords" content="spr, agência publicidade, propaganda, branding, design gráfico, desenvolvimento sites, sites, posicionamento marca, digital, marketing, digital, redes sociais, links patrocinados, agência digital, e-commerce" />
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
icons/favicon.ico" />
<meta property="og:title" content="SPR - Ousadia Para Ser Memorável" />
<meta property="og:description" content="SPR Brand, Design, Agency e Digital: quatro maneiras de tratar muito bem de uma marca. Somos quatro empresas trabalhando de forma integrada. (51) 3066.3333" />
<meta property="og:url" content="http://spr.com.br/" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
gerais/share.jpg" />


<title><?php echo $_smarty_tpl->tpl_vars['tituloFinal']->value;?>
</title>

<?php if ($_smarty_tpl->tpl_vars['analytics']->value){?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['analytics']->value;?>
']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php }?>

<?php  $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->key => $_smarty_tpl->tpl_vars['css_uri']->value){
$_smarty_tpl->tpl_vars['css_uri']->_loop = true;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="screen" />
<?php } ?>
	<script type="text/javascript">var $BASE_DIR = '<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
', $CLIENTE = '<?php echo $_smarty_tpl->tpl_vars['CLIENTE']->value;?>
', isiPad = '<?php echo $_smarty_tpl->tpl_vars['ipad']->value;?>
', isiPhone = '<?php echo $_smarty_tpl->tpl_vars['iphone']->value;?>
', isiAndroid = '<?php echo $_smarty_tpl->tpl_vars['android']->value;?>
';
	</script>
<?php echo $_smarty_tpl->tpl_vars['scriptPre']->value;?>

<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
<?php } ?>
<?php echo $_smarty_tpl->tpl_vars['scriptExtra']->value;?>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("../erro-js.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php if ($_smarty_tpl->tpl_vars['navegador']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("../erro-navegador.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>


	<div id="wrapper">

		<?php echo $_smarty_tpl->getSubTemplate ('_topo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		 <div id="content">
<?php }} ?>