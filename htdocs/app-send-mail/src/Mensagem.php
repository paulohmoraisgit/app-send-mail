<?php
	class Mensagem {
		private $para = '';
		private $assunto = '';
		private $mensagem = '';
		public $status = array( 'codigo' => 0, 'descricao' => '' );
		
		public function __get($atributo) {
			return $this->$atributo;
		}
		
		public function __set($atributo, $valor) {
			return $this->$atributo = $valor;
		}
		
		public function pegarDadosMensagem() {
			require_once './pegar_dados_mensagem.php';
		}
		
		public function executarPhpMailer() {
			require_once '../../../privatedocs/app-send-mail/src/executar_phpmailer.php';
		}
	}
?>