<?php


namespace ProxerPHP\Api;


abstract class ProxerApi {

    private $proxerPHP;

    public function __construct(ProxerPHP $proxerPHP) {
        $this->proxerPHP = $proxerPHP;
    }

}