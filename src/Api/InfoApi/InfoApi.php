<?php


namespace ProxerPHP\Api\InfoApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;

class InfoApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

}