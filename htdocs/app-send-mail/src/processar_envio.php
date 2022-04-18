<?php
	require_once './validar_acesso.php';
	require_once './Mensagem.php';

	use Mensagem as Mensagem;
	
	$mensagem = new Mensagem();
	$mensagem->pegarDadosMensagem();	
	$mensagem->executarPhpMailer();

	require_once '../enviado.php';
?>