<?php
/**
 * Created by Tobias Franz.
 * Date: 29.01.2018
 * Time: 17:48
 * Copyright 2018 Tobias Franz
 */

namespace ProxerPHP\Entities;


class AlternativeCharacterName {

	/** @var string $language moegliche Werte: Japanisch "jp", Koreanisch "kr", Chinesisch "zh", Deutsch "de", Englisch "en" */
	public $language;
	/** @var string $name */
	public $name;
	/** @var string $alternativeWriting */
	public $alternativeWriting;
	/** @var string $type moegliche Werte: "name", "pseudonym", "misc" */
	public $type;
	/** @var bool $isMainName */
	public $isMainName;

	/**
	 * AlternativeCharacterName constructor.
	 *
	 * @param array $data
	 */
	public function __construct( $data ) {
		$this->language           = $data['language'];
		$this->name               = $data['name'];
		$this->alternativeWriting = $data['alternative'];
		$this->type               = $data['type'];
		$this->isMainName         = $data['display_name'];
	}

}