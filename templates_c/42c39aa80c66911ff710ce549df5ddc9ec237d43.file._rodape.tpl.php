<?php /* Smarty version Smarty-3.1.12, created on 2014-05-13 10:06:22
         compiled from "templates/_rodape.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1751935311537218ce161fa5-56283445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42c39aa80c66911ff710ce549df5ddc9ec237d43' => 
    array (
      0 => 'templates/_rodape.tpl',
      1 => 1397241419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1751935311537218ce161fa5-56283445',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'redes_sociais' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_537218ce179429_39347236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537218ce179429_39347236')) {function content_537218ce179429_39347236($_smarty_tpl) {?><footer id="footer">
	<div class="container">
		<ul id="socialUl">
			<li class="socialLi">
				<a class="socialIcone social_facebook geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['facebook'];?>
"></a>
			</li>
			<li class="socialLi">
				<a class="socialIcone social_pinterest geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['pinterest'];?>
"></a>
			</li>
			<li class="socialLi">
				<a class="socialIcone social_linkedin geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['linkedin'];?>
"></a>
			</li>
			<li class="socialLi">
				<a class="socialIcone social_instagram geralTransition" data-rel="blank" href="<?php echo $_smarty_tpl->tpl_vars['redes_sociais']->value['instagram'];?>
"></a>
			</li>
		</ul>
		<span id="direitos">@2014 - SPR</span>
	</div>
</footer><?php }} ?>