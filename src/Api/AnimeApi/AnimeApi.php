<?php


namespace ProxerPHP\Api\AnimeApi;


use ProxerPHP\Api\ProxerApi;
use ProxerPHP\Api\ProxerPHP;
use ProxerPHP\Entities\Stream;
use ProxerPHP\Entities\VASTLink;
use ProxerPHP\Exception\ProxerPHPException;
use ProxerPHP\Util\AnimeLanguage;

class AnimeApi extends ProxerApi {

    private $requestHandler;

    public function __construct(ProxerPHP $proxerPHP) {
        parent::__construct($proxerPHP);
        $this->requestHandler = new RequestHandler($proxerPHP);
    }

    /**
     * @param int $entryId
     * @param int $episode
     * @param AnimeLanguage $language
     * @param bool $withProxerStream
     * @return StreamCollection
     * @throws ProxerPHPException
     */
    public function getStreams(int $entryId, int $episode, AnimeLanguage $language, bool $withProxerStream = false): StreamCollection {
        if ($withProxerStream) {
            return $this->requestHandler->getStreamsWithProxerStream($entryId, $episode, $language);
        } else {
            return $this->requestHandler->getStreams($entryId, $episode, $language);
        }
    }

    /**
     * Gibt den Link zum uebergebenen {@see Stream} zurueck
     *
     * @param Stream $stream
     * @return string
     * @throws ProxerPHPException
     */
    public function getStreamLink(Stream $stream) {
        return $this->requestHandler->getStreamLink($stream);
    }

    /**
     * @param Stream $stream
     * @return VASTLink
     * @throws ProxerPHPException
     */
    public function getVASTLink(Stream $stream): VASTLink {
        return $this->requestHandler->getVASTLink($stream);
    }

}