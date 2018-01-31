<?php
/**
 * Created by Tobias Franz.
 * Date: 29.01.2018
 * Time: 17:46
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class DescriptionPart {

	public $language;
	public $subject;
	public $text;

	/**
	 * DescriptionPart constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->language = $data['language'];
		$this->subject  = $data['subject'];
		$this->text     = $data['text'];
	}

}