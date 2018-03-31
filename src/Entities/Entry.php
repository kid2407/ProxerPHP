<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 21:38
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use ProxerPHP\DAOs\EntryDAO;
use ProxerPHP\Entities\Entry\Chapter;
use ProxerPHP\Entities\Entry\Character;
use ProxerPHP\Entities\Entry\Comment;
use ProxerPHP\Entities\Entry\Episode;
use ProxerPHP\Entities\Entry\ForumEntry;
use ProxerPHP\Entities\Entry\Person;
use ProxerPHP\Entities\Entry\Recommendation;

class Entry {

	const TYPE_FULL = 'full';
	const TYPE_BASIC = 'basic';
	const TYPE_SYNONYMS = 'synonyms';
	const TYPE_IS_ADULT = 'isAdult';
	const TYPE_LANGS = 'langs';
	const TYPE_SEASONS = 'seasons';
	const TYPE_GROUPS = 'groups';
	const TYPE_PUBLISHER = 'publisher';
	const TYPE_COMMENTS = 'comments';
	const TYPE_RELATIONS = 'relations';
	const TYPE_TAGS = 'tags';
	const TYPE_RECOMMENDATIONS = 'recommendations';
	const TYPE_CHARACTERS = 'characters';
	const TYPE_PERSONS = 'persons';
	const TYPE_FORUM = 'forum';
	const TYPE_EPISODES = 'episodes';
	const TYPE_CHAPTERS = 'chapters';
	const TYPE_HOSTER = 'hoster';
	const TYPE_TRANSLATORGROUP_PROJECTS = 'translatorgroupprojects';
	const TYPE_INDUSTRY_PROJECTS = 'industryprojects';

	/** @var int $id */
	public $id;
	/** @var string $name */
	public $name;
	/** @var array $genre */
	public $genre;
	/** @var array $fsk */
	public $fsk;
	/** @var string $description */
	public $description;
	/** @var string $medium */
	public $medium;
	/** @var string $adaptionType */
	public $adaptionType;
	/** @var int|string $adaptionValue */
	public $adaptionValue;
	/** @var int $totalEpisodeOrChapterCount */
	public $totalEpisodeOrChapterCount;
	/** @var int $state */
	public $state;
	/** @var int $rateSum */
	public $rateSum;
	/** @var int $rateCount */
	public $rateCount;
	/** @var int $hits */
	public $hits;
	/** @var string */
	public $categoryType;
	/** @var int $license */
	public $license;
	/** @var bool $isAdult */
	public $isAdult;
	/** @var Adaption|null $adaptionData */
	public $adaptionData;
	/** @var Synonym[]|null $names */
	public $names;
	/** @var array $languages */
	public $languages;
	/** @var EntrySeason[] $seasons */
	public $seasons;
	/** @var Translatorgroup[] $groups */
	public $groups;
	/** @var Publisher[] $publisher */
	public $publisher;
	/** @var Tag[] $tags */
	public $tags;
	/** @var Character[] $characters */
	public $characters;
	/** @var Person[] $persons */
	public $persons;
	/** @var ForumEntry[] $forumEntries */
	public $forumEntries;
	/** @var Comment[] $comments */
	public $comments;
	/** @var Recommendation[] $recommendations */
	public $recommendations;
	/** @var Entry[] $relations */
	public $relations;
	/** @var Episode[] $episodes */
	public $episodes;
	/** @var Chapter[] $chapters */
	public $chapters;

	/**
	 * Diese Klasse repraesentiert den Eintrag eines Anime oder Manga auf Proxer,
	 * dazu zaehlen fast alle Eigenschaften, die ueber die Detailseite zu erreichen sind.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->id                         = $data['id'];
		$this->name                       = $data['name'];
		$this->genre                      = explode( ' ', $data['genre'] );
		$this->fsk                        = explode( ' ', $data['fsk'] );
		$this->description                = $data['description'];
		$this->medium                     = $data['medium'];
		$this->adaptionType               = $data['adaption_type'];
		$this->adaptionValue              = $data['adaption_value'];
		$this->totalEpisodeOrChapterCount = $data['count'];
		$this->state                      = $data['state'];
		$this->rateSum                    = $data['rate_sum'];
		$this->rateCount                  = $data['rate_count'];
		$this->hits                       = $data['clicks'];
		$this->categoryType               = $data['cat'];
		$this->license                    = $data['license'];
		$this->isAdult                    = $data['gate'];
		$this->adaptionData               = new Adaption( (array) $data['adaption_data'] );
		$this->names                      = EntryDAO::createEntitiesFromArray( $data['names'], 'synonym' );
		$this->languages                  = $data['lang'];
		$this->seasons                    = EntryDAO::createEntitiesFromArray( $data['seasons'], 'seasons' );
		$this->groups                     = EntryDAO::createEntitiesFromArray( $data['groups'], 'groups' );
		$this->publisher                  = EntryDAO::createEntitiesFromArray( $data['publisher'], 'publisher' );
		$this->tags                       = EntryDAO::createEntitiesFromArray( $data['tags'], 'tags' );
		$this->characters                 = EntryDAO::createEntitiesFromArray( $data['characters'], Entry::TYPE_CHARACTERS );
		$this->persons                    = EntryDAO::createEntitiesFromArray( $data['persons'], 'persons' );
		$this->forumEntries               = EntryDAO::createEntitiesFromArray( $data['forum'], 'forum' );
	}

}