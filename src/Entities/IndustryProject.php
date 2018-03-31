<?php
/**
 * Created by Tobias Franz.
 * Date: 04.02.2018
 * Time: 12:01
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class IndustryProject {

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
	/** @var int $industryState */
	public $industryState;
	/** @var int $entryState */
	public $entryState;
	/** @var int $rateSum */
	public $rateSum;
	/** @var int $rateCount */
	public $rateCount;

	/**
	 * IndustryProject constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->entryId       = $data['id'];
		$this->entryName     = $data['name'];
		$this->genre         = explode( ' ', $data['genre'] );
		$this->fsk           = explode( ' ', $data['fsk'] );
		$this->medium        = $data['medium'];
		$this->industryState = $data['type'];
		$this->entryState    = $data['state'];
		$this->rateSum       = $data['rate_sum'];
		$this->rateCount     = $data['rate_count'];
	}

}