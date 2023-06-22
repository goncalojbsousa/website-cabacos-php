<?php

####################
### DEPENDÊNCIAS ###
####################
require_once(realpath(dirname(__FILE__) . '/../../infraestrutura/basededados/repositorio-noticias.php'));
require_once __DIR__ . '/../../validacao/admin/validar-noticias.php';
require_once __DIR__ . '/../../auxiliadores/auxiliador.php';


##############
### VERBOS ###
##############

# VERBOS POST
## CONTROLA A ROTA PARA CRIAÇÃO E ATUALIZAÇÃO DE UMA NOTICIA NA PÁGINA NOTICIA
if (isset($_POST['noticia'])) {

    ## CONTROLA A CRIAÇÃO DE NOVAS NOTICIAS
    if ($_POST['noticia'] == 'criar') {

        # CRIA UMA NOTICIA
        criar($_POST);
    }

    ## CONTROLA A ATUALIZAÇÃO DE DADOS DAS NOTICIAS
    if ($_POST['noticia'] == 'atualizar') {

        # ATUALIZA UMA NOTICIA
        atualizar($_POST);
    }
}

# VERBOS GET
## CONTROLA A ROTA PARA O CARREGAMENTO DE UMA NOTICIA NA PÁGINA ATUALIZAR-NOTICIA
if (isset($_GET['noticia'])) {

    ## CONTROLA A ROTA PARA A CRIAÇÃO DE NOVAS NOTICIAS
    if ($_GET['noticia'] == 'atualizar') {

        # RECUPERA DADOS DA NOTICIA PELO ID RECEBIDO
        $noticia = lerNoticia($_GET['id']);

        # CRIA A SESSÃO AÇÃO ATUALIZAR PARA MANIPULAR O BOTÃO DE ENVIO DO FORMULÁRIO NOTICIA
        # ESSA ESTRATÉGIA FOI EXPLICADO NO FICHEIRO NOTICIA.PHP
        $noticia['acao'] = 'atualizar';

        # ENVIA PARÂMETROS COM DADOS DA NOTICIAS PARA A PÁGINA NOTICIAS RECUPERAR DADOS PARA MANIPULAR A ALTERAÇÃO
        $params = '?' . http_build_query($noticia);

        header('location: /../admin/noticia.php' . $params);
    }

    ## CONTROLA A ROTA PARA A EXCLUSÃO DE NOTICIAS
    if ($_GET['noticia'] == 'deletar') {

        # RECUPERA DADOS DA NOTICIA
        $noticia = lerNoticia($_GET['id']);

        # ELIMINA NOTICIA
        $sucesso = deletar($noticia);

        # REDIRECIONA NOTICIA PARA PÁGINA ADMIN COM MENSAGEM DE SUCCESO
        if ($sucesso) {
            # DEFINE MENSAGEM DE SUCESSO
            $_SESSION['sucesso'] = 'Noticia eliminada com sucesso!';

            # REDIRECIONA UTILIZADOR COM DADOS DO FORMULÁRIO ANTERIORMENTE PREENCHIDO
            header('location: /../admin/index2.php');
        }
    }
}

###############
### FUNÇÕES ###
###############

/**
 * FUNÇÃO RESPONSÁVEL POR CRIAR UMA NOVA NOTICIA
 */
function criar($requisicao)
{
    # VALIDA DADOS DA NOTICIA. FICHEIRO VALIDAÇÃO->APLICAÇAO->ADMIN->VALIDAR-NOTICIA.PHP
    $dados = noticiaValida($requisicao);

    # VERIFICA SE EXISTEM ERROS DE VALIDAÇÃO
    if (isset($dados['invalido'])) {

        # RECUPERA MENSAGEM DE ERRO, CASO EXISTA, E COLOCA EM SESSÃO PARA RECUPERANÃO NO FORMULARIO NOTICIA
        $_SESSION['erros'] = $dados['invalido'];

        # RECUPERA DADOS DO FORMULÁRIO PARA RECUPERAR PREENCHIMENTO ANTERIOR
        $params = '?' . http_build_query($requisicao);

        # REDIRECIONA UTILIZADOR COM DADOS DO FORMULÁRIO ANTERIORMENTE PREENCHIDO
        header('location: /../admin/noticia.php' . $params);

        return false;
    }

    # GARDA FOTO EM DIRETÓRIO LOCAL (FUNÇÃO LOCAL)
    $dados = guardaFoto($dados);

    # GUARDA NOTICIA NA BASE DE DADOS (REPOSITÓRIO PDO)
    $sucesso = criarNoticia($dados);

    # REDIRECIONA UTILIZADOR PARA PÁGINA DE REGISTO COM MENSAGEM DE SUCCESO
    if ($sucesso) {

        # DEFINE MENSAGEM DE SUCESSO
        $_SESSION['sucesso'] = 'Noticia criada com sucesso!';

        # REDIRECIONA O UTILIZADO PARA A PÁGINA ADMIN
        header('location: /../admin/index2.php');
    }
}

/**
 * FUNÇÃO RESPONSÁVEL POR ATUALIZAR UMA NOTICIA
 */
function atualizar($requisicao)
{
    # VALIDA DADOS DA NOTICIA
    $dados = noticiaValida($requisicao);

    # VERIFICA SE EXISTEM ERROS DE VALIDAÇÃO
    if (isset($dados['invalido'])) {

        # RECUPERA MENSAGEM DE ERRO, CASO EXISTA
        $_SESSION['erros'] = $dados['invalido'];

        # CRIA A SESSÃO AÇÃO ATUALIZAR PARA MANIPULAR O BOTÃO DE ENVIO DO FORMULÁRIO NOTICIAS
        $_SESSION['acao'] = 'atualizar';

        # RECUPERA DADOS DO FORMULÁRIO PARA RECUPERAR PREENCHIMENTO ANTERIOR
        $params = '?' . http_build_query($requisicao);

        # REDIRECIONA NOTICIAS COM DADOS DO FORMULÁRIO ANTERIORMENTE PREENCHIDO
        header('location: /../admin/noticia.php' . $params);

        return false;
    }

    # RECUPERA DADOS DA NOTICIA
    $noticia = lerNoticia($dados['id']);

    # GARDA FOTO EM DIRETÓRIO LOCAL E APAGA A FOTO ANTIGA ORIUNDA DA REQUISIÇÃO (FUNÇÃO LOCAL)
    if (!empty($_FILES['foto']['name'])) {
        $dados = guardaFoto($dados, $requisicao);
    }

    # ATUALIZA NOTICIAS (REPOSITÓRIO PDO)
    $sucesso = atualizarNoticia($dados);

    # REDIRECIONA NOTICIAS PARA PÁGINA DE ALTERAÇÃO COM MENSAGEM DE SUCCESO
    if ($sucesso) {

        # DEFINE MENSAGEM DE SUCESSO
        $_SESSION['sucesso'] = 'Noticia alterada com sucesso!';

        # DEFINI BOTÃO DE ENVIO DO FORMULÁRIO
        $dados['acao'] = 'atualizar';

        # RECUPERA DADOS DO FORMULÁRIO PARA RECUPERAR PREENCHIMENTO ANTERIOR
        $params = '?' . http_build_query($dados);

        # REDIRECIONA NOTICIAS COM DADOS DO FORMULÁRIO ANTERIORMENTE PREENCHIDO
        header('location: /../admin/noticia.php' . $params);
    }
}

/**
 * FUNÇÃO RESPONSÁVEL POR DELETAR UM NOTICIAS
 */
function deletar($noticia)
{
    # DEFINE O CAMINHO DO FICHEIRO
    $caminhoFicheiro = __DIR__ . '/../../../recursos/img/news/uploads/';

    # VALIDA DADOS DO NOTICIAS
    $retorno = deletarNoticia($noticia['id']);

    # COMANDO PARA APAGAR O FICHEIRO
    unlink($caminhoFicheiro . $noticia['foto']);

    # RETORNA RESULTADO DO BANCO DE DADOS
    return $retorno;
}

/**
 * FUNÇÃO RESPONSÁVEL POR GARDAR FICHEIROS DE FOTOS NO DIRETÓRIO
 */
function guardaFoto($dados, $fotoAntiga = null)
{
    $nomeFicheiro = $_FILES['foto']['name'];
    $ficheiroTemporario = $_FILES['foto']['tmp_name'];
    $extensao = pathinfo($nomeFicheiro, PATHINFO_EXTENSION);
    $extensao = strtolower($extensao);
    $novoNome = uniqid('foto_') . '.' . $extensao;

    $caminhoRelativo = '/recursos/img/news/uploads/';
    $caminhoCompleto = $_SERVER['DOCUMENT_ROOT'] . $caminhoRelativo . $novoNome;

    if (move_uploaded_file($ficheiroTemporario, $caminhoCompleto)) {
        $dados['foto'] = $caminhoRelativo . $novoNome;

        if (isset($dados['noticia']) && ($dados['noticia'] == 'atualizar' || $dados['noticia'] == 'perfil')) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $fotoAntiga['foto']);
        }
    }

    return $dados;
}