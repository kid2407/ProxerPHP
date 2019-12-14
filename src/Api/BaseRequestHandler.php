<?php


namespace ProxerPHP\Api;


abstract class BaseRequestHandler {

    /** @var ProxerPHP $proxerPHP */
    protected $proxerPHP;

    public function __construct(ProxerPHP $proxerPHP) {
        $this->proxerPHP = $proxerPHP;
    }

}