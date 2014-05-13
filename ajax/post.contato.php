<?php
require_once('../configs/config.php');
require_once('../classes/class.phpmailer.php');

$assuntoEmail = utf8_decode('SPR - Contato pelo site');
$TO = array(
	// 'contato@spr.com.br'
	//'guilherme@sprdigital.com.br'
);
$CC = array(
);
$BCC = array(
	// 'jonathan@sprdigital.com.br',
	// 'guilherme@sprdigital.com.br'
);

$nome     = trim($_POST['nome']);
$email    = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$mensagem = nl2br(trim($_POST['mensagem']));

$mensagemHTML = "
<strong>Nome:     </strong> $nome  <br />
<strong>Email:    </strong> $email    <br />
<strong>Telefone: </strong> $telefone <br />
<br/>
____________________________________  <br />
<br />$mensagem
";

$sqlNome     = htmlentities(utf8_decode($nome));
$sqlMensagem = htmlentities(utf8_decode($mensagem));

/*ExecutarSQL("INSERT INTO _spr_contatos SET
				Nome     = '$sqlNome',
				Email    = '$email',
				Telefone = '$telefone',
				Mensagem = '$sqlMensagem'
			");*/

if($nome!==''&&$email!==''){
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 0;
	$mailer->Port = 587;
	$mailer->Host = 'pod51028.outlook.com';
	$mailer->SMTPSecure = 'tls';
	$mailer->SMTPAuth = true;
	// $mailer->Username = 'site@ibasa.com.br';
	// $mailer->Password = 'SITEibasa123';
	// $mailer->SetFrom('site@ibasa.com.br');
	// $mailer->Username = 'app@ibasa.com.br';
	// $mailer->Password = '@ibasa2014';
	// $mailer->SetFrom('app@ibasa.com.br');
	$mailer->AddReplyTo($email);
	if(count($TO)>0){ foreach ($TO as $mail) {
		$mailer->AddAddress($mail);
	} }
	if(count($CC)>0){ foreach ($CC as $mail) {
		$mailer->AddCC($mail);
	} }
	if(count($BCC)>0){ foreach ($BCC as $mail) {
		$mailer->AddBCC($mail);
	} }
	$mailer->Subject = $assuntoEmail;
	$mailer->MsgHTML(utf8_decode($mensagemHTML));

	if($mailer->Send()){
		print(1);
	} else {
		echo $mailer->ErrorInfo;
	}
} else {
	print(0);
}
?>
