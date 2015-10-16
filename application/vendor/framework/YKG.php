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

			$controller->$action();
		}
	}

	public function autoload()
	{

	}


}

?>