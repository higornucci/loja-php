<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 21/09/2017
 * Time: 09:47
 */

class ProdutoDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    function listaProdutos($conexao)
    {

        $produtos = array();
        $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome 
		from produtos as p join categorias as c on c.id=p.categoria_id");

        while ($produto_array = mysqli_fetch_assoc($resultado)) {

            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];

            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

            $produto->setId($produto_array['id']);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function insereProduto($conexao, Produto $produto)
    {

        $nome = mysqli_real_escape_string($conexao, $produto->getNome());
        $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
		values ('{$nome}', {$produto->getPreco()}, 
			'{$descricao}', {$produto->getCategoria()->getId()}, 
				{$produto->isUsado()})";

        return mysqli_query($conexao, $query);
    }

    function alteraProduto($conexao, Produto $produto)
    {
        $nome = mysqli_real_escape_string($conexao, $produto->getNome());
        $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
        $query = "update produtos set nome = '{$nome}', 
		preco = {$produto->getPreco()}, descricao = '{$descricao}', 
			categoria_id= {$produto->getCategoria()->getId()}, 
				usado = {$produto->isUsado()} where id = '{$produto->getId()}'";

        return mysqli_query($conexao, $query);
    }

    function buscaProduto($conexao, $id)
    {

        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categoria_id']);

        $nome = $produto_buscado['nome'];
        $preco = $produto_buscado['preco'];
        $descricao = $produto_buscado['descricao'];
        $usado = $produto_buscado['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_buscado['id']);

        return $produto;
    }

    function removeProduto($conexao, $id)
    {

        $query = "delete from produtos where id = {$id}";

        return mysqli_query($conexao, $query);
    }
}