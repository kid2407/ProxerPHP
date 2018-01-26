<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 18:33
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class CalendarEntry {

	/** @var int $calendarEntryId */
	public $calendarEntryId;
	/** @var int $entryId */
	public $entryId;
	/** @var int $episodeIndex */
	public $episodeIndex;
	/** @var string $episodeTitle */
	public $episodeTitle;
	/** @var int $airingTimeGermany */
	public $airingTimeGermany;
	/** @var string $airingTimezone */
	public $airingTimezone;
	/** @var int $industryId */
	public $industryId;
	/** @var string $dayOfWeek */
	public $dayOfWeek;
	/** @var int $estimatedAiringTime */
	public $estimatedAiringTime;
	/** @var string $entryname */
	public $entryname;
	/** @var string $genre */
	public $genre;
	/** @var int $ratingSum */
	public $ratingSum;
	/** @var int $ratingCount */
	public $ratingCount;
	/** @var float $averageRating */
	public $averageRating;
	/** @var string $industryName */
	public $industryName;

	/**
	 * Calendar constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
	}

}