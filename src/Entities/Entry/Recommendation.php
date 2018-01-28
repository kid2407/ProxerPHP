<?php
/**
 * Created by Tobias Franz.
 * Date: 28.01.2018
 * Time: 13:46
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities\Entry;


class Recommendation {

	/** @var int $positiveCount */
	public $positiveCount;
	/** @var int $negativeCount */
	public $negativeCount;
	/** @var bool|null $userVote */
	public $userVote;
	/** @var mixed $entry */
	public $entry;

	/**
	 * Recommendation constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->positiveCount = $data['count_positive'];
		$this->negativeCount = $data['count_negative'];
		$this->userVote      = $data['positive'];
		$this->entry         = null; // TODO Was ist das hier?
	}

}