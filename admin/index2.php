<?php
# INICIALIZA O REPOSITÓRIO DE NOTICIAS
require_once __DIR__ . '/../src/infraestrutura/basededados/repositorio-noticias.php';

# MIDDLEWARE PARA GARANTIR QUE APENAS ADMNISTRADORES ACESSES ESTA PÁGINA
require_once __DIR__ . '/../src/middleware/middleware-administrador.php';

# FAZ O CARREGAMENTO DE TODAS AS NOTICIAS PARA MOSTRAR AO ADMINISTRADOR
$noticias = lerTodasNoticias();

# CARREGA O CABECALHO PADRÃO COM O TÍTULO
$titulo = ' - Noticias';
require_once __DIR__ . '/templates/cabecalho.php';
?>

<main class="bg-light">
  <section class="py-4">
    <div class="d-flex justify-content">
      <a href="/admin/noticia.php"><button class="btn btn-success px-4 me-2">Criar Noticia</button></a>
      <a href="/website/"><button class="btn btn-info px-2 me-2">Sair Administração</button></a>
      <form action="/src/controlador/website/controlar-autenticacao.php" method="post">
        <button class="btn btn-danger px-4" type="submit" name="noticia" value="logout">Fazer Logout</button>
      </form>
    </div>
  </section>
  <section>   
    <?php
    # MOSTRA AS MENSAGENS DE SUCESSO E DE ERRO VINDA DO CONTROLADOR-UTILIZADOR
    if (isset($_SESSION['sucesso'])) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
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
  <section>
    <div class="table-responsive">
      <table class="table">
        <thead class="table-secondary">
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Texto</th>
            <th scope="col">Gerenciar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          # VARRE TODOS OS UTILIZADORES PARA CONSTRUÇÃO DA TABELA
          foreach ($noticias as $noticia) {
          ?>
            <tr>
              <th scope="row"><?= $noticia['titulo'] ?></th>
              <td><?= $noticia['texto'] ?></td>
              <td>
                <div class="d-flex justify-content">
                  <a href="/src/controlador/admin/controlar-noticias.php?<?= 'noticia=atualizar&id=' . $noticia['id'] ?>"><button type="button" class="btn btn-primary me-2">Atualizar</button></a>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deletar<?= $noticia['id'] ?>">Deletar</button>
                </div>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="deletar<?= $noticia['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Noticia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Esta operação não poderá ser desfeita. Tem certeza que deseja deletar esta noticia?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="/src/controlador/admin/controlar-noticias.php?<?= 'noticia=deletar&id=' . $noticia['id'] ?>"><button type="button" class="btn btn-danger">Confirmar</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fim Modal -->
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>


</main>
<?php
# CARREGA O RODAPE PADRÃO
require_once __DIR__ . '/templates/rodape.php';
?>