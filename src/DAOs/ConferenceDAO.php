<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 16:21
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Conference;
use ProxerPHP\Entities\Message;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class ConferenceDAO {

	/**
	 * Gibt die Konstanten fuer den Messenger zurueck.
	 * Die Werte aendern sich hoechstens alle paar Monate.
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function getMessengerConstants() {
		return ProxerRequest::sendGetRequest( ProxerUrl::MESSENGER_GET_CONSTANTS );
	}

	/**
	 * Gibt eine Liste der Konferenzen des eingeloggten Users zurueck.
	 * Moegliche Werte fuer $type sind als Konstanten in Conference zu finden, fuer keinen Filter ignorieren.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $page
	 * @param string|bool $type
	 *
	 * @return Conference[]
	 * @throws ProxerException
	 */
	public static function getConferences( $page = 0, $type = false ) {
		if ( $type !== false ) {
			$result = ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_CONFERENCES, [ 'p' => $page, 'type' => $type ] );
		} else {
			$result = ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_CONFERENCES, [ 'p' => $page ] );
		}

		return self::fetchConferencesFromArray( $result );
	}

	/**
	 * @param array $dataArray
	 *
	 * @return Conference[]
	 */
	public static function fetchConferencesFromArray( $dataArray ) {
		$conferences = [];
		foreach ( $dataArray as $data ) {
			$conferences[] = new Conference( (array) $data );
		}

		return $conferences;
	}

	/**
	 * Gibt grundlegende Informationen zu einer Konferenz zurueck.
	 * Um die Nachrichten der Konferenz zu erhalten die Methode @see ConferenceDAO::getConferenceMessages() benutzen.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function getConferenceInfo( $conferenceId ) {
		$result               = ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_CONFERENCE_INFO, [ 'conference_id' => $conferenceId ] );
		$result['conference'] = (array) $result['conference'];

		$conference = [
			'topic'              => $result['conference']['topic'],
			'unreadMessageCount' => $result['conference']['count'],
			'lastMessageTime'    => $result['conference']['timestamp_end'],
			'owner'              => $result['conference']['leader']
		];

		$users = [];
		foreach ( $result['users'] as $user ) {
			$users[] = [
				'userID'        => $user['uid'],
				'avatar'        => $user['avatar'],
				'username'      => $user['username'],
				'statusMessage' => $user['status']
			];
		}

		return [ 'conference' => $conference, 'users' => $users ];
	}

	/**
	 * Gibt Informationen zu einem Benutzer innerhalb einer Konfrenz zurueck.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $userId
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function getConferenceUserInfo( $userId ) {
		return ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_USER_INFO, [ 'user_id' => $userId ] );
	}

	private static function getConferenceMessages( $conferenceId, $messageId ) {

	}

	/**
	 * Gibt die letzten Nachrichten eines Users innerhalb von allen Konferenzen aus.
	 * Wenn $messageId = 0, dann wird nur die letzte Nachricht zurueckgegeben.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $messageId
	 *
	 * @return Message
	 * @throws ProxerException
	 */
	public static function getLastMessageFromUserInConferences( $messageId = 0 ) {
		$result = ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_MESSAGES, [ 'conference_id' => 0, 'message_id' => $messageId ] );

		return new Message( (array) array_pop( $result ) );
	}

	/**
	 * Gibt alle Nachrichten eine Konferenz bis zu einer bestimmten Nachricht zurueck.
	 * Fuer $messageId = 0 wird die letzte Nachricht in dieser Konferenz zurueckgegeben.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 * @param int $messageId
	 * @param bool $markAsRead
	 *
	 * @return Message[]
	 * @throws ProxerException
	 */
	public static function getMessagesFromConference( $conferenceId, $messageId = 0, $markAsRead = false ) {
		$result = ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_GET_MESSAGES, [ 'conference_id' => $conferenceId, 'message_id' => $messageId, 'read' => ( $markAsRead ? 'true' : 'false' ) ] );

		return MessageDAO::createMessagesFromArray( $result );
	}

	/**
	 * Erzeugt eine neue Konferenz oder fuegt die Nachricht einer bereits bestehenden hinzu.
	 * Gibt als Ergebnis die Id der (neuen) Konferenz zurueck.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param string $username
	 * @param string $text
	 *
	 * @return int
	 * @throws ProxerException
	 */
	public static function createNewConference( $username, $text ) {
		return ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_NEW_CONFERENCE, [ 'text' => $text, 'username' => $username ] )[0];
	}

	/**
	 * Erstellt eine neue Gruppenkonferenz.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param string[] $users
	 * @param string $topic
	 * @param bool $firstMessage
	 *
	 * @return int
	 * @throws ProxerException
	 */
	public static function createNewGroupConference( $users, $topic, $firstMessage = false ) {
		if ( $firstMessage !== false ) {
			return ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_NEW_CONFERENCE_GROUP, [ 'users' => $users, 'topic' => $topic, 'text' => $firstMessage ] )[0];
		} else {
			return ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_NEW_CONFERENCE_GROUP, [ 'users' => $users, 'topic' => $topic ] )[0];
		}
	}

	/**
	 * Einen Konfrenz bei der Administration melden.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 * @param string $text
	 *
	 * @throws ProxerException
	 */
	public static function reportConference( $conferenceId, $text ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_REPORT_CONFERENCE, [ 'conference_id' => $conferenceId, 'text' => $text ] );
	}

	/**
	 * @param $conferenceId
	 * @param $message
	 *
	 * @return null|string
	 * @throws ProxerException
	 */
	public static function sendMessage( $conferenceId, $message ) {
		return ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_REPORT_CONFERENCE, [ 'conference_id' => $conferenceId, 'text' => $message ] )[0];
	}

	/**
	 * Markiert eine Konferenz als gelesen.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function markConferenceAsRead( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_READ, [ 'conference_id' => $conferenceId ] );
	}

	/**
	 * Markiert eine Konferenz als ungelesen.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function markConferenceAsUnread( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_UNREAD, [ 'conference_id' => $conferenceId ] );
	}

	/**
	 * Blockiert eine Konferenz.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function markConferenceAsBlocked( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_BLOCK, [ 'conference_id' => $conferenceId ] );
	}

	/**
	 * Hebt die Blockierung einer Konferenz auf.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function markConferenceAsUnblocked( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_UNBLOCK, [ 'conference_id' => $conferenceId ] );
	}

	/**
	 * Markiert eine Konferenz als Favorit.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function markConferenceAsFavourite( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_FAVOUR, [ 'conference_id' => $conferenceId ] );
	}

	/**
	 * Entfernt eine Konferenz aus den Favoriten.
	 * Der Benutzer muss an dieser Konferenz teilnehmen, damit diese Aktion durchgefuehrt werden kann.
	 * Benoetigt einen eingeloggten User.
	 *
	 * @param int $conferenceId
	 *
	 * @throws ProxerException
	 */
	public static function unmarkConferenceAsFavourite( $conferenceId ) {
		ProxerRequest::sendPostRequest( ProxerUrl::MESSENGER_SET_UNFAVOUR, [ 'conference_id' => $conferenceId ] );
	}

}