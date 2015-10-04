<?php
namespace YKG\helpers;

class Util
{
	public static function dump($param)
	{
		echo "<pre>";
		var_dump($param);
		echo "</pre>";
	}
}