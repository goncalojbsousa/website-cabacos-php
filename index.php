<?php
# MIDDLEWARE PARA GARANTIR QUE APENAS UTILIZADORES NÃO AUTENTICADOS VEJAM A PÁGINA DE LOGIN
require_once __DIR__ . '/src/middleware/middleware-nao-autenticado.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Início';
require_once __DIR__ . '/website/templates/cabecalho_geral.php';
?>

	<content tabindex="0" onclick="closeSidebar()" id="content">
		<!--Slide de imagens        -->
		<div id="carouselExampleCaptions" class="carousel slide">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active c-item">
					<img src="/recursos/img/cabacos_imagemTeste1.jpg" class="d-block w-100 c-img" alt="Fotografia aerea de Cabaços">
					<div class="carousel-caption d-none d-md-block">
						<h5>Bem-Vindo a Cabaços!</h5>
						<p>Encontre aqui todas as informações que necessita sobre a nossa freguesia</p>
					</div>
				</div>
				<div class="carousel-item c-item">
					<img src="/recursos/img/igrejacabacos.jpg" class="d-block w-100 c-img" alt="Igreja de Cabaços">
					<div class="carousel-caption d-none d-md-block">
						<h5>Bem-Vindo a Cabaços!</h5>
						<p>Encontre aqui todas as informações que necessita sobre a nossa freguesia.</p>
					</div>
				</div>
				<div class="carousel-item c-item">
					<img src="/recursos/img/cabacos_junta.jpg" class="d-block w-100 c-img" alt="Junta de freguesia de cabaços">
					<div class="carousel-caption d-none d-md-block">
						<h5>Bem-Vindo a Cabaços!</h5>
						<p>Encontre aqui todas as informações que necessita sobre a nossa freguesia.</p>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<br>

		<!--aviso login-->
		
		<div class="container-fluid py-5 text-center">
			<h2 class="pb-2">Para mais informações efetue o login ou registre-se caso não tenha conta!</h2>
			<p class="pb-4">Efetue o login para obter acesso a informaçoes extra sobre a freguesia, como noticias atualizadas, dados historicos, localização do google maps, onde comer, horarios da paroquia e muito mais!</p>
			<?php
					if (!autenticado()) {
						echo '<div d-flex justify-content>
							<a href="/website/login.php"><button type="button" class="btn btn-success btn-lg">Login</button></a>
							<a href="/website/registo.php"><button class="btn btn-primary btn-lg">Registo</button></a>
						</div>';
					}
			?>
		</div>	

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/website/templates/rodape_geral.php';
?>