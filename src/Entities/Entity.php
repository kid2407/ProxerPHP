<?php


namespace ProxerPHP\Entities;


use DateTime;
use DateTimeZone;
use Exception;

abstract class Entity {

    const TYPE_DATE    = 'date';
    const TYPE_BOOLEAN = 'bool';

    /** @var array $data Die Rohdaten der API */
    protected $data = [];
    /** @var array $fieldNamesMap Felder, die nicht als */
    protected $fieldNamesMap = [];
    /** @var array $dataTypesForFields Zuordnung für "komplexere" Datenwerte, z.B. ein Datum */
    protected $dataTypesForFields = [];

    public function __construct(array $data = []) {
        $this->data = $data;
    }

    public function __get($name) {
        if (in_array($name, array_keys($this->fieldNamesMap))) {
            $name = $this->fieldNamesMap[$name];
        }

        return $this->getProperty($name);
    }

    /**
     * @return array
     */
    public function getData(): array {
        return $this->data;
    }

    /**
     * @param string $propertyName
     * @return mixed
     */
    private function getProperty(string $propertyName) {
        if (isset($this->dataTypesForFields[$propertyName])) {
            switch ($this->dataTypesForFields[$propertyName]) {
                case self::TYPE_DATE:
                    try {
                        return new DateTime('@' . $this->data[$propertyName], new DateTimeZone('Europe/Berlin'));
                    } catch (Exception $e) {
                        return null;
                    }
                    break;
                case self::TYPE_BOOLEAN:
                    return (bool)$this->data[$propertyName];
                    break;
                default:
                    return null;
                    break;
            }
        }

        return $this->data[$propertyName] ?? null;
    }

}