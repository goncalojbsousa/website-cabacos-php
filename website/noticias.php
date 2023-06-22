<?php
# INICIALIZA O REPOSITÓRIO DE NOTICIAS
require_once __DIR__ . '/../src/infraestrutura/basededados/repositorio-noticias.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Noticias';
require_once __DIR__ . '/templates/cabecalho_geral.php';

#ORDENA POR NOTICIAS MAIS RECENTES
$noticias = ordenaNoticia();
?>

	<content tabindex="0" onclick="closeSidebar()" id="content">
		<h1 class="titulo">
			Noticias mais recentes
		</h1>

		<!-- FOREACH PARA RODAR E APRESENTAR TODAS AS NOTICIAS-->
		<div class="wrapper">
			<?php foreach($noticias as $noticia): ?>
				<div id="<?= $noticia['id']; ?>">
					<?php echo '<img class="pb-3 pe-3" src="' . $noticia['foto'] . '" alt="" align="left" width="300" height="200">';?>
					<h3><?= $noticia['titulo']; ?></h3>
					<p><?= $noticia['texto']; ?></p>
					<hr>
				</div>
			<?php endforeach; ?>
		</div>		

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>