<?php /* Smarty version Smarty-3.1.12, created on 2014-05-13 10:06:21
         compiled from "templates/_topo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2046977119537218cde9ad26-86919999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b9331a1b79c2af12eb8cdecd4323cbd20e19b3b' => 
    array (
      0 => 'templates/_topo.tpl',
      1 => 1399382988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2046977119537218cde9ad26-86919999',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
    'BASE_DIR' => 0,
    'title' => 0,
    'redes_sociais' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_537218cdedc9a2_52752271',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537218cdedc9a2_52752271')) {function content_537218cdedc9a2_52752271($_smarty_tpl) {?><header id="header" class="parallax bgCover">
	<span class="maskMenu"></span>

	<div id="bannerTopo">
		<ul id="fotos" data-cycle-fx='fade' data-cycle-slides="li" data-cycle-swipe='true' data-cycle-log='false' data-cycle-timeout='0' data-cycle-pager="#pager">
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
banner/1.jpg" alt="" />
			</li>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
banner/1.jpg" alt="" />
			</li>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
banner/1.jpg" alt="" />
			</li>
		</ul>
		<div id="pager"></div>
	</div>

	<div id="blocoLogoMenu" class="geralTransition clearfix">
		<div class="container">
			<div class="containerGeral">
				<h1 id="logo">
					<a class="logoLink" href="<?php echo $_smarty_tpl->tpl_vars['BASE_DIR']->value;?>
">
						<img class="logoImg" src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/logo.png" data-src2x="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logos/logo_2x.png" alt="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"/>
					</a>
				</h1>

				<a id="btMenu" href="javascript:;">
					<span class="icone icon_menu"></span>
				</a>

				<nav id="navMenu">
					<ul id="menuUl">
						<li class="menuLi menuLiMenu menuLiMenuFirst">
							<a class="menuLink geralTransition" href="#sobre">Sobre</a>
						</li>
						<li class="menuLi menuLiMenu">
							<a class="menuLink geralTransition" href="#clientes">Clientes</a>
						</li>
						<li class="menuLi menuLiMenu">
							<a class="menuLink geralTransition" href="#trabalhos">Trabalhos</a>
						</li>
						<li class="menuLi menuLiMenu menuLiMenuLast">
							<a class="menuLink geralTransition" href="#contato">Contato</a>
						</li>
						<li class="menuLi">
							<a class="menuIcone social_facebook geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['facebook'];?>
"></a>
						</li>
						<li class="menuLi">
							<a class="menuIcone social_pinterest geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['pinterest'];?>
"></a>
						</li>
						<li class="menuLi">
							<a class="menuIcone social_linkedin geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['linkedin'];?>
"></a>
						</li>
						<li class="menuLi">
							<a class="menuIcone social_instagram geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['instagram'];?>
"></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="containerGeral">
			<h2 id="tituloOusadia">
				<span>Ousadia para</span>
				<span>ser memorável</span>
			</h2>

			<h2 id="tituloOusadiaMobile">
				<span>Ousadia</span>
				<span>para ser</span>
				<span>memorável</span>
			</h2>
		</div>
	</div>
</header>
<?php }} ?>