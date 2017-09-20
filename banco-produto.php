<?php
require_once('conecta.php');
require_once("class/Produto.php");
function listaProdutos($conexao) {

    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome 
        from produtos as p join categorias as c on c.id=p.categoria_id");

    while($produto_array = mysqli_fetch_assoc($resultado)) {

        $produto = new Produto();

        $produto->nome = $produto_array['nome'];
        $produto->preco = $produto_array['preco'];
        $produto->descricao = $produto_array['descricao'];
        $produto->categoria = $produto_array['categoria_nome'];
        $produto->usado = $produto_array['usado'];

        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $produto)
{
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
        values ('{$nome}', {$produto->preco}, '{$descricao}', 
            {$produto->categoria_id}, {$produto->usado})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id)
{
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id)
{
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)
{
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', 
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return mysqli_query($conexao, $query);
}