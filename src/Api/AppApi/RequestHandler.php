<?php


namespace ProxerPHP\Api\AppApi;


use ProxerPHP\Api\BaseRequestHandler;
use ProxerPHP\Api\Methods;
use ProxerPHP\Exception\ProxerPHPException;

class RequestHandler extends BaseRequestHandler {

    /**
     * @param int $appId
     * @param string $message
     * @param bool $anonymous
     * @param bool $silent
     * @throws ProxerPHPException
     */
    public function sendErrorMessage(int $appId, string $message, bool $anonymous, bool $silent): void {
        $request = $this->proxerPHP->sendPostRequest(Methods::APPS_ERRORLOG, [
            'id'      => $appId,
            'message' => $message,
            'anonym'  => $anonymous,
            'silent'  => $silent
        ]);

        if ($request->hasFailed()) {
            throw new ProxerPHPException($request->getMessage(), $request->getCode());
        }
    }

}