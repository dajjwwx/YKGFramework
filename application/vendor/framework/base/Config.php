<?php
namespace YKG\base;

class Config
{
	public static function load()
	{
		$config =  require(dirname(dirname(__FILE__)).'/config/system.php');
		// $config = require()
		return $config;
	}

	public static function mergeConfig($config)
	{
		return \YKG\helpers\HArray::multiMerge(self::load(), $config);  
	}
}