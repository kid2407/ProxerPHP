<?php
/**
 * Created by Tobias Franz.
 * Date: 29.01.2018
 * Time: 17:40
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use DateTime;
use ProxerPHP\DAOs\FullCharacterDAO;
use ProxerPHP\Entities\Entry\Person;

class FullCharacter {

	/** @var int $id */
	public $id;
	/** @var string $name */
	public $name;
	/** @var string $gender "f" oder "m" */
	public $gender;
	/** @var string $hairColor hex-Farbcode, z.B. #ffaa00 */
	public $hairColor;
	/** @var string $eyeColor hex-Farbcode, z.B. #ffaa00 */
	public $eyeColor;
	/** @var string $bloodType */
	public $bloodType;
	/** @var DateTime $birthday */
	public $birthday;
	/** @var int $height in cm */
	public $height;
	/** @var int $weigth in kg */
	public $weigth;
	/** @var DescriptionPart[] $description Teile der Description */
	public $description;
	/** @var AlternativeCharacterName[] $names */
	public $names;
	/** @var Person[] $persons */
	public $persons;
	/** @var array $links */
	public $links;

	/**
	 * FullCharacter constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id          = $data['id'];
		$this->name        = $data['name'];
		$this->gender      = $data['gender'];
		$this->hairColor   = $data['hair_color'];
		$this->eyeColor    = $data['eye_color'];
		$this->bloodType   = $data['bloodtype'];
		$this->birthday    = new DateTime( $data['birthday'] );
		$this->height      = $data['height'];
		$this->weigth      = $data['weight'];
		$this->description = FullCharacterDAO::createDescriptionPartsFromArray( $data['description'] );
		$this->names       = FullCharacterDAO::createAlternativeCharacterNamesFromArray( $data['names'] );
		$this->persons     = FullCharacterDAO::createPersonFromArray( $data['persons'] );
		$this->links       = $data['id'];
	}

}