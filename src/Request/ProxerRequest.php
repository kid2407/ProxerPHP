<?php
/**
 * Created by Tobias Franz.
 * Date: 23.01.2018
 * Time: 16:09
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Request;


use GuzzleHttp\Client;
use InvalidArgumentException;
use ProxerPHP\Exceptions\ProxerException;

class ProxerRequest {

	/** @var Client $client */
	private static $client;

	/**
	 * @param string $path
	 * @param array $parameters
	 * @param string $type
	 *
	 * @return array
	 * @throws ProxerException
	 */
	private static function sendRequest( $path, $parameters = [], $type ) {
		if ( $type === "GET" || $type === "POST" ) {
			if ( is_null( self::$client ) ) {
				self::initClient();
			}
			$parameters['api_key'] = getenv( 'API_KEY' );
			$request               = self::$client->request( 'POST', $path, $parameters );
			if ( $request->getStatusCode() === 200 ) {
				$json = json_decode( $request->getBody()->getContents(), true );
				if ( $json !== false ) {
					if ( $json['error'] == 0 ) {
						return $json['data'];
					}
					throw new ProxerException( $json['message'], $json['code'] );
				}
				throw new ProxerException( "Invalid Response from Server", 500, null, ProxerException::$SERVER );
			}
			throw new ProxerException( $request->getReasonPhrase(), $request->getStatusCode(), null, ProxerException::$SERVER );
		} else {
			throw new InvalidArgumentException( "Es werden nur GET und POST Requests akzeptiert." );
		}
	}

	/**
	 * @param $path
	 * @param $parameters
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function sendGetRequest( $path, $parameters = [] ) {
		return self::sendRequest( $path, $parameters, 'GET' );
	}

	/**
	 * @param $path
	 * @param $parameters
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function sendPostRequest( $path, $parameters = [] ) {
		return self::sendRequest( $path, $parameters, 'POST' );
	}

	private static function initClient() {
		self::$client = new Client( [ 'base_uri' => sprintf( 'https://proxer.me/api/%s/', getenv( 'API_VERSION' ) ) ] );
	}

}