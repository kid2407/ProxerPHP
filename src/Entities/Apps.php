<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 11:48
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class Apps {

	/**
	 * @param $appid
	 * @param $errorMessage
	 * @param bool $sendUser
	 *
	 * @throws ProxerException
	 */
	public static function sendErrorMessage( $appid, $errorMessage, $sendUser = false ) {
		ProxerRequest::sendPostRequest( ProxerUrl::APPS_ERROR_LOG, [ 'id' => $appid, 'message' => $errorMessage, 'anonym' => $sendUser ] );
	}

}