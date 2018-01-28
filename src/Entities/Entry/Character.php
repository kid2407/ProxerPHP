<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:31
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Character {

	const TYPE_MAIN = 'main';
	const TYPE_MINOR = 'support';

	/** @var int $id */
	public $id;
	/** @var string $name */
	public $name;
	/** @var string $type */
	public $type;

	/**
	 * Character constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id   = $data['id'];
		$this->name = $data['name'];
		$this->type = $data['type'];
	}

}