<?php

class Config
{
    private static $instances = [];
    private $config = [
        "default_exp" => 60 * 60,
        "extended_exp" => 24 * 60 * 60
    ];

    private function __construct() {}

    public static function getInstance()
    {
        $class = get_called_class();
        if (!array_key_exists($class, self::$instances)) {
            self::$instances[$class] = new self();
        }

        return self::$instances[$class];
    }

    public function set($key, $value)
    {
        $this->config[$key] = $value;
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->config)) {
            return $this->config[$key];
        }

        return null;
    }
}
