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

}