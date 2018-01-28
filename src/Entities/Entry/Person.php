<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:31
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Person {

	const TYPE_SEIYUU = 'seiyuu';
	const TYPE_AUTHOR = 'author';
	const TYPE_ARTIST = 'art';
	const TYPE_AUTHOR_AND_ARTIST = 'author-art';
	const TYPE_DIRECTOR = 'director';
	const TYPE_ORIGINAL_DIRECTOR = 'original-creator';
	const TYPE_MISCELLANEOUS = 'misc';

	/** @var int $id */
	public $id;
	/** @var string $name */
	public $name;
	/** @var string $type */
	public $type;

	/**
	 * Person constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id   = $data['pid'];
		$this->name = $data['name'];
		$this->type = $data['type'];
	}

}