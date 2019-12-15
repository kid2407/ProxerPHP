<?php


namespace ProxerPHP\Api\AppApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;
use ProxerPHP\Exception\ProxerPHPException;

class AppApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

    /**
     * @param int $appId
     * @param string $message
     * @param bool $anonymous
     * @param bool $silent
     * @throws ProxerPHPException
     */
    public function sendErrorMessage(int $appId, string $message, bool $anonymous = true, $silent = true) {
        $this->requestHandler->sendErrorMessage($appId, $message, $anonymous, $silent);
    }

}