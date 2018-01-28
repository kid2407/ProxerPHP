<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:30
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Tag {

	/** @var int $entryId */
	public $entryId;
	/** @var int $tagId */
	public $tagId;
	/** @var int $timeCreated */
	public $timeCreated;
	/** @var bool $isMatching */
	public $isMatching;
	/** @var bool $isSpoiler */
	public $isSpoiler;
	/** @var string $name */
	public $name;
	/** @var string $description */
	public $description;

	/**
	 * Tag constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->entryId     = $data['id'];
		$this->tagId       = $data['tid'];
		$this->timeCreated = $data['timestamp'];
		$this->isMatching  = ( $data['rate_flag'] == 1 );
		$this->isSpoiler   = ( $data['spoiler_flag'] == 1 );
		$this->name        = $data['tag'];
		$this->description = $data['description'];
	}

}