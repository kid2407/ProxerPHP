<?php
/**
 * Created by Tobias Franz.
 * Date: 24.01.2018
 * Time: 15:38
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Post {

	/** @var int $id */
	public $id;
	/** @var int $parentId */
	public $parentId;
	/** @var int $userId */
	public $userId;
	/** @var string $username */
	public $username;
	/** @var string $avatar */
	public $avatar;
	/** @var string $signature */
	public $signature;
	/** @var int $time_created */
	public $time_created;
	/** @var int $modifiedBy */
	public $modifiedBy;
	/** @var string $modifiedName */
	public $modifiedName;
	/** @var int $modifiedTime */
	public $modifiedTime;
	/** @var string $modifiedReason */
	public $modifiedReason;
	/** @var string $message */
	public $message;
	/** @var int $thankYouCount */
	public $thankYouCount;

	/**
	 * Post constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id             = $data['id'];
		$this->parentId       = $data['pid'];
		$this->userId         = $data['uid'];
		$this->username       = $data['username'];
		$this->avatar         = $data['avatar'];
		$this->signature      = $data['signature'];
		$this->time_created   = $data['time'];
		$this->modifiedBy     = $data['modified_by'];
		$this->modifiedName   = $data['modified_name'];
		$this->modifiedTime   = $data['modified_time'];
		$this->modifiedReason = $data['modified_reason'];
		$this->message        = $data['message'];
		$this->thankYouCount  = $data['thank_you_count'];
	}

}