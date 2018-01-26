<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 17:13
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Message {

	/** @var int $messageId */
	public $messageId;
	/** @var int $conferenceId */
	public $conferenceId;
	/** @var int $userId */
	public $userId;
	/** @var string $username */
	public $username;
	/** @var string $message */
	public $message;
	/** @var string|null $command */
	public $command;
	/** @var int $timestamp */
	public $timestamp;
	/** @var string $device */
	public $device;

	/**
	 * Message constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->messageId    = $data['message_id'];
		$this->conferenceId = $data['conference_id'];
		$this->userId       = $data['user_id'];
		$this->username     = $data['username'];
		$this->message      = $data['message'];
		$this->command      = $data['action'];
		$this->timestamp    = $data['timestamp'];
		$this->device       = $data['device'];
	}

}