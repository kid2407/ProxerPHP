<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 18:19
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Header;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class HeaderDAO {

	/**
	 * Gibt einen zufaelligen Header zurueck.
	 *
	 * @param string $style
	 *
	 * @return Header
	 * @throws ProxerException
	 */
	public static function getRandomHeader( $style = Header::STYLE_GRAY ) {
		return new Header( (array) ProxerRequest::sendPostRequest( ProxerUrl::HEADER_RANDOM, [ 'style' => $style ] ) );
	}

	/**
	 * Gibt eine Liste aller aktuellen Header zurueck.
	 *
	 * @return Header[]
	 * @throws ProxerException
	 */
	public static function getAllHeaders() {
		return self::createHeaderFromArray( ProxerRequest::sendPostRequest( ProxerUrl::HEADER_LIST ) );
	}

	/**
	 * @param array $dataArray
	 *
	 * @return Header[]
	 */
	private static function createHeaderFromArray( $dataArray ) {
		$header = [];
		foreach ( $dataArray as $data ) {
			$header[] = new Header( (array) $data );
		}

		return $header;
	}

}