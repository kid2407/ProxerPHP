<?php


namespace ProxerPHP\Util;


use ArrayIterator;
use IteratorAggregate;

class BaseCollection implements IteratorAggregate {

    private $items = [];

    /**
     * @param int|string $key
     * @return object|bool
     */
    public function get($key) {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }

        return false;
    }

    /**
     * @return mixed|null
     */
    public function getFirst() {
        if (count($this->items) > 0) {
            return $this->items[key($this->items)];
        }

        return null;
    }

    /**
     * @param object $item
     * @param int|string $key
     */
    public function add($item, $key = null): void {
        if (is_null($key)) {
            $this->items[] = $item;
        } else {
            $this->items[$key] = $item;
        }
    }

    /**
     * @param int|string $key
     * @return BaseCollection
     */
    public function remove($key): BaseCollection {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }

        return $this;
    }

    /**
     * @param int|string $key
     * @return bool
     */
    public function hasElementWithId($key): bool {
        return isset($this->items[$key]);
    }

    /**
     * @return int
     */
    public function size(): int {
        return count($this->items);
    }

    /**
     * @return BaseCollection
     */
    public function clear(): BaseCollection {
        $this->items = [];

        return $this;
    }

    /**
     * @param BaseCollection $collection
     * @return BaseCollection
     */
    public function addCollection(BaseCollection $collection): BaseCollection {
        foreach ($collection as $key => $item) {
            $this->add($item, $key);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): ArrayIterator {
        return new ArrayIterator($this->items);
    }
}