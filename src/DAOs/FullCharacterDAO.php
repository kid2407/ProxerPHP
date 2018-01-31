<?php
/**
 * Created by Tobias Franz.
 * Date: 29.01.2018
 * Time: 17:58
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\AlternativeCharacterName;
use ProxerPHP\Entities\DescriptionPart;
use ProxerPHP\Entities\Entry\Person;
use ProxerPHP\Entities\FullCharacter;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class FullCharacterDAO {

	/**
	 * @param int $characterId
	 *
	 * @return FullCharacter
	 * @throws ProxerException
	 */
	public static function getCharacter( $characterId ) {
		return new FullCharacter( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_CHARACTER, [ 'id' => $characterId ] ) );
	}

	/**
	 * @param array $dataArray
	 *
	 * @return Person[]
	 */
	public static function createPersonFromArray( $dataArray ) {
		$persons = [];
		foreach ( $dataArray as $data ) {
			$persons[] = new Person( (array) $data );
		}

		return $persons;
	}

	/**
	 * @param array $dataArray
	 *
	 * @return DescriptionPart[]
	 */
	public static function createDescriptionPartsFromArray( $dataArray ) {
		$descriptionParts = [];
		foreach ( $dataArray as $data ) {
			$descriptionParts[] = new DescriptionPart( (array) $data );
		}

		return $descriptionParts;
	}

	/**
	 * @param array $dataArray
	 *
	 * @return AlternativeCharacterName[]
	 */
	public static function createAlternativeCharacterNamesFromArray( $dataArray ) {
		$alternativeCharacterNames = [];
		foreach ( $dataArray as $data ) {
			$alternativeCharacterNames[] = new AlternativeCharacterName( (array) $data );
		}

		return $alternativeCharacterNames;
	}

}