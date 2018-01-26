<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 19:09
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Calendar {

	public $entries = [
		'mon' => [],
		'tue' => [],
		'wed' => [],
		'thu' => [],
		'fri' => [],
		'sat' => [],
		'sun' => []
	];

	/**
	 * @param string $dayOfWeek
	 * @param CalendarEntry $entry
	 */
	public function addEntry( $dayOfWeek, $entry ) {
		$this->entries[ $dayOfWeek ][] = $entry;
		usort( $this->entries[ $dayOfWeek ], function ( $a, $b ) {
			return $a->airingTimeGermany < $b->airingTimeGermany ? - 1 : ( $a->airingTimeGermany > $b->airingTimeGermany ? 1 : 0 );
		} );
	}

	/**
	 * @param string $dayOfWeek
	 *
	 * @return CalendarEntry[]
	 */
	public function getEntriesForDayOfWeek( $dayOfWeek ) {
		return $this->entries[ $dayOfWeek ];
	}

}