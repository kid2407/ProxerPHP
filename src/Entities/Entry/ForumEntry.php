<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 15:31
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class ForumEntry {

	/** @var int $threadId */
	public $threadId;
	/** @var int $categoryId */
	public $categoryId;
	/** @var string $subject */
	public $subject;
	/** @var int $postCount */
	public $postCount;
	/** @var int $hits */
	public $hits;
	/** @var int $createdTime */
	public $createdTime;
	/** @var int $createdUserId */
	public $createdUserId;
	/** @var string $createdUserName */
	public $createdUserName;
	/** @var int $lastUpdatedTime */
	public $lastUpdatedTime;
	/** @var int $lastUpdatedUserId */
	public $lastUpdatedUserId;
	/** @var string $lastUpdatedUserName */
	public $lastUpdatedUserName;

	/**
	 * ForumEntry constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->threadId            = $data['id'];
		$this->categoryId          = $data['category_id'];
		$this->subject             = $data['subject'];
		$this->postCount           = $data['posts'];
		$this->hits                = $data['hits'];
		$this->createdTime         = $data['first_post_time'];
		$this->createdUserId       = $data['first_post_userid'];
		$this->createdUserName     = $data['first_post_guest_name'];
		$this->lastUpdatedTime     = $data['last_post_time'];
		$this->lastUpdatedUserId   = $data['last_post_userid'];
		$this->lastUpdatedUserName = $data['last_post_guest_name'];
	}

}