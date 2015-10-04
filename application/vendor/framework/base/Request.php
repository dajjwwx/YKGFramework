<?php
namespace YKG\base;

use \YKG\helpers\Util;

class Request
{
	private static $_params = [];

	private static $defaultRouter = 'site/index';
	private static $defaultModule = '';
	private static $defaultController='default';
	private static $defaultAction = 'index';

	public static function run()
	{

		self::getParams();

		 self::setRouter();
		

		$data = self::$_params;

		Util::dump($data);
	}

	public static function getAbsoluteUrl()
	{
		return self::getHostName().self::getRequestUri();
	}

	public static function getHostName()
	{
		return $_SERVER['HTTP_HOST'];
	}

	public static function getRequestUri()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public static function getQueryString()
	{

		return $_SERVER['QUERY_STRING'];
	}

	/**
	 *@todo 获取所有的参数
	 */
	public static function getParams()
	{
		$query = self::getQueryString();

		$segements = explode('&', $query);

		foreach($segements as $segement)
		{
			$tmp = explode('=', $segement);
			// Util::dump($tmp);
			self::$_params[$tmp[0]] = $tmp[1];
		}

		//获取当前的Module/Controller/Action
		self::setRouter();

		return self::$_params;
	}

	public static function getModuleId()
	{
		return self::$_params['module'];
	}

	public static function getControllerId()
	{
		return self::$_params['controller'];
	}

	public static function getActionId()
	{
		return self::$_params['action'];
	}


	//设置当前的Module/Controller/Action
	public static function setRouter()
	{
		$tmp = explode('/', self::$_params['r']);

		if(sizeof($tmp) == 1)
		{
			//site=>/site/index
			if(class_exists('\\app\\controllers\\'.ucfirst($tmp[0].'Controller')))
			{
				self::$_params['module'] = '';
				self::$_params['controller'] = $tmp[0];
				self::$_params['action'] = self::$defaultAction;				
			}
			elseif(class_exists('\\app\modules\\'.$tmp[0].'\\'.ucfirst($tmp[0]).'Module'))
			{
				self::$_params['module'] = $tmp[0];
				self::$_params['controller'] = self::$defaultController;
				self::$_params['action'] = self::$defaultAction;					
			}			
		}
		if(sizeof($tmp) == 2)
		{
			//site/index
			if(class_exists('\\app\\controllers\\'.ucfirst($tmp[0].'Controller')))
			{
				self::$_params['module'] = '';
				self::$_params['controller'] = $tmp[0];
				self::$_params['action'] = $tmp[1];				
			}
			elseif(class_exists('\\app\modules\\'.$tmp[0].'\\'.ucfirst($tmp[0]).'Module'))
			{
				self::$_params['module'] = $tmp[0];
				self::$_params['controller'] = $tmp[1];
				self::$_params['action'] = self::$defaultAction;					
			}
			else
			{
				throw new \YKG\base\exceptions\NotFoundControllerException($tmp[0], 1);
				
			}

		}
		elseif(sizeof($tmp) == 3)
		{
			self::$_params['module'] = $tmp[0];
			self::$_params['controller'] = $tmp[1];
			self::$_params['action'] = $tmp[2];			
		}


	}





	// public static function getRouter()
	// {
	// 	$router = isset($_GET['r'])?$_GET['r']:'site/index';

	// 	echo $router;

	// }
}