<?php
# CARREGA MIDDLEWARE PAGARA GARANTIR QUE APENAS UTILIZADORES AUTENTICADOS ACESSEM ESTE SITIO
require_once __DIR__ . '/../src/middleware/middleware-utilizador.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Paróquia';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>

	<content tabindex="0" onclick="closeSidebar()" id="content">

		<!--conteudo da pagina-->
		<h1 class="titulo">
			Paróquia de Cabaços
		</h1>
		<div class="wrap texto-conteudo centrar">
			<img class="imgcontent" src="/recursos/img/igrejacabacos.jpg" alt="Foto da igreja de Cabaços">
			<p>
				Pároco: Pe. Agostinho de A. Pinto de Barros<br>
				Telefone: 258 763 513<br><br>
				<b>Horário:</b><br>
				Quarta-feira: 20h00<br>
				Quinta-feira: 20h00<br>
				Sexta-feira: 20h00<br>
				Sábado: 20h00<br>
				Domingo: 10h30<br>
			</p>
		</div>
	</content>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>