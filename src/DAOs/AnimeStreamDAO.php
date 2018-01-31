<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 14:50
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\AnimeStream;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class AnimeStreamDAO {

	/**
	 * @param int $entryId
	 * @param int $episode
	 * @param string $language Moegliche Werte:
	 * @param bool $proxerStream
	 *
	 * @return AnimeStream[]
	 * @throws ProxerException
	 */
	public static function getAnimeStreams( $entryId, $episode, $language, $proxerStream = false ) {
		if ( $proxerStream === false ) {
			$result = ProxerRequest::sendPostRequest( ProxerUrl::ANIME_GET_STREAMS, [ 'id' => $entryId, 'episode' => $episode, 'language' => $language ] );
		} else {
			$result = ProxerRequest::sendPostRequest( ProxerUrl::ANIME_GET_PROXERSTREAMS, [ 'id' => $entryId, 'episode' => $episode, 'language' => $language ] );
		}

		return self::generateAnimeStreamsFromArray( $result );
	}

	/**
	 * @param int $streamId
	 *
	 * @return string
	 * @throws ProxerException
	 */
	public static function getStreamLink( $streamId ) {
		return ProxerRequest::sendPostRequest( ProxerUrl::ANIME_GET_STREAMLINK, [ 'id' => $streamId ] )[0];
	}

	/**
	 * @param array $dataArray
	 *
	 * @return AnimeStream[]
	 * @throws ProxerException
	 */
	private static function generateAnimeStreamsFromArray( $dataArray ) {
		$animeStreams = [];
		foreach ( $dataArray as $data ) {
			$animeStreams[] = new AnimeStream( (array) $data );
		}

		return $animeStreams;
	}

}