<?php


namespace ProxerPHP\Api\AppApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;

class AppApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

}