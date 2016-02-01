<?php
namespace YKG;

use \YKG\base\Request;
use \YKG\base\Component;

require_once 'YKGLoader.php';

class YKG extends Component
{

	private $_app;

	public function __construct()
	{
		parent::__construct();
		
		$this->autoload();

	}

	private function __clone(){}

	public static function app()
	{
		return new \YKG\YKG();
	}

	public static function t($file, $message)
	{
		return self::app()->message->t($file, $message);
	}

	public function run($params)
	{
		// self::registerModel();	//load ORM Liabaray
		$this->db->registerORM();
		self::request();	
		return $this;
	}


	private function request()
	{
		$controller = '\\app\\controllers\\'.ucfirst(Request::getControllerId()).'Controller';

		if(class_exists($controller))
		{
			$action = 'action'.ucfirst(Request::getActionId());
			$controller = new $controller;

			$controller->beforeAction();

			if(method_exists($controller, $action))
				$controller->$action();
			else
				throw new \Exception("Request Page Not Found", 1);
				
		}
		else
		{
			throw new \Exception("Request Page Not Found", 1);
		}
	}

	public function autoload()
	{

	}


}

?>