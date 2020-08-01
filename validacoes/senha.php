<?php
session_start();

	$_CPF= filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$senha= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha2= filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);
	

	if($senha==$senha2){
		$cadastro = [ $_CPF,$senha];
		header("Location: ../index.php");
		$_SESSION['msg'] = "senha alterada com sucesso!";
	}else{
		$_SESSION['msg'] = "As senhas não conferem!";
		header("Location: ../paginas/lostPassword.php");
	}





	
?>