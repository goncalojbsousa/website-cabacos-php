<?php
# CARREGA O CABECALHO GERAL
$titulo = ' - Historia';
require_once __DIR__ . '/templates/cabecalho_geral.php';
?>
<body>
	<content tabindex="0" onclick="closeSidebar()" id="content">
	
		<!--conteudo da pagina-->
		<h1 class="titulo">
			Historia de Cabaços
		</h1>
		<div class="wrap texto-conteudo">
			<img class="imgcontent" src="/recursos/img/cabacos_imagemTeste1.jpg" alt="Foto de Cabaços">
			<p>
				Cabaços, situada entre o monte da Nó e o de S. Veríssimo, dista cerca de treze quilómetros da sede do concelho. É composta pelos seguintes lugares principais: Barrosas, Calmario, Carvalhal, Chão, Codessido, Correndelos, Fervenças, Gaioso, Lamas, Mouro, Outeiro, Pedreira, Penelas, Pomarada, Pomarelho, Rua Nova, Soutelo, Tresmonde e Vilela.
				<br>Reza a tradição que a pouco mais de um quilómetro do centro da povoação existiu um convento de monges beneditinos, que foi totalmente arrasado pelos mouros em 718. Ficava situado no lugar chamado Bouça Longa e os frades eram conhecidos pela denominação de frades longos.
				<br>Nesta freguesia nasceu José da Costa Pimenta Jarro. Emigrado no Brasil, logrou amealhar alguns minguados recursos, como oficial de ourives e - conforme descreve o "Almanaque de Ponte de Lima" de 1910 - "levado pela sua grande caridade e animado pelos seu espírito bondoso, quis fazer participar os desgraçados do pequeno pecúlio que entesourara": fundou em Viana, em 15 de Janeiro de 1780, a grandiosa Congregação e Hospital de Velhos e Entrevados de Nossa Senhora da Caridade.
			</p>
		</div>

		<h1 class="titulo2">
			População da freguesia de Cabaços ao longo dos anos
		</h1>
		<div class="table-responsive tabela">
			<table class="table">
				<thead >
					<tr>
					<th scope="col">1864</th>
					<th scope="col">1878</th>
					<th scope="col">1890</th>
					<th scope="col">1900</th>
					<th scope="col">1911</th>
					<th scope="col">1920</th>
					<th scope="col">1930</th>
					<th scope="col">1940</th>
					<th scope="col">1950</th>
					<th scope="col">1960</th>
					<th scope="col">1970</th>
					<th scope="col">1981</th>
					<th scope="col">1991</th>
					<th scope="col">2001</th>
					<th scope="col">2011</th>
					</tr>
				</thead>
				<tbody class="table-group-divider">
					<tr>
					<td>651</td>
					<td>668</td>
					<td>642</td>
					<td>670</td>
					<td>732</td>
					<td>740</td>
					<td>718</td>
					<td>836</td>
					<td>965</td>
					<td>890</td>
					<td>834</td>
					<td>868</td>
					<td>800</td>
					<td>703</td>
					<td>671</td>
					</tr>
				</tbody>
			</table>
		</div>
	</content>

<?php
# CARREGA O RODAPE GERAL
require_once __DIR__ . '/templates/rodape_geral.php';
?>