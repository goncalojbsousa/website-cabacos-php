<?php
# INSERE DADOS DA CONEXÃO COM O PDO
require_once __DIR__ . '/criar-conexao.php';

/**
 * FUNÇÃO RESPONSÁVEL POR INTRODUZIR NOTICIA
 */
function criarNoticia($noticia)
{
    # INSERE NOTICIA
    $sqlCreate = "INSERT INTO 
        noticias (
            titulo, 
            texto, 
            foto) 
        VALUES (
            :titulo, 
            :texto, 
            :foto
        )";

    # PREPARA A QUERY
    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    # EXECUTA A QUERY RETORNANDO VERDADEIRO SE CRIAÇÃO FOI FEITA
    $sucesso = $PDOStatement->execute([
        ':titulo' => $noticia['titulo'],
        ':texto' => $noticia['texto'],
        ':foto' => $noticia['foto']
    ]);

    # RECUPERA ID DA NOTICIA CRIADA
    if ($sucesso) {
        $noticia['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    # RETORNO RESULTADO DA INSERSÃO 
    return $sucesso;
}

/**
 * FUNÇÃO RESPONSÁVEL POR LER UM NOTICIA
 */
function lerNoticia($id)
{
    # PREPARA A QUERY
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT * FROM noticias WHERE id = ?;');

    # FAZ O BIND
    $PDOStatement->bindValue(1, $id, PDO::PARAM_INT);

    # EXECUTA A CONSULTA
    $PDOStatement->execute();

    # RETORNA OS DADOS
    return $PDOStatement->fetch();
}

/**
 * FUNÇÃO RESPONSÁVEL POR RETORNAR TOAS AS NOTICIAS
 */
function lerTodasNoticias()
{
    # PREPARA A QUERY
    $PDOStatement = $GLOBALS['pdo']->query('SELECT * FROM noticias;');

    # ININIA ARRAY DE NOTICIAS
    $noticias = [];

    # PERCORRE TODAS AS LINHAS TRAZENDO OS DADOS
    while ($listaDeNoticias = $PDOStatement->fetch()) {
        $noticias[] = $listaDeNoticias;
    }

    # RETORNA NOTICIAS
    return $noticias;
}

/**
 * FUNÇÃO RESPONSAVEL POR ATUALIZAR OS DADOS DE UM UTILIZADOR NO SISTEMA
 */
function atualizarNoticia($noticia)
{
        # ATUALIZA NOTICIA
        $sqlUpdate = "UPDATE  
        noticias SET
            titulo = :titulo, 
            texto = :texto, 
            foto = :foto 
        WHERE id = :id;";

        $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

        # EXECUTA A QUERY RETORNANDO VERDADEIRO SE CRIAÇÃO FOI FEITA
        return $PDOStatement->execute([
            ':titulo' => $noticia['titulo'],
            ':texto' => $noticia['texto'],
            ':foto' => $noticia['foto']
        ]);
}

/**
 * FUNÇÃO RESPONSÁVEL POR DELETAR UMA NOTICIA DO SISTEMA
 */
function deletarNoticia($id)
{
    # PREPARA A CONSULTA
    $PDOStatement = $GLOBALS['pdo']->prepare('DELETE FROM noticias WHERE id = ?;');

    # REALIZA O BIND
    $PDOStatement->bindValue(1, $id, PDO::PARAM_INT);

    # EXECUTA A CONSULTA E RETORNA OS DADOS
    return $PDOStatement->execute();
}
