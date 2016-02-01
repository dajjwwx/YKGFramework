<?php
namespace YKG\base;

class Config
{
	public static function load()
	{
		$system =  require(dirname(dirname(__FILE__)).'/config/system.php');

		$config = require(__APP__.'/config/main.php');

		return \YKG\helpers\HArray::multiMerge($system, $config);  

		// $config = require()
		// return $config;
	}

	public static function mergeConfig($config)
	{
		return \YKG\helpers\HArray::multiMerge(self::load(), $config);  
	}
}