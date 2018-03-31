<?php
/**
 * Created by Tobias Franz.
 * Date: 01.02.2018
 * Time: 20:33
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


class TranslatorgroupProject {

	/** @var int $entryId */
	public $entryId;
	/** @var string $entryName */
	public $entryName;
	/** @var string[] $genre */
	public $genre;
	/** @var string[] $fsk */
	public $fsk;
	/** @var string $medium */
	public $medium;
	/** @var int $subState */
	public $subState;
	/** @var int $entryState */
	public $entryState;
	/** @var int $rateSum */
	public $rateSum;
	/** @var int $rateCount */
	public $rateCount;

	/**
	 * TranslatorgroupProject constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->entryId    = $data['id'];
		$this->entryName  = $data['name'];
		$this->genre      = explode( ' ', $data['genre'] );
		$this->fsk        = explode( ' ', $data['fsk'] );
		$this->medium     = $data['medium'];
		$this->subState   = $data['type'];
		$this->entryState = $data['state'];
		$this->rateSum    = $data['rate_sum'];
		$this->rateCount  = $data['rate_count'];
	}

}