<?php

require "../../vendor/autoload.php";


use apps\service\UrlPastaOrigem;


class ControllerProcessUrlOrigem implements InterfaceProcessUrlDestino
{

    /**
     * @return UrlPastaOrigem
     */
    public function receberUrlOrigem(): UrlPastaOrigem
    {
        return new UrlPastaOrigem("C:\Users\gabrielborges\Documents\move camera");
    }

    public function retornaConteudo()
    {
        self::receberUrlOrigem();
    }
}