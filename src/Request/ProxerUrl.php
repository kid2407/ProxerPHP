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

	const INFO_GET_FULL_ENTRY = 'info/fullentry';
	const INFO_GET_BASIC_ENTRY = 'info/entry';
	const INFO_GET_SYNONYMS = 'info/names';
	const INFO_GET_IS_ADULT = 'info/gate';
	const INFO_GET_LANG = 'info/lang';
	const INFO_GET_SEASON = 'info/season';
	const INFO_GET_GROUPS = 'info/groups';
	const INFO_GET_PUBLISHER = 'info/publisher';
	const INFO_GET_EPISODES_OR_CHAPTERS = 'info/listinfo';
	const INFO_GET_COMMENTS = 'info/comments';
	const INFO_GET_RELATIONS = 'info/relations';
	const INFO_GET_TAGS = 'info/entrytags';
	const INFO_GET_TRANSLATORGROUP = 'info/translatorgroup';
	const INFO_GET_INDUSTRY = 'info/industry';
	const INFO_GET_RECOMMENDATIONS = 'info/recommendations';
	const INFO_SET_USER_ENTRY = 'info/setuserinfo';
	const INFO_GET_USER_ENTRY = 'info/userinfo';
	const INFO_GET_CHARACTERS = 'info/characters';
	const INFO_GET_PERSONS = 'info/persons';
	const INFO_GET_CHARACTER = 'info/character';
	const INFO_GET_PERSON = 'info/person';
	const INFO_GET_FORUM_ENTRIES = 'info/forum';

	const ANIME_GET_STREAMS = 'anime/streams';
	const ANIME_GET_PROXERSTREAMS = 'anime/proxerstreams';
	const ANIME_GET_STREAMLINK = 'anime/link';

	const MANGA_GET_CHAPTER = 'manga/chapter';

	const LIST_EXTENDED_SEARCH = 'list/entrysearch';
	const LIST_CATEGORY_SEARCH = 'list/entrylist';
	const LIST_GET_TAG_IDS = 'list/tagids';
	const LIST_GET_TAGS = 'list/tags';
	const LIST_GET_TRANSLATORGROUPS = 'list/translatorgroups';
	const LIST_GET_INDUSTRIES = 'list/industrys';
	const LIST_GET_TRANSLATORGROUP_PROJECTS = 'list/translatorgroupprojects';
	const LIST_GET_INDUSTRY_PROJECTS = 'list/industryprojects';
	const LIST_GET_CHARACTERS = 'list/characters';

}