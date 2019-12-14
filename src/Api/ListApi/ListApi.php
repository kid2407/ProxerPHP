<?php


namespace ProxerPHP\Api\ListApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;

class ListApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

}