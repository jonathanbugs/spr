<!DOCTYPE HTML>
<html dir="ltr" lang="pt-br" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="format-detection" content="telephone=no">
<meta name="description" content="SPR Brand, Design, Agency e Digital: quatro maneiras de tratar muito bem de uma marca. Somos quatro empresas trabalhando de forma integrada. (51) 3066.3333" />
<meta name="keywords" content="spr, agência publicidade, propaganda, branding, design gráfico, desenvolvimento sites, sites, posicionamento marca, digital, marketing, digital, redes sociais, links patrocinados, agência digital, e-commerce" />
<link rel="shortcut icon" href="{$IMG_DIR}icons/favicon.ico" />
<meta property="og:title" content="SPR - Ousadia Para Ser Memorável" />
<meta property="og:description" content="SPR Brand, Design, Agency e Digital: quatro maneiras de tratar muito bem de uma marca. Somos quatro empresas trabalhando de forma integrada. (51) 3066.3333" />
<meta property="og:url" content="http://spr.com.br/" />
<meta property="og:image" content="{$IMG_DIR}gerais/share.jpg" />


<title>{$tituloFinal}</title>

{if $analytics}
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '{$analytics}']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
{/if}

{foreach $css_files as $css_uri}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="screen" />
{/foreach}
	<script type="text/javascript">var $BASE_DIR = '{$BASE_DIR}', $CLIENTE = '{$CLIENTE}', isiPad = '{$ipad}', isiPhone = '{$iphone}', isiAndroid = '{$android}';
	</script>
{$scriptPre}
{foreach $js_files as $js_uri}
	<script type="text/javascript" src="{$js_uri}"></script>
{/foreach}
{$scriptExtra}
</head>
<body>
	{include file="../erro-js.php"}

	{if $navegador}
		{include file="../erro-navegador.php"}
	{/if}


	<div id="wrapper">

		{include file='_topo.tpl'}

		 <div id="content">
