<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 12:31
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\News;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class NewsDAO {

	/**
	 * @param int $count
	 * @param int $page
	 * @param bool $setRead
	 *
	 * @return News[]
	 * @throws ProxerException
	 */
	public static function getNews( $count = 15, $page = 0, $setRead = false ) {
		$result = ProxerRequest::sendGetRequest( ProxerUrl::NOTIFICATIONS_GET_NEWS, [ 'limit' => $count, 'p' => $page, 'set_read' => $setRead ] );

		return self::generateNewsFromArray( $result );
	}

	/**
	 * @param array $newsDataArray
	 *
	 * @return News[]
	 * @throws ProxerException
	 */
	public static function generateNewsFromArray( $newsDataArray ) {
		$news = [];
		foreach ( $newsDataArray as $newsData ) {
			$news[] = new News( $newsData );
		}

		return $news;
	}

	/**
	 * Gibt den Link zum Beitragsbild des Newsbeitrags zurueck.
	 *
	 * @param News $news
	 *
	 * @return string
	 */
	public static function getNewsImage( $news ) {
		return sprintf( ProxerUrl::NEWS_IMAGE_PATH, $news->newsId, $news->imageId );
	}

	/**
	 *
	 * Gibt das Thumbnail des Newsbeitrages zurueck.
	 *
	 * @param News $news
	 *
	 * @return string
	 */
	public static function getNewsThumbnail( $news ) {
		return sprintf( ProxerUrl::NEWS_THUMBNAIL_PATH, $news->newsId, $news->imageId );
	}

	/**
	 * Gibt den Link zum Newsbeitrag zurueck.
	 *
	 * @param News $news
	 *
	 * @return string
	 */
	public static function getNewsLink( $news ) {
		return sprintf( ProxerUrl::NEWS_LINK, $news->categoryId, $news->messageId );
	}

}