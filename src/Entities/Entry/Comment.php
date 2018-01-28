<?php
/**
 * Created by Tobias Franz.
 * Date: 28.01.2018
 * Time: 12:37
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Comment {

	/** @var int $id */
	public $id;
	/** @var int $entryId */
	public $entryId;
	/** @var string $type */
	public $type;
	/** @var int $state */
	public $state;
	/** @var mixed $data */
	public $data;
	/** @var string $textContent */
	public $textContent;
	/** @var float $rating */
	public $rating;
	/** @var int $episodeWatched */
	public $episodeWatched;
	/** @var int $positiveCount */
	public $positiveCount;
	/** @var int $timestamp */
	public $timestamp;
	/** @var string $username */
	public $username;
	/** @var int $userId */
	public $userId;
	/** @var string $avatar */
	public $avatar;

	/**
	 * Comment constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id             = $data['id'];
		$this->entryId        = $data['tid'];
		$this->type           = $data['type'];
		$this->state          = $data['state'];
		$this->data           = $data['data'];
		$this->textContent    = $data['comment'];
		$this->rating         = $data['rating'];
		$this->episodeWatched = $data['episode'];
		$this->positiveCount  = $data['positive'];
		$this->timestamp      = $data['timestamp'];
		$this->username       = $data['username'];
		$this->userId         = $data['uid'];
		$this->avatar         = $data['avatar'];
	}

}