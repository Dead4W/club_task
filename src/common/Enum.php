<?php


namespace app\common;

class Enum
{
    static $valueMap = [];

    protected $id;
    protected $data;

    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    static function getById($id) {
        $className = get_called_class();

        return self::$valueMap[$className][$id] ?? false;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public static function getMap() {
        $className = get_called_class();

        return self::$valueMap[$className];
    }

    public static function init()
    {
        $className = get_called_class();
        $class = new \ReflectionClass($className);

        if (array_key_exists($className, self::$valueMap)) {
            throw new \Exception(sprintf("Enum with same ID have been already initialized, enum=%s", $className));
        }
        self::$valueMap[$className] = [];

        /** @var Enum[] $enumFields */
        $enumFields = array_filter($class->getStaticProperties(), function ($property) {
            return $property instanceof Enum;
        });

        foreach ($enumFields as $property) {
            if (array_key_exists($property->getId(), self::$valueMap[$className])) {
                throw new \Exception(sprintf("Duplicate enum value %s from enum %s", $property->getId(), $className));
            }

            self::$valueMap[$className][$property->getId()] = $property;
        }
    }

}