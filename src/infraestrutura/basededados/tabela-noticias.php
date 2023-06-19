<?php
# TRATA-SE DE UMA FORMA RÁPIDA PARA REINICIAR O BANCO DE DADOS EM AMBIENTE DE DESENVOLVIMENTO
# ESTE FICHEIRO NÃO DEVE ESTAR DISPONÍVEL EM PRODUÇÃO

# INSERE DADOS DA CONEXÃO COM O PDO UTILIZANDO SQLITE

require __DIR__ . '/criar-conexao.php';

# APAGA TABELA SE ELA EXISTIR
$pdo->exec('DROP TABLE IF EXISTS noticias;');

echo 'Tabela noticias apagada!' . PHP_EOL;

# CRIA A TABELA NOTICIAS
$pdo->exec(
    'CREATE TABLE noticias (
    id INTEGER PRIMARY KEY, 
    titulo CHAR, 
    texto CHAR, 
    foto CHAR NULL);'
);

echo 'Tabela noticias criada!' . PHP_EOL;

# ABAIXO UM ARRAY SIMULANDO A DADOS DE UM UTILIZADOR 
$noticia = [
    'titulo' => 'Gonçalo',
    'texto' => 'Sousa',
    'foto' => null
];

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

echo 'Noticia padrão criado!';
?>