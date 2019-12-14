<?php


namespace ProxerPHP\Api;


abstract class BaseRequestHandler {

    /** @var ProxerPHP $proxerPHP */
    private $proxerPHP;

    public function __construct(ProxerPHP $proxerPHP) {
        $this->proxerPHP = $proxerPHP;
    }

}