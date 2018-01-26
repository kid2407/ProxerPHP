<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 10:00
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Notification {

	const USER_BOARDMESSAGE = 'user_boardmessage';
	const USER_BOARDREPLY = 'user_boardreply';
	const USER_FRIENDACCEPT = 'user_friendaccept';
	const SUBS_PROJECTSTATE = 'subs_projectstate';
	const MEDIA_REMINDER = 'media_reminder';
	const TICKET = 'ticket';
	const TICKET_REMINDER = 'ticket_reminder';
	const TICKET_MENTION = 'ticket_mention';
	const FORUM_POST = 'forum_post';
	const FORUM_TOPIC = 'forum_topic';
	const GALLERY_ALBUM = 'gallery2_album';
	const APPS_RELEASE = 'apps_release';
	const APPS_STATE = 'apps_state';
	const PODCAST = 'podcast';

	/** @var int $id */
	public $id;
	/** @var string $type */
	public $type;
	/** @var int $typeId */
	public $typeId;
	/** @var string $link */
	public $link;
	/** @var string $linktext */
	public $linktext;
	/** @var int $time */
	public $time;
	/** @var string $description */
	public $description;

	/**
	 * Notification constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id          = $data['id'];
		$this->type        = $data['type'];
		$this->typeId      = $data['tid'];
		$this->link        = $data['link'];
		$this->linktext    = $data['linktext'];
		$this->time        = $data['time'];
		$this->description = $data['description'];
	}

}