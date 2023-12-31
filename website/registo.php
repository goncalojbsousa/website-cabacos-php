<?php
# MIDDLEWARE PARA GARANTIR QUE APENAS UTILIZADORES NÃO AUTENTICADOS VEJAM A PÁGINA DE REGISTO
require_once __DIR__ . '/../src/middleware/middleware-nao-autenticado.php';

# CARREGA O CABECALHO PADRÃO COM O TÍTULO
$titulo = '- Registro';
include_once __DIR__ . '/templates/cabecalho_geral.php';
?>

  <div>
    <main>
      <section>
        <?php
        # MOSTRA AS MENSAGENS DE SUCESSO E DE ERRO VINDA DO CONTROLADOR-UTILIZADOR
        if (isset($_SESSION['sucesso'])) {
          echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">';
          echo $_SESSION['sucesso'] . '<br>';
          echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
          unset($_SESSION['sucesso']);
        }
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
        <form class="form" action="/src/controlador/website/controlar-registo.php" method="post">
          <h3 class="h3 mb-3 fw-normal text-center">Registro</h3>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" name="nome" placeholder="nome" maxlength="255" size="255" value="<?= isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null ?>" required>
            <label for="nome">Nome:</label>
          </div>
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="<?= isset($_REQUEST['email']) ? $_REQUEST['email'] : null ?>">
            <label for="floatingInput">Endereço de Email:</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="palavra_passe" name="palavra_passe" minlength="6" placeholder="Palavra passe">
            <label for="palavra_passe">Palavra Passe:</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control" id="confirmar_palavra_passe" name="confirmar_palavra_passe" minlength="6" placeholder="Confirmar palavra passe">
            <label for="confirmar_palavra_passe">Confirmar Palavra Passe:</label>
          </div>
          <button class="w-100 btn btn-lg btn-success mb-2" type="submit" name="utilizador" value="registo">Registar</button>
        </form>
      </div>
    </main>
    <?php
    include_once __DIR__ . '/templates/rodape_geral.php';
    ?>