<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 21/09/2017
 * Time: 10:13
 */

class CategoriaDao
{
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaCategorias($conexao) {

        $categorias = array();
        $query = "select * from categorias";
        $resultado = mysqli_query($conexao, $query);

        while($categoria_array = mysqli_fetch_assoc($resultado)) {

            $categoria = new Categoria();
            $categoria->setId($categoria_array['id']);
            $categoria->setNome($categoria_array['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}