<?php

namespace apps\service;

class UrlPastaOrigem
{

    /** @var string  */
    private $urlOrigem;

    /**
     * urlPastaOrigem constructor.
     * @param string $urlOrigem
     */
    public function __construct(string $urlOrigem)
    {
        $this->urlOrigem = $urlOrigem;
    }

}