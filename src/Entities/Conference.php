<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 16:24
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Conference {

	const FAVOUR = 'favour';
	const BLOCK = 'block';
	const GROUP = 'group';
	const DEFAULT = 'default';

	/** @var int $conferenceId */
	public $conferenceId;
	/** @var string $topic */
	public $topic;
	/** @var string $topicCustom */
	public $topicCustom;
	/** @var int $userCount */
	public $userCount;
	/** @var bool $isGroupConference */
	public $isGroupConference;
	/** @var int $lastMessageTime */
	public $lastMessageTime;
	/** @var bool $isLastMessageRead */
	public $isLastMessageRead;
	/** @var int $notReadCount */
	public $notReadCount;
	/** @var int $lastReadMessageId */
	public $lastReadMessageId;
	/** @var string $imageType */
	public $imageType;
	/** @var string $imageLink */
	public $imageLink;

	/**
	 * Conference constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->conferenceId = $data['id'];
		$this->conferenceId = $data['topic'];
		$this->conferenceId = $data['topic_custom'];
		$this->conferenceId = $data['count'];
		$this->conferenceId = $data['group'];
		$this->conferenceId = $data['timestamp_end'];
		$this->conferenceId = $data['read'];
		$this->conferenceId = $data['read_count'];
		$this->conferenceId = $data['read_mid'];
		list( $this->imageType, $this->imageLink ) = explode( ':', $data['image'] );
	}

}