<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 19:48
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Entry;
use ProxerPHP\Entities\IndustryProject;
use ProxerPHP\Entities\Tag;
use ProxerPHP\Entities\Translatorgroup;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class ListDAO {

	const LANG_BOTH = '';
	const LANG_DE = 'de';
	const LANG_EN = 'en';

	const TYPE_ANIME_SERIES = 'animeseries';
	const TYPE_ANIME_MOVIE = 'movie';
	const TYPE_ANIME_OVA = 'ova';
	const TYPE_MANGA_SERIES = 'mangaseries';
	const TYPE_MANGA_ONESHOT = 'oneshot';
	const TYPE_MANGA_DOUJIN = 'doujin';
	const TYPE_ANIME_HENTAI = 'hentai';
	const TYPE_MANGA_HENTAI = 'hmanga';
	const TYPE_ANIME_ALL_NO_H = 'all-anime';
	const TYPE_MANGA_ALL_NO_H = 'all-manga';
	const TYPE_ALL_NO_H = 'all';
	const TYPE_ALL_H = 'all18';

	const FSK_FSK_0 = 'fsk0';
	const FSK_FSK_6 = 'fsk6';
	const FSK_FSK_12 = 'fsk12';
	const FSK_FSK_16 = 'fsk16';
	const FSK_FSK_18 = 'fsk18';
	const FSK_BAD_LANGUAGE = 'bad_language';
	const FSK_VIOLENCE = 'violence';
	const FSK_FEAR = 'fear';
	const FSK_SEX = 'sex';

	const SORT_RELEVANCE = 'relevance';
	const SORT_CLICK_COUNT = 'clicks';
	const SORT_RATING = 'rating';
	const SORT_EPISODE_OR_CHAPTER_COUNT = 'count';
	const SORT_ALPHABET = 'name';

	const LIMIT_LENGHT_NONE = '';
	const LIMIT_LENGHT_MIN = 'up';
	const LIMIT_LENGHT_MAX = 'down';

	const SPOILER_NONE = 'spoiler_0';
	const SPOILER_ONLY = 'spoiler_1';
	const SPOILER_ALL = 'spoiler_10';

	const CATEGORY_ANIME = 'anime';
	const CATEGORY_MANGA = 'manga';

	const STATE_PRE_AIRING = 0;
	const STATE_FINISHED = 1;
	const STATE_AIRING = 2;
	const STATE_CANCALLED = 3;
	const STATE_FINISHED_SUB_NOT_FINISHED = 4;

	const SEASON_WINTER = 1;
	const SEASON_SPRING = 2;
	const SEASON_SUMMER = 3;
	const SEASON_AUTUMN = 4;

	const CATEGORY_SORT_TITLE = 'title';
	const CATEGORY_SORT_CLICKS = 'clicks';
	const CATEGORY_SORT_RATING = 'rating';

	const TAGS_TYPE_ENTRY_GENRE = 'entry_genre';
	const TAGS_TYPE_ENTRY_TAG = 'entry_tag';
	const TAGS_TYPE_ENTRY_H = 'entry_tag_h';
	const TAGS_TYPE_GALLERY = 'gallery';

	const TAGS_SORT_ID = 'id';
	const TAGS_SORT_TYPE = 'type';
	const TAGS_SORT_TAG = 'tag';
	const TAGS_SORT_DESCRIPTION = 'description';
	const TAGS_SORT_BLACKLIST = 'blacklist';
	const TAGS_SORT_SUBTYPE = 'subtype';

	const TAGS_SUBTYPE_MISC = 'misc';
	const TAGS_SUBTYPE_PERSONALITIES = 'persoenlichkeiten';
	const TAGS_SUBTYPE_FEELINGS = 'gefuehle';
	const TAGS_SUBTYPE_DRAWING = 'zeichnung';
	const TAGS_SUBTYPE_SUPERNATURAL = 'uebernatuerliches';
	const TAGS_SUBTYPE_SPORTS = 'sport';
	const TAGS_SUBTYPE_HUMANS = 'menschen';
	const TAGS_SUBTYPE_FUTURE = 'zukunft';
	const TAGS_SUBTYPE_STORY = 'story';
	const TAGS_SUBTYPE_PROTAGONIST = 'prota';

	const GROUP_HENTAI_NONE = - 1;
	const GROUP_HENTAI_BOTH = 0;
	const GROUP_HENTAI_ONLY_HENTAI = 1;

	const INDUSTRY_TYPE_PUBLISHER = 'publisher';
	const INDUSTRY_TYPE_STUDIO = 'studio';
	const INDUSTRY_TYPE_PRODUCER = 'producer';
	const INDUSTRY_TYPE_RECORD_LABEL = 'record_label';
	const INDUSTRY_TYPE_TALENT_AGENT = 'talent__agent';
	const INDUSTRY_TYPE_STREAMING = 'streaming';

	const DESCRIPTION_INTRO = 'intro';
	const DESCRIPTION_APPEARANCE = 'appearance';
	const DESCRIPTION_PERSONALITY = 'personality';
	const DESCRIPTION_SKILLS = 'skills';
	const DESCRIPTION_PAST = 'past';
	const DESCRIPTION_PRESENT = 'present';
	const DESCRIPTION_TRIVIA = 'trivia';

	/**
	 * @param string $keyword Der Suchbegriff, kann auch leer sein
	 * @param string $language Die Sprache in der die Eintraege gesucht werden. Werte: LANG_*
	 * @param string $type Nach welcher Art von Medium gesucht werden soll. Werte: TYPE_*
	 * @param array $genres Array von Genres, die die Suchergebnisse enthalten sollen
	 * @param array $ignoredGenres Array von Genres, die die Suchergebnisse NICHT enthalten sollen
	 * @param array $fsk Array von Freigabefilter, die die Suchergebnisse aufweisen sollen. Werte: FSK_*
	 * @param string $sort Wonach die Suchergebnisse sortiert werden sollen. Werte: SORT_*
	 * @param null|int $episodeOrChapterCount Wenn angegeben, dann kann in Verbindung mit $episodeOrChapterCountLimit festgelegt werden, dass jeder Eintrag eine bestimmte Menge an Episoden aufweisen muss bzw. amximal darf.
	 * @param string $episodeOrChapterCountLimit Wenn $episodeOrChapterCount gesetzt dit, so gibt dieser Parameter an, ob die Eintraege weniger (LIMIT_LENGHT_MAX) oder mindestens (LIMIT_LENGHT_MIN) die gegebene Zahl an Episoden vorweisen muessen.
	 * @param array $tags Array der Tags, die die Suchergebnisse enthalten sollen.
	 * @param array $ignoredTags Array der Tags, die die Suchergebnisse NICHT enthalten sollen.
	 * @param bool $showUnknowTags Gibt an, ob unbewertete(?) Tags angezeigt werden sollen.
	 * @param string $showSpoilers Legt fest, ob Spoiler angezeigt werden sollen. Werte: SPOILER_*
	 * @param int $page Seite des Suchergebnisses.
	 * @param int $pageLimit Maximale Anzahl der Beitraege pro Seite.
	 *
	 * @return Entry[]
	 * @throws ProxerException
	 */
	public static function search( $keyword = '', $language = self::LANG_BOTH, $type = self::TYPE_ALL_NO_H, $genres = [], $ignoredGenres = [], $fsk = [], $sort = self::SORT_RELEVANCE, $episodeOrChapterCount = null, $episodeOrChapterCountLimit = self::LIMIT_LENGHT_MAX, $tags = [], $ignoredTags = [], $showUnknowTags = false, $showSpoilers = self::SPOILER_NONE, $page = 0, $pageLimit = 100 ) {
		$options = [];

		if ( strlen( $keyword ) > 0 ) {
			$options['name'] = $keyword;
		}

		if ( strlen( $language ) > 0 ) {
			$options['language'] = $language;
		}

		if ( $type !== self::TYPE_ALL_NO_H ) {
			$options['type'] = $type;
		}

		if ( ! empty( $genres ) ) {
			$options['genre'] = implode( ' ', $genres );
		}

		if ( ! empty( $ignoredGenres ) ) {
			$options['nogenre'] = implode( ' ', $ignoredGenres );
		}

		if ( ! empty( $fsk ) ) {
			$options['fsk'] = implode( ' ', $fsk );
		}

		if ( $sort !== self::SORT_RELEVANCE ) {
			$options['sort'] = $sort;
		}

		if ( is_int( $episodeOrChapterCount ) ) {
			$options['length'] = $episodeOrChapterCount;
			if ( $episodeOrChapterCountLimit !== self::LIMIT_LENGHT_MAX ) {
				$options['length-limit'] = $episodeOrChapterCountLimit;
			}
		}

		if ( ! empty( $tags ) ) {
			$options['tags'] = implode( ' ', $tags );
		}

		if ( ! empty( $ignoredTags ) ) {
			$options['notags'] = implode( ' ', $ignoredTags );
		}

		if ( $showUnknowTags === true ) {
			$options['tagratefilter'] = 'rate_10';
		}

		if ( $showSpoilers !== self::SPOILER_NONE ) {
			$options['tagspoilerfilter'] = $showSpoilers;
		}

		if ( $page != 0 ) {
			$options['p'] = $page;
		}

		if ( $pageLimit !== 100 ) {
			$options['limit'] = $pageLimit;
		}

		$result = ProxerRequest::sendPostRequest( ProxerUrl::LIST_EXTENDED_SEARCH, $options );

		return EntryDAO::createEntitiesFromArray( $result, [ Entry::TYPE_BASIC ] );
	}

	/**
	 * @param string $category Kategorie in der gesucht werden soll. Werte: CATEGORY_ANIME und CATAGORY_MANGA
	 * @param string $medium Nach welchem Medium gesucht werden soll. Werte: TYPE_*, ausgenommen sind TYPE_ALL_NO_H, TYPE_ALL_H, TYPE_ANIME_ALL_NO_H, TYPE_MANGA_ALL_NO_H
	 * @param bool $allowHentai Ob Hentais im Suchergebnis auftauchen sollen.
	 * @param int $state Status des Anime/Mangas. Werte: STATE_*
	 * @param int $year Das Erscheinungsjahr
	 * @param int $season Season des Anime. Werte: SEASON_*
	 * @param string $seasonType Typ der Season. Werte: "start" und "end"
	 * @param string $startCharacters Anfangsbuchstaben, nach denen gesucht werden soll.
	 * @param string $sort Wonach sortiert werden soll. Werte:
	 * @param bool $sortDescending Ob die Ergebnisse in absteigender Reihenfolge sortiert werden sollen.
	 * @param int $page Seite des Ergbnisses.
	 * @param int $limit Maximalzahl der Eintraege pro Seite.
	 *
	 * @return Entry[]
	 * @throws ProxerException
	 */
	public static function searchInCategories( $category = self::CATEGORY_ANIME, $medium = '', $allowHentai = false, $state = null, $year = null, $season = null, $seasonType = null, $startCharacters = null, $sort = self::CATEGORY_SORT_TITLE, $sortDescending = false, $page = 0, $limit = 100 ) {
		$options = [];

		if ( $category !== self::CATEGORY_ANIME ) {
			$options['kat'] = self::CATEGORY_MANGA;
		}

		if ( strlen( $medium ) > 0 ) {
			$options['medium'] = $medium;
		}

		if ( $allowHentai === true ) {
			$options['isH'] = "true";
		}

		if ( ! is_null( $state ) ) {
			$options['state'] = $state;
		}

		if ( ! is_null( $year ) ) {
			$options['year'] = $year;
		}

		if ( ! is_null( $season ) ) {
			$options['season'] = $season;
		}

		if ( ! is_null( $seasonType ) ) {
			$options['season_type'] = $seasonType;
		}

		if ( ! is_null( $startCharacters ) ) {
			$options['start'] = $startCharacters;
		}

		if ( $sort !== self::CATEGORY_SORT_TITLE ) {
			$options['sort'] = $sort;
		}

		if ( $sortDescending === true ) {
			$options['sort_type'] = "DESC";
		}

		$result = ProxerRequest::sendPostRequest( ProxerUrl::LIST_CATEGORY_SEARCH, $options );

		return EntryDAO::createEntitiesFromArray( $result, Entry::TYPE_BASIC );
	}

	/**
	 * Gibt die IDs fuer die angegebenen Tags zurueck. Dabei werden alle Tags mit einem Minus (-)
	 * unter dem Punkt "notags" zurueckgegeben, alle anderen landen in "tags".
	 *
	 * @param array $tags
	 *
	 * @return array
	 * @throws ProxerException
	 */
	public static function getIdsForTags( $tags ) {
		return ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_TAG_IDS, implode( ' ', $tags ) );
	}

	/**
	 * @param string $search Wonach gesucht werden soll (Was irgendwo im Tagnamen vorkommen soll).
	 * @param string $tagType Welche Art von Tags geholt werden sollen. Werte: TAGS_TYPE_*
	 * @param string $sort Wonach sortiert werden soll. Werte: TAGS_SORT_*
	 * @param bool $sortDescending Ob die Werte in abteigender Reihenfolge sortiert werden sollen.
	 * @param string|null $subtype Zu welcher Kategorie die Tags gehoeren sollen, hat nur einen Effekt wenn $tagType == TAGS_TYPE_ENTRY_TAG
	 *
	 * @return Tag[]
	 * @throws ProxerException
	 */
	public static function getTags( $search = '', $tagType = null, $sort = self::TAGS_SORT_TAG, $sortDescending = false, $subtype = null ) {
		$options = [];
		if ( strlen( $search ) > 0 ) {
			$options['search'] = $search;
		}

		if ( ! is_null( $tagType ) ) {
			$options['type'] = $tagType;
		}

		if ( $sort !== self::TAGS_SORT_TAG ) {
			$options['sort'] = $sort;
		}

		if ( $sortDescending === true ) {
			$options['sort_type'] = "DESC";
		}

		if ( $tagType === self::TAGS_TYPE_ENTRY_TAG && ! is_null( $subtype ) ) {
			$options['subtype'] = $subtype;
		}

		return EntryDAO::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_TAGS ), Entry::TYPE_TAGS );
	}

	/**
	 * @param string $startsWith
	 * @param string $contains
	 * @param string $country
	 * @param int $page
	 * @param int $limit
	 *
	 * @return Translatorgroup[]
	 * @throws ProxerException
	 */
	public static function searchTranslatorGroups( $startsWith = '', $contains = '', $country = '', $page = 0, $limit = 100 ) {
		$options = [];
		if ( strlen( $startsWith ) > 0 ) {
			$options['start'] = $startsWith;
		}

		if ( strlen( $contains ) > 0 ) {
			$options['contains'] = $contains;
		}

		if ( strlen( $country ) > 0 ) {
			$options['country'] = $country;
		}

		if ( $page !== 0 ) {
			$options['p'] = $page;
		}

		if ( $limit !== 100 ) {
			$options['limit'] = $limit;
		}

		return EntryDAO::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_TRANSLATORGROUPS, $options ), Entry::TYPE_GROUPS );
	}

	/**
	 * @param string $startsWith
	 * @param string $contains
	 * @param string $country
	 * @param int $page
	 * @param int $limit
	 *
	 * @return Industry[]
	 * @throws ProxerException
	 */
	public static function searchIndustries( $startsWith = '', $contains = '', $country = '', $page = 0, $limit = 100 ) {
		$options = [];
		if ( strlen( $startsWith ) > 0 ) {
			$options['start'] = $startsWith;
		}

		if ( strlen( $contains ) > 0 ) {
			$options['contains'] = $contains;
		}

		if ( strlen( $country ) > 0 ) {
			$options['country'] = $country;
		}

		if ( $page !== 0 ) {
			$options['p'] = $page;
		}

		if ( $limit !== 100 ) {
			$options['limit'] = $limit;
		}

		return EntryDAO::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_INDUSTRIES, $options ), Entry::TYPE_PUBLISHER );
	}

	/**
	 * @param int $groupId Die Id der Subgruppe
	 * @param int|null $projectState In welchem Status sich das Projekt befinden soll. Werte: GROUP_STATE_*
	 * @param int $hentai Ob die Ausgabe Hentai enthalten soll. Werte: GROUP_HENTAI_*
	 * @param int $page
	 * @param int $limit
	 *
	 * @return TranslatorgroupProject[]
	 * @throws ProxerException
	 */
	public static function getTranslatorGroupProjects( $groupId, $projectState = null, $hentai = self::GROUP_HENTAI_NONE, $page = 0, $limit = 100 ) {
		$options = [ 'id' => $groupId ];
		if ( ! is_null( $projectState ) ) {
			$options['type'] = $projectState;
		}

		if ( $hentai !== self::GROUP_HENTAI_NONE ) {
			$options['isH'] = $hentai;
		}

		if ( $page !== 0 ) {
			$options['p'] = $page;
		}

		if ( $limit !== 100 ) {
			$options['limit'] = $limit;
		}

		return EntryDAO::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_TRANSLATORGROUP_PROJECTS, $options ), Entry::TYPE_TRANSLATORGROUP_PROJECTS );
	}

	/**
	 * @param int $industryId Die Id des Unternehmens
	 * @param int|null $industryType In welcher Rolle die Industrie vorkommen soll. Werte: INDUSTRY_TYPE_*
	 * @param int $hentai Ob die Ausgabe Hentai enthalten soll. Werte: GROUP_HENTAI_*
	 * @param int $page
	 * @param int $limit
	 *
	 * @return IndustryProject[]
	 * @throws ProxerException
	 */
	public static function getIndustryProjects( $industryId, $industryType = null, $hentai = self::GROUP_HENTAI_NONE, $page = 0, $limit = 100 ) {
		$options = [ 'id' => $industryId ];
		if ( ! is_null( $industryType ) ) {
			$options['type'] = $industryType;
		}

		if ( $hentai !== self::GROUP_HENTAI_NONE ) {
			$options['isH'] = $hentai;
		}

		if ( $page !== 0 ) {
			$options['p'] = $page;
		}

		if ( $limit !== 100 ) {
			$options['limit'] = $limit;
		}

		return EntryDAO::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::LIST_GET_INDUSTRY_PROJECTS, $options ), Entry::TYPE_INDUSTRY_PROJECTS );
	}

	/**
	 * @param string $nameStartsWith
	 * @param string $nameContains
	 * @param string $descriptionContains
	 * @param $descriptionPart
	 * @param int $page
	 * @param int $limit
	 *
	 * @return Entry\Person[]
	 * @throws ProxerException
	 */
	public static function searchCharacters( $nameStartsWith = '', $nameContains = '', $descriptionContains = '', $descriptionPart = self::DESCRIPTION_INTRO, $page = 0, $limit = 100 ) {
		$options = [];
		if ( strlen( $nameStartsWith ) > 0 ) {
			$options['start'] = $nameStartsWith;
		}

		if ( strlen( $nameContains ) > 0 ) {
			$options['contains'] = $nameContains;
		}

		if ( strlen( $descriptionContains ) > 0 ) {
			$options['search'] = $descriptionContains;
		}

		if ( $descriptionPart !== self::DESCRIPTION_INTRO ) {
			$options['subject'] = $descriptionPart;
		}

		if ( $page !== 0 ) {
			$options['p'] = $page;
		}

		if ( $limit !== 100 ) {
			$options['limit'] = $limit;
		}

		return FullCharacterDAO::createPersonFromArray(ProxerRequest::sendPostRequest(ProxerUrl::LIST_GET_CHARACTERS, $options));
	}

}