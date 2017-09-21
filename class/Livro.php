<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 21/09/2017
 * Time: 10:45
 */

abstract class Livro extends Produto {

    private $isbn;

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function calculaImposto() {
        return $this->getPreco() * 0.065;
    }
}