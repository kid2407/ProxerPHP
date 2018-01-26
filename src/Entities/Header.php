<?php
/**
 * Created by Tobias Franz.
 * Date: 26.01.2018
 * Time: 18:20
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class Header {

	const STYLE_GRAY = 'gray';
	const STYLE_BLACK = 'black';
	const STYLE_OLD_BLUE = 'old_blue';
	const STYLE_PANTSU = 'pantsu';

	public $galleryId;
	public $picPath;
	public $name;

	/**
	 * Header constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->galleryId = $data['gid'];
		$this->picPath   = $data['catpath'];
		$this->name      = $data['imgfilename'];
	}

	public function getHeaderPath() {
		return sprintf( 'https://www.cdn.proxer.me/gallery/originals/%s/%s', $this->picPath, $this->galleryId );
	}

}