<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 11:24
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class TopicDAO {

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
	 * @param Topic $topic
	 *
	 * @throws ProxerException
	 */
	public static function fetchAllPosts( &$topic ) {
		$postData     = ProxerRequest::sendGetRequest( ProxerUrl::FORUM_GET_TOPIC, [ 'id' => $topic->id, 'limit' => $topic->postCount ] );
		$posts        = PostDAO::createPostsFromArray( $postData );
		$topic->posts = array_merge( $topic->posts, $posts );
	}

	/**
	 * Gibt eine Menge an Posts ab einem bestimmten Offset aus,
	 * damit koennen z.B. Themen seitenweise geladen werden.
	 *
	 * @param Topic $topic
	 * @param int $postCount
	 * @param int $offset
	 *
	 * @return Post[]
	 */
	public static function getRangeOfPosts( $topic, $postCount, $offset = 0 ) {
		return array_slice( $topic->posts, $offset, $postCount );
	}
}