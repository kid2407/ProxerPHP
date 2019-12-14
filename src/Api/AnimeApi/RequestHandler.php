<?php


namespace ProxerPHP\Api\AnimeApi;


use ProxerPHP\Api\BaseRequestHandler;
use ProxerPHP\Api\Methods;
use ProxerPHP\Entities\Stream;
use ProxerPHP\Entities\VASTLink;
use ProxerPHP\Exception\ProxerPHPException;
use ProxerPHP\Util\AnimeLanguage;

class RequestHandler extends BaseRequestHandler {

    /**
     * @param int $entryId
     * @param int $episode
     * @param AnimeLanguage $language
     * @return StreamCollection
     * @throws ProxerPHPException
     */
    public function getStreams(int $entryId, int $episode, AnimeLanguage $language): StreamCollection {
        return $this->getInternalStreams($entryId, $episode, $language, false);
    }

    /**
     * @param int $entryId
     * @param int $episode
     * @param AnimeLanguage $language
     * @return StreamCollection
     * @throws ProxerPHPException
     */
    public function getStreamsWithProxerStream(int $entryId, int $episode, AnimeLanguage $language): StreamCollection {
        return $this->getInternalStreams($entryId, $episode, $language, true);
    }

    /**
     * @param int $entryId
     * @param int $episode
     * @param AnimeLanguage $language
     * @param bool $withProxerStream
     * @return StreamCollection
     * @throws ProxerPHPException
     */
    private function getInternalStreams(int $entryId, int $episode, AnimeLanguage $language, bool $withProxerStream) {
        $request = $this->proxerPHP->sendGetRequest($withProxerStream ? Methods::ANIME_STREAM_PROXER : Methods::ANIME_STREAM, [
            'id'       => $entryId,
            'episode'  => $episode,
            'language' => $language->getLanguage()
        ]);

        if ($request->hasFailed()) {
            throw new ProxerPHPException($request->getMessage(), $request->getCode());
        }

        $streamCollection = new StreamCollection();
        foreach ($request->getData() as $elementData) {
            $streamCollection->add(new Stream($elementData));
        }

        return $streamCollection;
    }

    /**
     * @param Stream $stream
     * @return string
     * @throws ProxerPHPException
     */
    public function getStreamLink(Stream $stream) {
        $request = $this->proxerPHP->sendGetRequest(Methods::ANIME_STREAM_LINK, [
            'id' => $stream->id
        ]);

        if ($request->hasFailed()) {
            throw new ProxerPHPException($request->getMessage(), $request->getCode());
        }

        return $request->getData();
    }

    /**
     * @param Stream $stream
     * @return VASTLink
     * @throws ProxerPHPException
     */
    public function getVASTLink(Stream $stream): VASTLink {
        $request = $this->proxerPHP->sendGetRequest(Methods::ANIME_STREAM_LINKS_ADS, [
            'id' => $stream->id
        ]);

        if ($request->hasFailed()) {
            throw new ProxerPHPException($request->getMessage(), $request->getCode());
        }

        return new VASTLink($request->getData());
    }
}