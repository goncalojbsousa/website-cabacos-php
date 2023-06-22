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

# ABAIXO UM ARRAY SIMULANDO A DADOS DE UMA NOTICIA 
$noticia = [
    'titulo' => 'Evento Caetano Auto Rally Experience Ponte de Lima - Restrições ao trânsito',
    'texto' => 'A Junta de Freguesia de Cabaços e Fojo Lobal informa que nos dias 30 de setembro, 1 e 2 de outubro de 2022 devido a realização do evento Caetano Auto Rally Experience Ponte de Lima na nossa freguesia, irão haver restrições ao trânsito na Rua de Além das 9h00 às 13h00 e de 14h00 às 18h00. Durante este horário a rua vai estar cortada ao trânsito pelas autoridades, desta forma aconselhamos a quem necessite circular nesta via que tente encontrar alternativa.',
    'foto' => '/../../recursos/img/news/uploads/foto_64906cf933db0.jpg'
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