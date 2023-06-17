<?php
# CARREGA O CABECALHO GERAL
$titulo = ' - Executivo';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>

<body>
	<content tabindex="0" onclick="closeSidebar()" id="content">
        
        <h1 class="titulo">Executivos</h1>
		<div class="executivo texto-conteudo">
			<div>
				<img src="/recursos/img/presidente.jpg" class="imgexecutivo" alt="Foto do presidente da Junta de Cabaços">
				<p>António Silvestre Lopes Durães</b>
				<br>Presidente</p>
			</div>
			<div>
				<img src="/recursos/img/secretario.jpeg" class="imgexecutivo" alt="Foto do secretario da Junta de Cabaços">
				<p>João Vieira dos Santos</b>
				<br>Secretário</p>
			</div>
			<div>
				<img src="/recursos/img/tesoureira.jpg" class="imgexecutivo" alt="Foto da tesoureira  da Junta de Cabaços">
				<p>Ana Cristina de Oliveira Pinto Silva</b>
				<br>Tesoureira</p>
			</div>
		</div>
	</content>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>