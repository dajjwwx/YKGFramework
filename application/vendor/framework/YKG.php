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
		self::config($params);	//load configuration

		self::registerModel();	//load ORM Liabaray

		self::request();	

		return $this;
	}

	private function config($params)
	{

		self::$m = \YKG\helpers\HArray::multiMerge(\YKG\base\Config::load(), $params);

		// print_r(self::$m);
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

	public static function registerModel()
	{
		\ActiveRecord\Config::initialize(function($cfg)
		{
		    $cfg->set_model_directory(__APP__.'/models');
		    $cfg->set_connections(array(
		    	'development' => 'mysql://root:blueidea@127.0.0.1/ykg',
		    	// 'production' => 'mysql://root:blueidea@127.0.0.1/ykg'
		    	));
		});
	}

	public function autoload()
	{

	}


}

?>