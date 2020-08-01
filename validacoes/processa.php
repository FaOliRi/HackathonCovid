<?php
session_start();

	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	$usuarioBanco =0;
	$usuarioBanco =  [['admin' , 'admin'] , ['Eduardo' , 123] , ['Thalita' , 123] , [ 'Fabricio', 123] , ['Andre' , 123] , ['Adriano' , 123]] ; 
	


for($cont=0; $cont<6; $cont++){
	if($usuario==$usuarioBanco[$cont][0] && $senha==$usuarioBanco[$cont][1]){
		header("Location: ../paginas/mapa.php");
		$_SESSION_USER['msg'] = "usuario".$usuario;
		break;
	}else{
		$_SESSION['msg'] = "Usuario ou senha incorreto";
		header("Location: ../index.php");
	}
}


	
?>