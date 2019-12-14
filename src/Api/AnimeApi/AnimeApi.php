<?php


namespace ProxerPHP\Api\AnimeApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;

class AnimeApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

    public function getStreams(int $entryId, int $episode, string $language, bool $withProxerStream = false) {
        return RequestHandler::getStreams($entryId, $episode, $language);
    }

}