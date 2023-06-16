<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="/website/css/styles.css">
	<link rel="shortcut icon" href="/recursos/img/logo.png" type="image/x-icon">
	<title>Cabaços<?= $titulo ?? NULL ?></title>
</head>

<body>
	<header>
		<!--Header-->
		<div class="header" id="header">
			<button onclick="toggleSidebar()" class="btn_iconHeader">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				</svg>
			</button>
			<div class="logo_header">
				<a href="index.html"><img src="/recursos/img/logo.png" class="img_logo" alt="Brasão da freguesia de cabaços"></a>
			</div>
			<ul class="navigation_header" id="navigation_header">
				<button onclick="toggleSidebar()" class="btn_iconHeader">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
						<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
					</svg>
				</button>
				<a href="../index.php"><button type="button" class="btn btn-outline-light">Início</button></a>
				<!--botão com varias opcões-->
				<li class="nav-item dropdown">
					<button class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Freguesia
					</button>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li><a class="dropdown-item" href="historia.html">História</a></li>
						<li><a class="dropdown-item" href="noticias.html">Noticias</a></li>
						<li><a class="dropdown-item" href="ondecomer.html">Onde Comer</a></li>
						<li><a class="dropdown-item" href="/website/paroquia.php">Paróquia</a></li>
						<li><a class="dropdown-item" href="executivo.html">Executivo</a></li>
					</ul>
				</li>
                <a href="/website/paroquia.php"><button type="button" class="btn btn-outline-light">Paróquia</button></a>
				<a href="formulario.html"><button type="button" class="btn btn-outline-light">Pedidos</button></a>
			</ul>
		</div>
	</header>
