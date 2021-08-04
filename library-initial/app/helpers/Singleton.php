<?php

abstract class Singleton
{
    private static $instances = [];

    protected function __construct() {}

    public static function getInstance()
    {
        $class = get_called_class();
        if (!array_key_exists($class, self::$instances)) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}
