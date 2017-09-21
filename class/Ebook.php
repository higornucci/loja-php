<?php
/**
 * Created by PhpStorm.
 * User: higor.nucci
 * Date: 21/09/2017
 * Time: 15:35
 */

class Ebook extends Livro
{
    private $waterMark;

    public function getWaterMark() {
        return $this->waterMark;
    }

    public function setWaterMark($waterMark) {
        $this->waterMark = $waterMark;
    }

}