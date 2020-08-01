<?php
session_start();
	$nome= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$_CPF= filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$logra= filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
	$_EMAIL= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$telef= filter_input(INPUT_POST, 'telef', FILTER_SANITIZE_STRING);
	$cep= filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
	$senha= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$senha2= filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);

	if($senha==$senha2){
		$cadastro = [$nome, $_CPF, $logra, $email, $telef, $cep, $senha];
		
		header("Location: ../index.php");
		$_SESSION['msg'] = "cadastro realizado com sucesso!";
	}else{
		$_SESSION['msg'] = "As senhas não conferem!";
		header("Location: ../paginas/cadastro.php");
	}
	
?>