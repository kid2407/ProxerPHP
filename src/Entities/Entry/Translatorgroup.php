<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:29
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Translatorgroup {

	/** @var int $id */
	public $id;
	/** @var string $name */
	public $name;
	/** @var string $country */
	public $country;

	/**
	 * Translatorgroup constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id      = $data['id'];
		$this->name    = $data['name'];
		$this->country = $data['country'];
	}

}