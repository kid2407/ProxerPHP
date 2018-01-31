<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 19:37
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\DAOs;


use ProxerPHP\Entities\MangaPage;

class MangaChapterDAO {

	/**
	 * @param array $dataArray
	 *
	 * @return MangaPage[]
	 */
	public static function generatePagesFromArray( $dataArray ) {
		$mangaPages = [];
		foreach ( $dataArray as $data ) {
			$mangaPages[] = new MangaPage( $data );
		}

		return $mangaPages;
	}

}