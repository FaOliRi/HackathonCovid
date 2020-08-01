<?php
 session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="../estilo/alterSenha.css">
				<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, ">
		<title> </title>
	</head>
	<body>
		<div class="container">
			<div class="left-Column">
				<h2 class="hTitle">Olá!</h2>
				<p>Para prosseguir com a alteração de senha, insira o e-mail cadastrado e enviaremos um código de autenticação.</P><p>Nos vemos na Tribo!</p>
			</div>
			<div class="Right-Column">

				<h2 class="hSubtitle">Alterar Senha</h2>
				<form class="form" method="POST" action="../validacoes/senha.php">
				<div class=autenticar>
					<?php
						if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset ($_SESSION['msg']);
						}
					?>
				</div>
					<input type="text" name="cpf" required placeholder="CPF">
					<input type="password" name="senha" required placeholder="Nova Senha">
					<input type="password" name="senha2" required placeholder="Repita a Senha">
					<button class="btn-cadastrar">Alterar</button>
				</form>
			</div>
			
		</div>
	</body>
</html>