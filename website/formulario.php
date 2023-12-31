<?php
# CARREGA MIDDLEWARE PAGARA GARANTIR QUE APENAS UTILIZADORES AUTENTICADOS ACESSEM ESTE SITIO
require_once __DIR__ . '/../src/middleware/middleware-utilizador.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Formulario';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>

	<!--conteudo da pagina-->
	<content tabindex="0" onclick="closeSidebar()" id="content">
		<div class="container">
			<form class="form" onsubmit="sendEmail(); reset(); return false;">
				<h3>Formulario de pedido</h3>
				<input type="text" id="name" placeholder="Seu nome" maxlength="255" size="255" required>
				<input type="email" id="email" placeholder="Insira o seu e-mail" required>
				<input type="text" id="phone" placeholder="Insira o seu numero de telemovel" maxlength="9" required>
				<textarea id="mensagem" rows="5" placeholder="Como podemos ajudar?"></textarea>
				<button type="submit">Enviar</button>
			</form>
		</div>
	</content>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>