<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:28
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Synonym {

	/** @var int $nameId */
	public $nameId;
	/** @var int $entryId */
	public $entryId;
	/** @var mixed $type */
	public $type;
	/** @var string $name */
	public $name;

	/**
	 * Synonym constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->nameId  = $data['id'];
		$this->entryId = $data['eid'];
		$this->type    = $data['type'];
		$this->name    = $data['name'];
	}

}