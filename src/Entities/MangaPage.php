<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 19:31
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class MangaPage {

	/** @var string $filename */
	public $filename;
	/** @var int $height */
	public $height;
	/** @var int $width */
	public $width;

	/**
	 * MangaPage constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->filename = $data[0];
		$this->height   = $data[1];
		$this->width    = $data[2];
	}

}