<?php
/**
 * Created by Tobias Franz.
 * Date: 28.01.2018
 * Time: 14:35
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Hoster {

	/** @var string $name */
	public $name;
	/** @var string $image */
	public $image;

	/**
	 * Hoster constructor.
	 *
	 * @param string $name
	 * @param string $image
	 */
	public function __construct( $name, $image ) {
		$this->name  = $name;
		$this->image = $image;
	}

}