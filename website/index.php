<?php
# CARREGA MIDDLEWARE PAGARA GARANTIR QUE APENAS UTILIZADORES AUTENTICADOS ACESSEM ESTE SITIO
require_once __DIR__ . '/../src/middleware/middleware-utilizador.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Início';
require_once __DIR__ . '/templates/cabecalho_geral.php';
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
	
		<!--mensagem do presidente-->
		<h1 class="titulo">
			Mensagem do presidente
		</h1>
		<div class="texto-conteudo wrap">
			<img class="imgfoto" src="/recursos/img/presidente.jpg" alt="Foto de Cabaços">
			<p>
				Abrimos a porta através da qual a freguesia de Cabaços e Fojo Lobal, se apresenta a todos, revelando as suas vertentes mais significativas e relevantes , adquirindo, desta forma, uma dimensão universal. Tendo a noção de que cada vez mais temos de estar atentos às novas tecnologias, a Internet surge como um dos mais importantes meios de comunicação.
				<br>Através deste sítio pretendemos divulgar o que de melhor temos em Cabaços e Fojo Lobal, como seja a sua simplicidade e a sua tranquilidade que resulta numa boa qualidade de vida no sossego desta linda terra.
				<br>Queremos que este sítio seja um meio para fazer chegar as diferentes informações para todos, com clareza, transparência e também com abertura, pois consideramos ser condição obrigatória para se prestar um serviço público de qualidade.
				<br>Iremos, também, por este meio, dar conta do trabalho a ser desenvolvido pela Junta de Freguesia!
				<br>Resta-nos ainda referir que estamos disponíveis para receber os vossas opiniões, pois é da soma de todos os contributos que surgem as melhores ideias, os melhores projectos e as melhores equipas.
				<br>Agradecemos desde já a vossa visita.<br><br>
				<em>António Silvestre Lopes Durães</em>
			</p>
		</div>

		<!--noticias // eventos
		as noticias tao dentro de um grid para organizar por colunas
		-->
		<hr>
		<div class="container text-center">
			<div class="row">
				<div class="col">
					<div class="card text-bg-dark" style="width: 18rem;">
						<img src="/recursos/img/news/irs22.jpg" class="card-img-top" alt="imagem sobre a noticia">
						<div class="card-body">
							<h5 class="card-title">Tudo sobre a entrega do IRS 2022</h5>
							<p class="card-text">Informações sobre a entrega do IRS.</p>
							<a href="noticias.html#irs" class="btn btn-primary">Veja mais!</a>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-dark" style="width: 18rem;">
						<img src="/recursos/img/news/etap_small.png" class="card-img-top" alt="imagem sobre a noticia">
						<div class="card-body">
							<h5 class="card-title">Centro Qualifica da COOPETAPE/ETAP</h5>
							<p class="card-text">Processo formativo da COOPETAPE/ETAP.</p>
							<a href="noticias.html#etap" class="btn btn-primary">Veja mais!</a>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-dark" style="width: 18rem;">
						<img src="/recursos/img/news/fpf_small.png" class="card-img-top" alt="imagem sobre a noticia">
						<div class="card-body">
							<h5 class="card-title">Formação profissional financiada</h5>
							<p class="card-text">Formações modulares certificadas realizadas no edifício da Junta.</p>
							<a href="noticias.html#fpf" class="btn btn-primary">Veja mais!</a>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-bg-dark" style="width: 18rem;">
						<img src="/recursos/img/news/aulas_small.png" class="card-img-top" alt="imagem sobre a noticia">
						<div class="card-body">
							<h5 class="card-title">Aulas de ginástica para a população sénior</h5>
							<p class="card-text">Aulas de atividade física gratuitas para a população sénior.</p>
							<a href="noticias.html#aulas" class="btn btn-primary">Veja mais!</a>
						</div>
					</div>
				</div>
			</div>
		</div>	

		<!--localizaçao no googlemaps-->
		<hr>
		<h1 class="titulo">
			Localização	
		</h1>
		<div class="googlemaps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11917.923260514825!2d-8.574436799999999!3d41.688554950000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25aead7c0df5d1%3A0x37df3b9348925c8d!2zQ2FiYcOnb3M!5e0!3m2!1spt-PT!2spt!4v1680892026243!5m2!1spt-PT!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>	
	</content>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>