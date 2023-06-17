<?php
# CARREGA O CABECALHO GERAL
$titulo = ' - Formulario';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>

<body>
	<!--conteudo da pagina-->
	<content tabindex="0" onclick="closeSidebar()" id="content">
		<div class="container">
			<form onsubmit="sendEmail(); reset(); return false;">
				<h3>Formulario de pedido</h3>
				<input type="text" id="name" placeholder="Seu nome" required>
				<input type="email" id="email" placeholder="Insira o seu e-mail" required>
				<input type="text" id="phone" placeholder="Insira o seu numero de telemovel" required>
				<textarea id="mensagem" rows="5" placeholder="Como podemos ajudar?"></textarea>
				<button type="submit">Enviar</button>
			</form>
		</div>
	</content>
	<script src="js/script.js"></script>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>