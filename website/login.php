<?php
# MIDDLEWARE PARA GARANTIR QUE APENAS UTILIZADORES NÃO AUTENTICADOS VEJAM A PÁGINA DE LOGIN
require_once __DIR__ . '/../src/middleware/middleware-nao-autenticado.php';

# DEFINI O TÍTULO DA PÁGINA
$titulo = ' - Login';

# INICIA CABECALHO
include_once __DIR__ . '/templates/cabecalho_geral.php';
?>

<body class="">
  <div class="w">
    <main>
      <section >
        <?php
        # MOSTRA AS MENSAGENS DE ERRO CASO LOGIN SEJA INVÁLIDO
        if (isset($_SESSION['erros'])) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
          foreach ($_SESSION['erros'] as $erro) {
            echo $erro . '<br>';
          }
          echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
          unset($_SESSION['erros']);
        }
        ?>
      </section>
      <div class="container">
        <form class="form" action="/src/controlador/website/controlar-autenticacao.php" method="post">
          <h3 class="h3 mb-3 fw-normal text-center">Login</h3>
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="Email" placeholder="Email" name="email" maxlength="255" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>">
            <label for="Email">Endereço de Email</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="palavra_passe" placeholder="Palavra Passe" name="palavra_passe" maxlength="255" value="<?= isset($_REQUEST['palavra_passe']) ? $_REQUEST['palavra_passe'] : null ?>" >
            <label for="palavra_passe">Palavra Passe</label>
          </div>
          <div class="checkbox mb-3">
            <label class="text-white"><input type="checkbox" value="lembra-me">Lembrar-me</label>
          </div>
          <button class="w-100 btn btn-lg btn-success mb-2" type="submit" name="utilizador" value="login">Entrar</button>
        </form>
      </div>
    </main>
    <?php
    include_once __DIR__ . '/templates/rodape_geral.php';
    ?>