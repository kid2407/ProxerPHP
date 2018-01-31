<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 15:48
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use DateTime;
use ProxerPHP\DAOs\MangaChapterDAO;

class MangaChapter {

	/** @var int $chapterId */
	public $chapterId;
	/** @var int $entryId */
	public $entryId;
	/** @var string $entryName */
	public $entryName;
	/** @var int $totalChapterCount */
	public $totalChapterCount;
	/** @var string $chapterTitle */
	public $chapterTitle;
	/** @var int|null $uploaderId */
	public $uploaderId;
	/** @var int|null $uploaderName */
	public $uploaderName;
	/** @var DateTime $uploadTimestamp */
	public $uploadTimestamp;
	/** @var int|null $scanGroupId */
	public $scanGroupId;
	/** @var string|null $scanGroupName */
	public $scanGroupName;
	/** @var string $mangaServer */
	public $mangaServer;
	/** @var MangaPage[] $pages */
	public $pages;

	/**
	 * MangaChapter constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->chapterId         = $data['cid'];
		$this->entryId           = $data['eid'];
		$this->entryName         = $data['name'];
		$this->totalChapterCount = $data['count'];
		$this->chapterTitle      = $data['title'];
		$this->uploaderId        = $data['uploader'];
		$this->uploaderName      = $data['username'];
		$this->uploadTimestamp   = new DateTime( $data['timestamp'] );
		$this->scanGroupId       = $data['tid'];
		$this->scanGroupName     = $data['tname'];
		$this->mangaServer       = $data['server'];
		$this->pages             = MangaChapterDAO::generatePagesFromArray( $data['pages'] );
	}

	/**
	 * @param int $page
	 *
	 * @return string
	 */
	public function getLinkForPage( $page ) {
		return sprintf( 'https://manga%s.proxer.me/f/%d/%d/%s', $this->mangaServer, $this->entryId, $this->chapterId, $this->pages[ $page ] );
	}

}