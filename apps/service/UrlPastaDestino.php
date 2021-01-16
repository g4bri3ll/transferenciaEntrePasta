<?php


namespace apps\service;


class UrlPastaDestino
{

    /** @var string */
    private $urlDestino;

    /**
     * urlPastaDestino constructor.
     * @param string $urlDestino
     */
    public function __construct(string $urlDestino)
    {
        $this->urlDestino = $urlDestino;
    }

}