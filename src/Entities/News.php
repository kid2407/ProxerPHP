<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 12:15
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\Exceptions\ProxerException;

class News {

	/** @var int $newsId */
	public $newsId;
	/** @var int $time */
	public $time;
	/** @var int $messageId */
	public $messageId;
	/** @var string $description */
	public $description;
	/** @var string $imageId */
	public $imageId;
	/** @var string $imageStyle */
	public $imageStyle;
	/** @var string $subject */
	public $subject;
	/** @var int $hits */
	public $hits;
	/** @var int $thread */
	public $thread; // Das gleiche wie messageId?
	/** @var int $userId */
	public $userId;
	/** @var string $userName */
	public $userName;
	/** @var int $postCount */
	public $postCount;
	/** @var int $categoryId */
	public $categoryId;
	/** @var string $categoryName */
	public $categoryName;
	/** @var Topic $content */
	public $content;

	/**
	 * News constructor.
	 *
	 * @param array $data
	 *
	 * @throws ProxerException
	 */
	public function __construct( $data ) {
		$this->newsId       = $data['nid'];
		$this->time         = $data['time'];
		$this->messageId    = $data['mid'];
		$this->description  = $data['description'];
		$this->imageId      = $data['image_id'];
		$this->imageStyle   = $data['image_style'];
		$this->subject      = $data['subject'];
		$this->hits         = $data['hits'];
		$this->thread       = $data['thread'];
		$this->userId       = $data['uid'];
		$this->userName     = $data['uname'];
		$this->postCount    = $data['posts'];
		$this->categoryId   = $data['catid'];
		$this->categoryName = $data['catname'];
		$this->content = TopicDAO::getTopic($data['mid']);
	}
}