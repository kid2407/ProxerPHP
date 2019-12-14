<?php


namespace ProxerPHP\Api\AnimeApi;


use ProxerPHP\Entities\Stream;
use ProxerPHP\Util\BaseCollection;

class StreamCollection extends BaseCollection {

    /**
     * @param Stream $item
     * @param int|string $key
     */
    public function add($item, $key = null): void {
        if ($item instanceof Stream) {
            parent::add($item, $key);
        }
    }

    /**
     * @param int|string $key
     * @return false|Stream
     */
    public function get($key) {
        return parent::get($key);
    }

    /**
     * @return Stream|null
     */
    public function getFirst() {
        return parent::getFirst();
    }

}