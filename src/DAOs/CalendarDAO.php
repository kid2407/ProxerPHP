<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 19:00
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\Calendar;
use ProxerPHP\Entities\CalendarEntry;
use ProxerPHP\Exceptions\ProxerException;
use ProxerPHP\Request\ProxerRequest;
use ProxerPHP\Request\ProxerUrl;

class CalendarDAO {

	/**
	 * @return Calendar
	 * @throws ProxerException
	 */
	public static function getCalendar() {
		$calendar = new Calendar();
		$entries  = self::createCalendarEntriesFromArray( ProxerRequest::sendPostRequest( ProxerUrl::CALENDAR_PATH ) );
		self::applyEntriesToCalendar( $entries, $calendar );

		return $calendar;
	}

	/**
	 * @param array $dataArray
	 *
	 * @return CalendarEntry[]
	 */
	public static function createCalendarEntriesFromArray( $dataArray ) {
		$entries = [];
		foreach ( $dataArray as $data ) {
			$entries[] = new CalendarEntry( (array) $data );
		}

		return $entries;
	}

	/**
	 * @param CalendarEntry[] $entries
	 * @param Calendar $calendar
	 */
	public static function applyEntriesToCalendar( $entries, &$calendar ) {
		foreach ( $entries as $entry ) {
			$calendar->addEntry( $entry->dayOfWeek, $entry );
		}
	}

}