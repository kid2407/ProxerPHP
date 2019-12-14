<?php


namespace ProxerPHP\Api;


class Methods {

    const ANIME_STREAM           = 'anime/streams';
    const ANIME_STREAM_LINK      = 'anime/link';
    const ANIME_STREAM_LINKS_ADS = 'anime/linkvast';
    const ANIME_STREAM_PROXER    = 'anime/proxerstreams';

    const APPS_ERRORLOG = 'apps/errorlog';

    const CHAT_MY_ROOMS          = 'chat/myrooms';
    const CHAT_MESSAGES_HISTORY  = 'chat/messages';
    const CHAT_MESSAGES_UNREAD   = 'chat/newmessages';
    const CHAT_MESSAGE_SEND      = 'chat/newmessage';
    const CHAT_MESSAGE_DELETE    = 'chat/deletemessage';
    const CHAT_MESSAGE_REPORT    = 'chat/reportmessage';
    const CHAT_ROOM_INFO         = 'chat/roominfo';
    const CHAT_ROOM_USERS        = 'chat/roomusers';
    const CHAT_ROOMS_PUBLIC      = 'chat/publicrooms';
    const CHAT_THANK_YOU_MESSAGE = 'chat/thankyoumessage';

    const FORUM_TOPIC = 'forum/topic';

    const INFO_COMPANY                 = 'info/industry';
    const INFO_ENTRY_BASIC             = 'info/entry';
    const INFO_ENTRY_COMMENTS          = 'info/comments';
    const INFO_ENTRY_EPISODES          = 'info/listinfo';
    const INFO_ENTRY_FULL              = 'info/fullentry';
    const INFO_ENTRY_GENRES            = 'info/entrygenres';
    const INFO_ENTRY_GET_CHARACTER     = 'info/character';
    const INFO_ENTRY_GET_CHARACTERS    = 'info/characters';
    const INFO_ENTRY_GET_FORUM_TOPICS  = 'info/forum';
    const INFO_ENTRY_GET_PERSON        = 'info/person';
    const INFO_ENTRY_GET_PERSONS       = 'info/persons';
    const INFO_ENTRY_GET_USER_LIST     = 'info/userinfo';
    const INFO_ENTRY_IS_ADULT          = 'info/gate';
    const INFO_ENTRY_LANGUAGES         = 'info/lang';
    const INFO_ENTRY_PUBLISHER         = 'info/publisher';
    const INFO_ENTRY_RECOMMENDATIONS   = 'info/recommendations';
    const INFO_ENTRY_RELATIONS         = 'info/relations';
    const INFO_ENTRY_SEASON            = 'info/season';
    const INFO_ENTRY_SYNONYMES         = 'info/names';
    const INFO_ENTRY_TAGS              = 'info/entrytags';
    const INFO_ENTRY_TRANSLATOR_GROUPS = 'info/groups';
    const INFO_ENTRY_SET_USER_LIST     = 'info/setuserinfo';
    const INFO_TRANSLATOR_GROUP        = 'info/translatorgroup';

    const LIST_ENTRIES                      = 'list/entrylist';
    const LIST_ENTRY_SEARCH                 = 'list/entrysearch';
    const LIST_TAG_IDS                      = 'list/tagids';
    const LIST_TAGS                         = 'list/tags';
    const LIST_TRANSLATORGROUPS             = 'list/translatorgroups';
    const LIST_COMPANIES                    = 'list/industrys';
    const LIST_ENTRIES_FOR_TRANSLATOR_GROUP = 'list/translatorggroupsprojects';
    const LIST_ENTRIES_FOR_COMPANY          = 'list/industryprojects';
    const LIST_CHARACTERS                   = 'list/characters';
    const LIST_PERSONS                      = 'list/persons';

    const MANGA_CHAPTER = 'manga/chapter';

    const MEDIA_CALENDAR      = 'media/calendar';
    const MEDIA_HEADER_LIST   = 'media/headerlist';
    const MEDIA_RANDOM_HEADER = 'media/randomheader';
    const MEDIA_VASTTAG       = 'media/vasttag';

    const MESSENGER_CONFERENCES_LIST        = 'messenger/conferences';
    const MESSENGER_CONFERENCE_INFO         = 'messenger/conferenceinfo';
    const MESSENGER_CONFERENCE_BLOCK        = 'messenger/setblock';
    const MESSENGER_CONFERENCE_CREATE       = 'messenger/newconference';
    const MESSENGER_CONFERENCE_FAVOUR       = 'messenger/setfavour';
    const MESSENGER_CONFERENCE_GET_MESSAGES = 'messenger/messages';
    const MESSENGER_CONFERENCE_GROUP_CREATE = 'messenger/newconferencegroup';
    const MESSENGER_CONFERENCE_MARK_READ    = 'messenger/setread';
    const MESSENGER_CONFERENCE_MARK_UNREAD  = 'messenger/setunread';
    const MESSENGER_CONFERENCE_REPORT       = 'messenger/report';
    const MESSENGER_CONFERENCE_UNBLOCK      = 'messenger/setunblock';
    const MESSENGER_CONFERENCE_UNFAVOUR     = 'messenger/setunfavour';
    const MESSENGER_CONSTANTS               = 'messenger/constants';
    const MESSENGER_SEND                    = 'messenger/setmessage';
    const MESSENGER_USER_INFO               = 'messenger/userinfo';

    const NOTIFICATIONS_COUNT  = 'notifications/count';
    const NOTIFICATIONS_NEWS   = 'notifications/news';
    const NOTIFICATIONS_GET    = 'notifications/notifications';
    const NOTIFICATIONS_DELETE = 'notifications/delete';

    const UCP_LIST              = 'ucp/list';
    const UCP_LIST_COUNTS       = 'ucp/listsum';
    const UCP_TOP_TEN           = 'ucp/topten';
    const UCP_HISTORY           = 'ucp/history';
    const UCP_COMMENT_VOTES     = 'ucp/votes';
    const UCP_BOOKMARKS_GET     = 'ucp/reminder';
    const UCP_BOOKMARK_DELETE   = 'ucp/deletereminder';
    const UCP_FAVOURITE_DELETE  = 'ucp/deleterefavorite';
    const UCP_VOTE_DELETE       = 'ucp/deleterevote';
    const UCP_WATCHED_COUNT_SET = 'ucp/setcommentstate';
    const UCP_BOOKMARK_SET      = 'ucp/setreminder';
    const UCP_SETTINGS_GET      = 'ucp/settings';
    const UCP_SETTINGS_SET      = 'ucp/setsettings';

    const USER_LOGIN        = 'user/login';
    const USER_LOGOUT       = 'user/logout';
    const USER_USERINFO     = 'user/userinfo';
    const USER_TOPTEN       = 'user/topten';
    const USER_LIST         = 'user/list';
    const USER_COMMENTS     = 'user/comments';
    const USER_HISTORY      = 'user/history';
    const USER_AUTH_REQUEST = 'user/requestauth';
    const USER_AUTH_CONFIRM = 'user/checkauth';
    const USER_FRIENDS      = 'user/friends';

}