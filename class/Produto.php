<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 20/09/2017
 * Time: 13:21
 */

class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
    public $usado;

    public function precoComDesconto($valor)
    {
        return $this->preco - ($this->preco * $valor);
    }
}