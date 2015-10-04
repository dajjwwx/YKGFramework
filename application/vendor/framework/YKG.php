<?php
namespace YKG;

use \YKG\base\Request;

require_once 'YKGLoader.php';

class YKG
{

	private $_app;

	public function __construct()
	{
		$this->autoload();
	}

	private function __clone(){}

	public static function app()
	{

		Request::run();

		$controller = '\\app\\controllers\\'.ucfirst(Request::getControllerId()).'Controller';

		if(class_exists($controller))
		{
			$action = 'action'.ucfirst(Request::getActionId());
			$controller = new $controller;

			$controller->$action();
		}
		


	}

	public function autoload()
	{

	}


}

?>