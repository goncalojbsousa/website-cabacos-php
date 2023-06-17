<?php
session_start();

####################
### DEPENDÊNCIAS ###
####################
require_once __DIR__ . '/../../infraestrutura/basededados/repositorio-utilizador.php';
require_once __DIR__ . '/../../validacao/website/validar-registo.php';

##############
### VERBOS ###
##############

# VERBOS POST
## CONTROLA A CRIAÇÃO E ATUALIZAÇÃO DE UM UTILIZADOR NA PÁGINA UTILIZADOR
if (isset($_POST['utilizador'])) {

    ## CONTROLA O LOGIN DE UTILIZADORES
    if ($_POST['utilizador'] == 'registo') {

        # CRIA UM UTILIZADOR
        registo($_POST);
    }
}

/**
 * FUNÇÃO RESPONSÁVEL POR FAZER O LOGIN DE UM UTILIZADOR
 */
function registo($requisicao)
{
    # VALIDA DADOS DO UTILIZADOR
    $dados = validarRegisto($requisicao);

    # VERIFICA SE EXISTEM ERROS DE VALIDAÇÃO
    if (isset($dados['invalido'])) {

        # RECUPERA MENSAGEM DE ERRO, CASO EXISTA, E COLOCA EM SESSÃO PARA RECUPERANÃO NO FORMULARIO UTILIZADOR
        $_SESSION['erros'] = $dados['invalido'];

        # RECUPERA DADOS DO FORMULÁRIO PARA RECUPERAR PREENCHIMENTO ANTERIOR
        $params = '?' . http_build_query($requisicao);

        # REDIRECIONA UTILIZADOR COM DADOS DO FORMULÁRIO ANTERIORMENTE PREENCHIDO
        header('location: /../website/registo.php' . $params);
    } else {

        # GUARDA UTILIZADOR NA BASE DE DADOS (REPOSITÓRIO PDO)
        $utilizador = registarUtilizador($dados);

        # REDIRECIONA UTILIZADOR PARA PÁGINA DE REGISTO COM MENSAGEM DE SUCCESO
        if ($utilizador) {

            # FAZ LOGIN DE UTILIZADOR
            $_SESSION['id'] = $utilizador['id'];
            $_SESSION['nome'] = $utilizador['nome'];
            
            // 30 Dias = Data atual + 60 minutos * 60 segundos * 24 horas * 30 dias
            setcookie("id", $dados['id'], time() + (60 * 60 * 24 * 30), "/");
            setcookie("nome", $dados['nome'], time() + (60 * 60 * 24 * 30), "/");



            # DEFINE MENSAGEM DE SUCESSO
            $_SESSION['sucesso'] = 'Bem-vindo(a) ao nosso sistema. Por vaor, atualize o seu perfil.';

            # REDIRECIONA O UTILIZADO PARA A PÁGINA ADMIN
            header('location: /../../website/perfil.php');
        }
    }
}
