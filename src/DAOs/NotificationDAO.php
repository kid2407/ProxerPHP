<?php
/**
 * Created by Tobias Franz.
 * Date: 25.01.2018
 * Time: 12:02
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class NotificationDAO {

	/**
	 * @param array $notificationDataArray
	 *
	 * @return Notification[]
	 */
	public static function createNotificationsFromArray( $notificationDataArray ) {
		$notifications = [];
		foreach ( $notificationDataArray as $notificationData ) {
			$notifications[] = new Notification( (array) $notificationData );
		}

		return $notifications;
	}

	/**
	 * Gibt die Anzahl der Notifications je Bereich zurueck (User muss eingeloggt sein)
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function getNotificationsCount() {
		$result = ProxerRequest::sendGetRequest( ProxerUrl::NOTIFICATIONS_GET_COUNT );

		return [
			'oldPn'             => $result[1],
			'newPn'             => $result[2],
			'friendRequests'    => $result[3],
			'news'              => $result[4],
			'userNotifications' => $result[5]
		];
	}

	/**
	 * Gibt die Notifications fuer den eingeloggten User zurueck.
	 * $state kann drei Werte annehmen: 0 = beide, 1 = ungelesen, 2 = gelesen
	 *
	 * @param int $count
	 * @param int $page
	 * @param int $state
	 * @param bool $setRead
	 *
	 * @return Notification[]
	 * @throws ProxerException
	 */
	public static function getNotifications( $count = 15, $page = 0, $state = 0, $setRead = false ) {
		$result = ProxerRequest::sendPostRequest( ProxerUrl::NOTIFICATIONS_GET_NOTIFICATIONS, [ 'limit' => $count, 'p' => $page, 'set_read' => $setRead, 'filter' => $state ] );

		return self::createNotificationsFromArray( $result );
	}

	/**
	 * Loescht alle gelesenen Notifications.
	 * Wird der Parameter $nid angegeben, so wird nur die angegebene Notification geloescht
	 *
	 * @param int $notificationId
	 *
	 * @throws ProxerException
	 */
	public static function deleteNotifications( $notificationId = 0 ) {
		ProxerRequest::sendPostRequest( ProxerUrl::NOTIFICATIONS_DELETE_NOTIFICATIONS, [ 'nid' => $notificationId ] );
	}
}