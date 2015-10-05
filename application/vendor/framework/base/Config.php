<?php
namespace YKG\base;

class Config
{
	public static function load()
	{
		$config =  require_once dirname(dirname(__FILE__)).'/config/system.php';
		return $config;
	}
}