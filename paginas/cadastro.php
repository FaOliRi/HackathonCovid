<?php
 session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="../estilo/cadastro.css">
				<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, ">
		
		<title> </title>
	</head>
	<body>
		<div class="container">
		
			<div class="left-Column">
				<h2 class="hTitle">Olá!</h2>
				<p>Para fazer parte da comunidade é fácil, basta preencher os campos conforme solicitado. </p><p>Nos vemos na Tribo!</p>
			</div>
			<div class="Right-Column">
				<h2 class="hSubtitle">Criar Conta</h2>
				<form class="form" method="POST" action="../validacoes/cadastrar.php">
					<div class=autenticar>
						<?php
							if(isset($_SESSION['msg'])){
								echo $_SESSION['msg'];
								unset ($_SESSION['msg']);
							}
						?>
					</div>
					<input type="text" name="nome" placeholder="Nome Completo" required>
					<input type="text" name="cpf" placeholder="CPF" required>
					<input type="text" name="logradouro" placeholder="Logradouro" required>
					<input type="email" name="email" placeholder="E-mail" required>
					<input type="tel" name="telef" maxlength="11" required placeholder="Telefone">
					<input type="cep" name="cep" required placeholder="CEP">
					<input type="password" name="senha" placeholder="Senha">
					<input type="password" name="senha2" placeholder="Repita a Senha">
					<button class="btn-cadastrar">Cadastrar</button>
				</form>
			</div>
			
		</div>
	</body>
</html>