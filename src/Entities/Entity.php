<?php


namespace ProxerPHP\Entities;


abstract class Entity {

    /** @var array $data Die Rohdaten der API */
    private $data = [];
    /** @var array $specialFields Felder, die nicht als */
    private $specialFields = [];

    public function __construct(array $data = []) {
        $this->data = $data;
    }

    public function __get($name) {
        if (in_array($name, array_keys($this->specialFields))) {
            return $this->{$this->specialFields[$name]};
        }

        return $this->data[$name] ?? null;
    }

    /**
     * @return array
     */
    public function getData(): array {
        return $this->data;
    }

}