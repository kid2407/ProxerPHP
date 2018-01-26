<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 11:30
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class PostDAO {

	/**
	 * @param array $postArray
	 *
	 * @return Post[]
	 */
	public static function createPostsFromArray( $postArray ) {
		$posts = [];
		foreach ( $postArray as $postInfo ) {
			$posts[] = new Post( $postInfo );
		}

		return $posts;
	}

}