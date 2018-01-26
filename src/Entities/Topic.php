<?php
/**
 * Created by Tobias Franz.
 * Date: 24.01.2018
 * Time: 14:52
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Topic {

	/** @var int $id */
	public $id;
	/** @var int $category_id */
	public $category_id;
	/** @var int $category_name */
	public $category_name;
	/** @var string $subject */
	public $subject;
	/** @var bool $locked */
	public $locked;
	/** @var int $postCount */
	public $postCount;
	/** @var int $hits */
	public $hits;
	/** @var int $firstPostTime */
	public $firstPostTime;
	/** @var int $lastPostTime */
	public $lastPostTime;
	/** @var Post[] $posts */
	public $posts;

	/**
	 * Topic constructor.
	 *
	 * @param array $data
	 * @param int $topicid
	 */
	public function __construct( $data, $topicid ) {
		$this->id            = $topicid;
		$this->category_id   = $data['category_id'];
		$this->category_name = $data['category_name'];
		$this->subject       = $data['subject'];
		$this->locked        = $data['locked'];
		$this->postCount     = $data['post_count'];
		$this->hits          = $data['hits'];
		$this->firstPostTime = $data['first_post_time'];
		$this->lastPostTime  = $data['last_post_time'];
		$this->posts         = PostDAO::createPostsFromArray( $data['posts'] );
	}
}