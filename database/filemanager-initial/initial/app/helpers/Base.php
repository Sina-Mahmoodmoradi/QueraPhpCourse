<?php

class Base extends Singleton
{
	private $config;

	public function set($key, $value)
	{
		$this->config[$key] = $value;
	}

	public function mset($keys_and_values)
	{
		foreach ($keys_and_values as $key => $value) {
			$this->config[$key] = $value;
		}
	}

	public function get($key)
	{
		if (array_key_exists($key, $this->config)) {
			return $this->config[$key];
		}

		return null;
	}
}
