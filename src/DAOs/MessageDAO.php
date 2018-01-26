<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 17:22
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Message;

class MessageDAO {

	/**
	 * @param array $dataArray
	 *
	 * @return Message[]
	 */
	public static function createMessagesFromArray( $dataArray ) {
		$messages = [];
		foreach ( $dataArray as $data ) {
			$messages[] = new Message( (array) $data );
		}

		return $messages;
	}

}