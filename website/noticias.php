<?php
# INICIALIZA O REPOSITÓRIO DE NOTICIAS
require_once __DIR__ . '/../src/infraestrutura/basededados/repositorio-noticias.php';

# CARREGA O CABECALHO GERAL
$titulo = ' - Noticias';
require_once __DIR__ . '/templates/cabecalho_geral.php';

#ORDENA POR NOTICIAS MAIS RECENBTES
$sql = $pdo->query("SELECT * FROM noticias ORDER BY id DESC");
$noticias = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<body>	
	<content tabindex="0" onclick="closeSidebar()" id="content">
		<h1 class="titulo">
			Noticias mais recentes
		</h1>

		<div class="wrapper">
			<?php foreach($noticias as $noticia): ?>
				<div class="">
					<?php echo '<img class="img_news" src="' . $noticia['foto'] . '" alt="" align="left" width="200" height="200">';?>
					<h3><?= $noticia['titulo']; ?></h3>
					<p><?= $noticia['texto']; ?></p>
					<hr>
				</div>
			<?php endforeach; ?>
		</div>		

		<!--conteudo da pagina-->
		<!--
		<div class="wrapper">
			<div class="text-box textnews" id="irs">
				<img class="img_news" src="/recursos/img/news/irs22.jpg" alt="imagem sobre a noticia">
				<h2>Entrega IRS 2022</h2>
				<p class="textnews">A entrega do IRS em 2023, relativo aos rendimentos do ano 2022, é realizada no período compreendido entre o dia 1 de abril e o dia 30 de junho, independentemente da categoria de rendimentos.
					Estão dispensados de entregar IRS os contribuintes que tenham recebido rendimentos de trabalho dependente ou pensões até 8.500 euros durante o ano de 2022.
				<br>A Junta de Freguesia, dentro do horário normal de atendimento ou outro a combinar, prestará o apoio necessário para o preenchimento e/ou submissão da declaração de rendimentos.
				</p>
			</div>
			<hr>
			<div class="text-box textnews" id="etap">
				<img class="img_news" src="/recursos/img/news/etap.png" alt="imagem sobre a noticia">
				<h2>Centro Qualifica da COOPETAPE/ETAP</h2>
				<p class="textnews">
					A COOPETAPE/ETAP Escola Profissional tem em funcionamento um Centro Qualifica com sede em Ponte de Lima para a Certificação Escolar (Ensino Básico e Ensino Secundário) e para a Certificação Profissional de nível 2 e nível 4, nas áreas formativas da sua competência e onde, historicamente, tem acrescentado valor à economia, empresas e pessoas através da formação que ministra.
					Nesse sentido a Junta de Freguesia de Cabaços e Fojo Lobal assinou um protocolo com a ETAP para ministrar formação na nossa sede. Esta parceria visa:
					<br><br>
					a) certificar as competências resultantes da experiência profissional e das suas múltiplas vivências nos mais variados contextos;
					<br>
					b) desenvolver formações que complementem os saberes adquiridos ao longo da vida e permitam, dessa forma, melhorar os seus desempenhos nas empresas e na sociedade.
					<br><br>
					Sendo um processo formativo, o Reconhecimento, Validação e Certificação de Competências (RVCC) e as Formações Modulares (formações de 25 e/ou 50 horas), constituem um diagnóstico das necessidades de formação, pelo que podem ser desenvolvidas ao abrigo das horas de formação anual estabelecidas no Código do Trabalho, e sem custos para a empresa/instituição. De acordo com a Portaria n.º 61/2022, de 31 de janeiro que regula o Reconhecimento, a Validação e a Certificação de Competências (RVCC), na qual é introduzida a medida "Acelerador Qualifica" que visa apoiar financeiramente os adultos que através de um processo de RVCC concluam uma das seguintes qualificações:
					<br>
					1 - 3.º ciclo do ensino básico (B3);
					2 - Ensino secundário (S);
					3 - Certificação Profissional de Nível 2, desde que tenha a escolaridade correspondente (9º ano);
					4 - Certificação Profissional de Nível 4, desde que tenha a escolaridade correspondente (12º ano).
					<br>
					O valor único do apoio a ser atribuído aos adultos que sejam certificados é de 554€. Mais informações na sede da junta de freguesia.
				</p>
			</div>
			<hr>
			<div class="text-box textnews" id="fpf">
				<img class="img_news" src="/recursos/img/news/fpf_small.png" alt="imagem sobre a noticia">
				<h2>Formação profissional financiada</h2>
				<p class="textnews">
					A Junta de Freguesia de Cabaços e Fojo Lobal pretende levar a cabo 3 Formações Modulares Certificadas. Realizadas no edifício da Junta de Freguesia, em Cabaços, a estas formações serão atribuídas um certificado de qualificação bem como um subsídio de alimentação, de 4,77€ / dia.
					<br>
					Informa-se mais ainda que todos os interessados em realizar a sua inscrição deverão possuir o 9º ano de escolaridade ou superior. As inscrições deverão ser realizadas nos edifícios da Junta de Freguesia.
				</p>
			</div>	
			<hr>
			<div class="text-box textnews" id="aulas">
				<img class="img_news" src="/recursos/img/news/aulas_small.png" alt="imagem sobre a noticia">
				<h2 >Aulas de ginástica para a população sénior</h2>
				<p class="textnews">
					A Junta de Freguesia de Cabaços e Fojo Lobal informa que irão iniciar em Cabaços, aulas de atividade física gratuitas para a população sénior. As aulas irão decorrer às segundas e quartas-feiras às 09:15h, no Edifício da Junta de Freguesia. Têm inicio no dia 2 de Novembro e serão gratuitas, com o apoio da Junta de Freguesia. Destinam- se a todas as pessoas da freguesia com mais de 50 anos e reformadas.
					<br>
					Quem tiver interesse em participar, por favor inscrevas-se na sede da junta de freguesia.
				</p>
			</div>
			<hr>
			<div class="text-box textnews">
				<img class="img_news" src="/recursos/img/news/evento_small.png" alt="imagem sobre a noticia">
				<h2>Evento Caetano Auto Rally Experience Ponte de Lima - Restrições ao trânsito</h2>
				<p class="textnews">
					A Junta de Freguesia de Cabaços e Fojo Lobal informa que nos dias 30 de setembro, 1 e 2 de outubro de 2022 devido a realização do evento Caetano Auto Rally Experience Ponte de Lima na nossa freguesia, irão haver restrições ao trânsito na Rua de Além das 9h00 às 13h00 e de 14h00 às 18h00. Durante este horário a rua vai estar cortada ao trânsito pelas autoridades, desta forma aconselhamos a quem necessite circular nesta via que tente encontrar alternativa.
				</p>
			</div>
		</div>
		*/
	</content>-->

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>