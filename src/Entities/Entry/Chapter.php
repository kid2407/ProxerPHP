<?php
/**
 * Created by Tobias Franz.
 * Date: 28.01.2018
 * Time: 14:18
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Chapter {

	/** @var int $number */
	public $number;
	/** @var string $title */
	public $title;
	/** @var string $lang */
	public $lang;

	/**
	 * Chapter constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->number = $data['no'];
		$this->title  = $data['title'];
		$this->lang   = $data['typ'];
	}

}