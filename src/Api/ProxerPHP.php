<?php


namespace ProxerPHP\Api;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use ProxerPHP\Api\AnimeApi\AnimeApi;
use ProxerPHP\Api\AppApi\AppApi;
use ProxerPHP\Api\ChatApi\ChatApi;
use ProxerPHP\Api\CommentApi\CommentApi;
use ProxerPHP\Api\ForumApi\ForumApi;
use ProxerPHP\Api\InfoApi\InfoApi;
use ProxerPHP\Api\ListApi\ListApi;
use ProxerPHP\Api\MangaApi\MangaApi;
use ProxerPHP\Api\MediaApi\MediaApi;
use ProxerPHP\Api\MessengerApi\MessengerApi;
use ProxerPHP\Api\NotificationsApi\NotificationsApi;
use ProxerPHP\Api\UcpApi\UcpApi;
use ProxerPHP\Api\UserApi\UserApi;
use ProxerPHP\Api\WikiApi\WikiApi;
use ProxerPHP\Exception\ProxerPHPException;

class ProxerPHP {

    /** @var string API_VERSION Aktuelle Version der API */
    const API_VERSION = 'v1';
    /** @var string API_URL Basis-URL fuer die API */
    const API_URL = 'https://proxer.me/api/';

    /** @var string|null $API_KEY Der API-Key von {@link https://proxer.me/api} */
    private $API_KEY = null;
    /** @var bool $TESTMODE */
    private $TESTMODE = true;
    /** @var string $API_BASE_URL */
    private $API_BASE_URL = self::API_URL . self::API_VERSION . '/';
    /** @var Client $guzzleClient */
    private $guzzleClient = null;

    private static $initialised = false;

    public function __construct(string $API_KEY = null, bool $testmode = true) {
        $this->TESTMODE     = $testmode;
        $this->API_KEY      = $API_KEY ?? null;
        $this->guzzleClient = $this->buildGuzzleClient();
    }

    /**
     *
     */
    public function rebuildClient() {
        $this->guzzleClient = $this->buildGuzzleClient();
    }

    /**
     * @return Client
     */
    private function buildGuzzleClient(): Client {
        if ($this->TESTMODE) {
            $client = new Client([
                'base_uri' => self::API_URL . self::API_VERSION . '/',
                'headers'  => [
                    'proxer-api-testmode' => 1
                ]
            ]);
        } else {
            $client = new Client([
                'base_uri' => self::API_URL . self::API_VERSION . '/',
                'headers'  => [
                    'proxer-api-key' => $this->API_KEY
                ]
            ]);
        }

        return $client;
    }

    /**
     * @param string $uri
     * @param array $options
     * @return ApiResponse
     * @throws ProxerPHPException
     */
    public function sendGetRequest(string $uri, array $options = []) {
        $request = $this->guzzleClient->get($uri, [RequestOptions::QUERY => $options]);
        if ($request->getStatusCode() !== 200) {
            throw new ProxerPHPException($request->getReasonPhrase(), $request->getStatusCode());
        }

        return new ApiResponse(json_decode($request->getBody()->getContents(), true));
    }

    /**
     * @param string $uri
     * @param array $options
     * @return ApiResponse
     * @throws ProxerPHPException
     */
    public function sendPostRequest(string $uri, array $options = []) {
        if (!self::$initialised) {
            throw new ProxerPHPException("Nicht initialisiert!");
        }

        $request = $this->guzzleClient->post($uri, [RequestOptions::QUERY => $options]);
        if ($request->getStatusCode() !== 200) {
            throw new ProxerPHPException($request->getReasonPhrase(), $request->getStatusCode());
        }

        return new ApiResponse(json_decode($request->getBody()->getContents(), true));
    }

    /**
     * @return AnimeApi Funktionen der Anime-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Anime}
     */
    public function anime() {
        return new AnimeApi($this);
    }

    /**
     * @return AppApi Funktionen der App-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/App}
     */
    public function app() {
        return new AppApi($this);
    }

    /**
     * @return ChatApi Funktionen der Chat-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Chat}
     */
    public function chat() {
        return new ChatApi($this);
    }

    /**
     * @return CommentApi Funktionen der Comment-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Comment}
     */
    public function comment() {
        return new CommentApi($this);
    }

    /**
     * @return ForumApi Funktionen der Forum-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Forum}
     */
    public function forum() {
        return new ForumApi($this);
    }

    /**
     * @return InfoApi Funktionen der Info-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Info}
     */
    public function info() {
        return new InfoApi($this);
    }

    /**
     * @return ListApi Funktionen der List-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/List}
     */
    public function list() {
        return new ListApi($this);
    }

    /**
     * @return MangaApi Funktionen der Manga-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Manga}
     */
    public function manga() {
        return new MangaApi($this);
    }

    /**
     * @return MediaApi Funktionen der Media-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Media}
     */
    public function media() {
        return new MediaApi($this);
    }

    /**
     * @return MessengerApi Funktionen der Messenger-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Messenger}
     */
    public function messenger() {
        return new MessengerApi($this);
    }

    /**
     * @return NotificationsApi Funktionen der Notifications-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Notifications}
     */
    public function notification() {
        return new NotificationsApi($this);
    }

    /**
     * @return UcpApi Funktionen der Ucp-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Ucp}
     */
    public function ucp() {
        return new UcpApi($this);
    }

    /**
     * @return UserApi Funktionen der User-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/User}
     */
    public function user() {
        return new UserApi($this);
    }

    /**
     * @return WikiApi Funktionen der Wiki-Klasse: {@link https://proxer.me/wiki/Proxer_API/v1/Wiki}
     */
    public function wiki() {
        return new WikiApi($this);
    }

}