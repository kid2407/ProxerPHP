<?php


namespace ProxerPHP\Util;


class AnimeLanguage {

    const GER_DUB = 'gerdub';
    const GER_SUB = 'gersub';
    const ENG_DUB = 'engdub';
    const ENG_SUB = 'engsub';

    private $language;

    /**
     * AnimeLanguage constructor.
     *
     * @param string $language Eine der Sprachen in {@see AnimeLanguage}, z.B. {@see AnimeLanguage::ENG_SUB}
     */
    public function __construct(string $language) {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

}