<?php
# CARREGA O CABECALHO GERAL
$titulo = ' - Onde Comer';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>

<body>
	<content tabindex="0" onclick="closeSidebar()" id="content">

		<!--conteudo da pagina-->
		<h1 class="titulo">
			Pizzaria VIP II
		</h1>
		<div class="wrap texto-conteudo centrar">
			<img class="imgcontent" src="img/pizzaria.jpg" alt="Foto de uma pizza">
			<p>
				Venha conhecer a melhor e unica pizzaria de Cabaços!<br>
				Os melhores pratos aos melhores preços.<br><br>
				<b>Horário:</b><br>
				Segunda-feira - FECHADO<br>
				Terça-feira | 07:00 – 23:00<br>
				Quarta-feira | 07:00 – 22:00<br>
				Quinta-feira | 07:00 – 22:00<br>
				Sexta-feira | 07:00 – 22:00<br>
				Sábado | 07:00 – 22:00<br>
				Domingo | 07:00 – 22:00
			</p>
		</div>
	</content>
	
<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/website/templates/rodape_geral.php';
?>