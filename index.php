<?php
 session_start();
?>
<html>
	<head>
		<title>Home - Nossa Tribo</title>
		<link rel="stylesheet" type="text/css" href="estilo/index3.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, ">
	</head>
	<body>
		<div class="container">
			<div class="conteudoEsquerda">
				<p class="title">BEM-VINDO À</p>
				<img src="imagens\logo.png" class="logo"><Br>
				<p class="subtitle">A comunidade de compras, na palma da mão </p>
			</div>
			<div class="conteudoDireita">
				<p class="titleDireita">ANUNCIE <br> COMPRE <br> INTERAJA <p>
				<form class="form" method="POST" action="./validacoes/processa.php">
					<center>
						<div class="autenticar">
							<?php
								if(isset($_SESSION['msg'])){
									echo $_SESSION['msg'];
									unset ($_SESSION['msg']);
								}
							?>
						</div>
						<input type="text" name="usuario" placeholder="Usuário" required> 
						<input type="password" name="senha" placeholder="Senha" required> <br>
						<a href="paginas/lostPassword.php"> Esqueci minha senha </a><br>
						<button type="submit" value="Entrar" class="btn" onClick="windows.location(mapa.php);">Entrar </button><br>
						Não possui cadastro? <a href="paginas/cadastro.php"> cadastrar-se </a><br>
					</center>
				</form>
			</div>
		</div>
		<div class="rodape">
			<img src="imagens\responsive2.png" class="responsive">
			copy Nossa Tribo - 2020
		</div>
		
		
	</body>
</html>