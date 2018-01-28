<?php
/**
 * Created by Tobias Franz.
 * Date: 27.01.2018
 * Time: 16:12
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Entry;
use ProxerPHP\Entities\Entry\Chapter;
use ProxerPHP\Entities\Entry\Character;
use ProxerPHP\Entities\Entry\Comment;
use ProxerPHP\Entities\Entry\Episode;
use ProxerPHP\Entities\Entry\ForumEntry;
use ProxerPHP\Entities\Entry\Hoster;
use ProxerPHP\Entities\Entry\Person;
use ProxerPHP\Entities\Entry\Recommendation;
use ProxerPHP\Entities\EntrySeason;
use ProxerPHP\Entities\Publisher;
use ProxerPHP\Entities\Synonym;
use ProxerPHP\Entities\Tag;
use ProxerPHP\Entities\Translatorgroup;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class EntryDAO {

	/**
	 * Diese Funktion gibt fast ALLE Informationen fuer einen Eintrag zurueck
	 * und ist somit stark belastend fuer den Server. Bitte nur benutzen,
	 * wenn wirklich fast ALLE Informationen benoetigt werden.
	 *
	 * @param int $entryId
	 *
	 * @return Entry
	 * @throws ProxerException
	 */
	public static function getFullEntry( $entryId ) {
		return new Entry( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_FULL_ENTRY, [ 'id' => $entryId ] ) );
	}

	/**
	 * Gibt grundlegende Informationen zu einem Entry zurueck.
	 * Zusaetzliche Informationen koennen mithilfe der add* Methoden zu einem Entry-Object hinzugefuegt werden.
	 *
	 * @param int $entryId
	 *
	 * @return Entry
	 * @throws ProxerException
	 */
	public static function getBasicEntry( $entryId ) {
		return new Entry( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_BASIC_ENTRY, [ 'id' => $entryId ] ) );
	}

	/**
	 * Gibt eine neue Instanz von Entry zurueck, die alle Eigenschaften enthaelt,
	 * die mithilfe von $properties angegeben wurden.
	 * Gueltige Werte sind als Konstanten in der Entry Klasse hinterlegt und folgen dem Muster TYPE_*,
	 * wobei TYPE_FULL und TYPE_BASIC hier nicht verwendet werden.
	 *
	 * @param int $entryId
	 * @param array $properties
	 *
	 * @return Entry
	 * @throws ProxerException
	 */
	public static function getEntryWithProperties( $entryId, $properties ) {
		$entry = self::getBasicEntry( $entryId );

		if ( in_array( Entry::TYPE_CHAPTERS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_CHAPTERS );
		} else if ( in_array( Entry::TYPE_CHARACTERS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_CHARACTERS );
		} elseif ( in_array( Entry::TYPE_COMMENTS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_COMMENTS );
		} elseif ( in_array( Entry::TYPE_EPISODES, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_EPISODES );
		} elseif ( in_array( Entry::TYPE_FORUM, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_FORUM );
		} elseif ( in_array( Entry::TYPE_GROUPS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_GROUPS );
		} elseif ( in_array( Entry::TYPE_IS_ADULT, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_IS_ADULT );
		} elseif ( in_array( Entry::TYPE_LANGS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_LANGS );
		} elseif ( in_array( Entry::TYPE_PERSONS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_PERSONS );
		} elseif ( in_array( Entry::TYPE_PUBLISHER, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_PUBLISHER );
		} elseif ( in_array( Entry::TYPE_RECOMMENDATIONS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_RECOMMENDATIONS );
		} elseif ( in_array( Entry::TYPE_RELATIONS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_RELATIONS );
		} elseif ( in_array( Entry::TYPE_SEASONS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_SEASONS );
		} elseif ( in_array( Entry::TYPE_SYNONYMS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_SYNONYMS );
		} elseif ( in_array( Entry::TYPE_TAGS, $properties ) ) {
			self::addPropertyToEntry( $entry, Entry::TYPE_TAGS );
		}

		return $entry;
	}

	/**
	 * @param Entry $entry
	 * @param string $property
	 *
	 * @throws ProxerException
	 */
	public static function addPropertyToEntry( &$entry, $property ) {
		switch ( $property ) {
			case Entry::TYPE_CHAPTERS:
				$entry->chapters = self::createEntitiesFromArray( ProxerUrl::INFO_GET_EPISODES_OR_CHAPTERS, Entry::TYPE_CHAPTERS );
				break;
			case Entry::TYPE_CHARACTERS:
				$entry->characters = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_CHARACTERS, [ 'id' => $entry->id ] ), Entry::TYPE_CHARACTERS );
				break;
			case Entry::TYPE_COMMENTS:
				$entry->comments = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_COMMENTS, [ 'id' => $entry->id ] ), Entry::TYPE_COMMENTS );
				break;
			case Entry::TYPE_EPISODES:
				$entry->episodes = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_EPISODES_OR_CHAPTERS, [ 'id' => $entry->id ] ), Entry::TYPE_EPISODES );
				break;
			case Entry::TYPE_FORUM:
				$entry->forumEntries = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_FORUM_ENTRIES, [ 'id' => $entry->id ] ), Entry::TYPE_FORUM );
				break;
			case Entry::TYPE_GROUPS:
				$entry->groups = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_GROUPS, [ 'id' => $entry->id ] ), Entry::TYPE_GROUPS );
				break;
			case Entry::TYPE_IS_ADULT:
				$entry->isAdult = ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_IS_ADULT, [ 'id' => $entry->id ] )[0];
				break;
			case Entry::TYPE_LANGS:
				$entry->languages = ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_LANG, [ 'id' => $entry->id ] );
				break;
			case Entry::TYPE_PERSONS:
				$entry->persons = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_PERSONS, [ 'id' => $entry->id ] ), Entry::TYPE_PERSONS );
				break;
			case Entry::TYPE_PUBLISHER:
				$entry->publisher = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_PUBLISHER, [ 'id' => $entry->id ] ), Entry::TYPE_PUBLISHER );
				break;
			case Entry::TYPE_RECOMMENDATIONS:
				$entry->recommendations = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_RECOMMENDATIONS, [ 'id' => $entry->id ] ), Entry::TYPE_RECOMMENDATIONS );
				break;
			case Entry::TYPE_RELATIONS:
				$entry->relations = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_RELATIONS, [ 'id' => $entry->id ] ), Entry::TYPE_RELATIONS );
				break;
			case Entry::TYPE_SEASONS:
				$entry->relations = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_SEASON, [ 'id' => $entry->id ] ), Entry::TYPE_SEASONS );
				break;
			case Entry::TYPE_SYNONYMS:
				$entry->relations = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_SYNONYMS, [ 'id' => $entry->id ] ), Entry::TYPE_SYNONYMS );
				break;
			case Entry::TYPE_TAGS:
				$entry->relations = self::createEntitiesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::INFO_GET_TAGS, [ 'id' => $entry->id ] ), Entry::TYPE_TAGS );
				break;
		}
	}

	/**
	 * @param $dataArray
	 * @param $entryEntityType
	 *
	 * @return array
	 */
	public static function createEntitiesFromArray( $dataArray, $entryEntityType ) {
		$entities = [];
		switch ( $entryEntityType ) {
			case Entry::TYPE_SYNONYMS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Synonym( (array) $data );
				}
				break;
			case Entry::TYPE_SEASONS:
				foreach ( $dataArray as $data ) {
					$entities[] = new EntrySeason( (array) $data );
				}
				break;
			case Entry::TYPE_GROUPS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Translatorgroup( (array) $data );
				}
				break;
			case Entry::TYPE_PUBLISHER:
				foreach ( $dataArray as $data ) {
					$entities[] = new Publisher( (array) $data );
				}
				break;
			case Entry::TYPE_TAGS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Tag( (array) $data );
				}
				break;
			case Entry::TYPE_CHARACTERS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Character( (array) $data );
				}
				break;
			case Entry::TYPE_PERSONS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Person( (array) $data );
				}
				break;
			case Entry::TYPE_FORUM:
				foreach ( $dataArray as $data ) {
					$entities[] = new ForumEntry( (array) $data );
				}
				break;
			case Entry::TYPE_COMMENTS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Comment( $data );
				}
				break;
			case Entry::TYPE_RECOMMENDATIONS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Recommendation( $data );
				}
				break;
			case Entry::TYPE_RELATIONS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Entry( $data );
				}
				break;
			case Entry::TYPE_EPISODES:
				foreach ( $dataArray as $data ) {
					$entities[] = new Episode( $data );
				}
				break;
			case Entry::TYPE_CHAPTERS:
				foreach ( $dataArray as $data ) {
					$entities[] = new Chapter( $data );
				}
				break;
			case Entry::TYPE_HOSTER:
				foreach ( $dataArray['names'] as $index => $name ) {
					$entities[] = new Hoster( $name, $dataArray['images'][ $index ] );
				}
				break;
		}

		return $entities;
	}

}