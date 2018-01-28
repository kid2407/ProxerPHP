<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:28
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class EntrySeason {

	const NONE = 0;
	const WINTER = 1;
	const SPRING = 2;
	const SUMMER = 3;
	const AUTUMN = 4;

	/** @var int $id */
	public $id;
	/** @var mixed $type */
	public $type;
	/** @var int $year */
	public $year;
	/** @var int $season */
	public $season;

	/**
	 * EntrySeason constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id     = $data['id'];
		$this->type   = $data['type'];
		$this->year   = $data['year'];
		$this->season = $data['season'];
	}

}