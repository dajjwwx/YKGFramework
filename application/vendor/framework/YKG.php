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
		self::registerModel();

		// Request::run();

		$controller = '\\app\\controllers\\'.ucfirst(Request::getControllerId()).'Controller';

		if(class_exists($controller))
		{
			$action = 'action'.ucfirst(Request::getActionId());
			$controller = new $controller;

			$controller->$action();
		}

		return new \YKG\YKG();

	}

	public static function registerModel()
	{
		\ActiveRecord\Config::initialize(function($cfg)
		{
		    $cfg->set_model_directory(ROOT.'/application/models');
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