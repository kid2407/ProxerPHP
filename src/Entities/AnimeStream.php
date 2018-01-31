<?php
/**
 * Created by Tobias Franz.
 * Date: 31.01.2018
 * Time: 14:32
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


use DateTime;
use ProxerPHP\DAOs\AnimeStreamDAO;
use ProxerPHP\Exceptions\ProxerException;

class AnimeStream {

	/** @var int $id */
	public $id;
	/** @var string $entryName */
	public $entryName;
	/** @var int $maxEpisodeCount */
	public $maxEpisodeCount;
	/** @var string $hosterType */
	public $hosterType;
	/** @var string $hosterName */
	public $hosterName;
	/** @var mixed $hosterImage */
	public $hosterImage;
	/** @var int $uploaderId */
	public $uploaderId;
	/** @var string $uploaderName */
	public $uploaderName;
	/** @var DateTime $uploadedTime */
	public $uploadedTime;
	/** @var int|null $subgroupId */
	public $subgroupId;
	/** @var string|null $subgroupName */
	public $subgroupName;
	/** @var string $embeedType */
	public $embeedType;

	/**
	 * AnimeStream constructor.
	 *
	 * @param array $data
	 *
	 * @throws ProxerException
	 */
	public function __construct( $data ) {
		$this->id              = $data['id'];
		$this->entryName       = $data['entryname'];
		$this->maxEpisodeCount = $data['count'];
		$this->hosterType      = $data['type'];
		$this->hosterName      = $data['name'];
		$this->hosterImage     = $data['img'];
		$this->uploaderId      = $data['uploader'];
		$this->uploaderName    = $data['username'];
		$this->uploadedTime    = new DateTime( $data['timestamp'] );
		$this->subgroupId      = $data['tid'];
		$this->subgroupName    = $data['tname'];
		$this->embeedType      = $data['htype'];
		$this->streamLink      = AnimeStreamDAO::getStreamLink( $data['id'] );
	}

}