<?php
/**
 * Created by Tobias Franz.
 * Date: 24.01.2018
 * Time: 14:52
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

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
	private function __construct( $data, $topicid ) {
		$this->id            = $topicid;
		$this->category_id   = $data['category_id'];
		$this->category_name = $data['category_name'];
		$this->subject       = $data['subject'];
		$this->locked        = $data['locked'];
		$this->postCount     = $data['post_count'];
		$this->hits          = $data['hits'];
		$this->firstPostTime = $data['first_post_time'];
		$this->lastPostTime  = $data['last_post_time'];
		$this->posts         = Post::createPostsFromArray( $data['posts'] );
	}

	/**
	 * Gibt einen Thread mit seinem Erstpost aus.
	 *
	 * @param $topicId
	 *
	 * @return string
	 * @throws ProxerException
	 */
	public static function getTopic( $topicId ) {
		$result = ProxerRequest::sendGetRequest( 'forum/topic', [ 'id' => $topicId, 'limit' => 1 ] );

		return new Topic( $result, $topicId );
	}

	/**
	 * Laedt alle Posts eines Themas nach, den Anfangspost ausgenommen.
	 *
	 * @throws ProxerException
	 */
	public function fetchAllPosts() {
		$postData    = ProxerRequest::sendGetRequest( ProxerUrl::$FORUM_GET_TOPIC, [ 'id' => $this->id, 'limit' => $this->postCount ] );
		$posts       = Post::createPostsFromArray( $postData );
		$this->posts = array_merge( $this->posts, $posts );
	}

	/**
	 * Laedt die naechsten x posts des Themas, sofern vorhanden.
	 * Aktuell nicht ohne unnoetigen Overhead nutzbar
	 *
	 * @param int $postCount
	 */
	public function fetchPosts( $postCount ) {
	}

	/**
	 * Gibt eine Menge an Posts ab einem bestimmten Offset aus,
	 * damit koennen z.B. Themen seitenweise geladen werden.
	 *
	 * @param int $postCount
	 * @param int $offset
	 *
	 * @return Post[]
	 */
	public function getRangeOfPosts( $postCount, $offset = 0 ) {
		return array_slice( $this->posts, $offset, $postCount );
	}
}