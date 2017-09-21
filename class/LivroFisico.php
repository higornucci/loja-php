<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 21/09/2017
 * Time: 15:36
 */

class LivroFisico extends Livro {

    private $taxaImpressao;

    public function getTaxaImpressao() {
        return $this->taxaImpressao;
    }

    public function setTaxaImpressao($taxaImpressao) {
        $this->taxaImpressao = $taxaImpressao;
    }
}