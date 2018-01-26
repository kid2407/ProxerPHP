<?php
/**
 * Created by Tobias Franz.
 * Date: 24.01.2018
 * Time: 19:10
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Request;


class ProxerUrl {

	const FORUM_GET_TOPIC = 'forum/topic';

	const APPS_ERROR_LOG = 'apps/errorlog';

	const NOTIFICATIONS_GET_COUNT = 'notifications/count';
	const NOTIFICATIONS_GET_NEWS = 'notifications/news';
	const NOTIFICATIONS_GET_NOTIFICATIONS = 'notifications/notifications';
	const NOTIFICATIONS_DELETE_NOTIFICATIONS = 'notifications/delete';

	const NEWS_IMAGE_PATH = 'https://cdn.proxer.me/news/%s_%s.png';
	const NEWS_THUMBNAIL_PATH = 'https://cdn.proxer.me/news/th/%s_%s.png';
	const NEWS_LINK = 'https://proxer.me/forum/%d/%d';

	const MESSENGER_GET_CONSTANTS = 'messenger/constants';
	const MESSENGER_GET_CONFERENCES = 'messenger/conferences';
	const MESSENGER_GET_CONFERENCE_INFO = 'messenger/conferenceinfo';
	const MESSENGER_GET_USER_INFO = 'messenger/userinfo';
	const MESSENGER_GET_MESSAGES = 'messenger/messages';
	const MESSENGER_NEW_CONFERENCE = 'messenger/newconference';
	const MESSENGER_NEW_CONFERENCE_GROUP = 'messenger/newconferencegroup';
	const MESSENGER_REPORT_CONFERENCE = 'messenger/report';
	const MESSENGER_SEND_MESSAGE = 'messenger/setmessage';
	const MESSENGER_SET_READ = 'messenger/setread';
	const MESSENGER_SET_UNREAD = 'messenger/setunread';
	const MESSENGER_SET_BLOCK = 'messenger/setblock';
	const MESSENGER_SET_UNBLOCK = 'messenger/setunblock';
	const MESSENGER_SET_FAVOUR = 'messenger/setfavour';
	const MESSENGER_SET_UNFAVOUR = 'messenger/setunfavour';

	const HEADER_RANDOM = 'media/randomheader';
	const HEADER_LIST = 'media/headerlist';

	const CALENDAR_PATH = 'media/calendar';

}