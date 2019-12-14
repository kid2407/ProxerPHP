<?php


namespace ProxerPHP\Api\ChatApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;

class ChatApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

}