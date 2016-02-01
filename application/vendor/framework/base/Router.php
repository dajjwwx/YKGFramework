<?php
namespace YKG\base;
class Router
{
	public $defaultRouter = 'site/index';	

	public function getUrl()
	{
		return $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	}
}