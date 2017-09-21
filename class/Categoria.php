<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 20/09/2017
 * Time: 14:19
 */

class Categoria
{
    private $id;
    private $nome;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}