<?php
/**
 * Created by Tobias Franz.
 * Date: 28.01.2018
 * Time: 14:18
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


use ProxerPHP\DAOs\EntryDAO;
use ProxerPHP\Entities\Entry;

class Episode {

	/** @var int $number */
	public $number;
	/** @var string $lang */
	public $lang;
	/** @var Hoster[] $hoster */
	public $hoster;

	/**
	 * Episode constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->number = $data['no'];
		$this->lang   = $data['typ'];
		$this->hoster = EntryDAO::createEntitiesFromArray( [ 'names' => explode( ',', $data['types'] ), 'images' => explode( ',', $data['typeimg'] ) ], Entry::TYPE_HOSTER );
	}

}