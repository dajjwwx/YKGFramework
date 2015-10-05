<?php
/****
 *@use \YKG\YKG::app()->request->getControllerId()
 */
namespace YKG\base;

use \YKG\helpers\Util;

class Request extends Component
{
	private  static $_params = [];

	private  static $defaultRouter = 'site/index';
	private  static $defaultModule = '';
	private  static $defaultController='default';
	private  static $defaultAction = 'index';

	public function __construct()
	{
		self::getParams();
		// self::m['router'] = self::$_params;
	}

	/**
	 *	Get the AbsoluteUrl
	 */
	public  function getAbsoluteUrl()
	{
		return self::getHostName().self::getRequestUri();
	}

	public  function getHostName()
	{
		return $_SERVER['HTTP_HOST'];
	}

	public  function getRequestUri()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public  static function getQueryString()
	{
		return strtolower($_SERVER['QUERY_STRING']);
	}

	public  static function getModuleId()
	{
		return self::getParams()['module'];
		// return self::$_params['module'];
	}

	public  static function getControllerId()
	{
		return self::getParams()['controller'];
		// return self::$_params['controller'];
	}

	public static function getActionId()
	{
		return self::getParams()['action'];
		// return self::$_params['action'];
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

	private static function setMCA($m,$c,$a)
	{
		self::$_params['module'] = $m;
		self::$_params['controller'] = $c;
		self::$_params['action'] = $a;			
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
				self::setMCA('', $tmp[0], self::$defaultAction);		
			}
			elseif(class_exists('\\app\modules\\'.$tmp[0].'\\'.ucfirst($tmp[0]).'Module'))
			{
				self::setMCA($tmp[0], self::$defaultController, self::$defaultAction);		
			}			
		}
		if(sizeof($tmp) == 2)
		{
			//site/index
			if(class_exists('\\app\\controllers\\'.ucfirst($tmp[0].'Controller')))
			{
				self::setMCA('', $tmp[0], $tmp[1]);	
			}
			elseif(class_exists('\\app\modules\\'.$tmp[0].'\\'.ucfirst($tmp[0]).'Module'))
			{
				self::setMCA($tmp[0], $tmp[1], self::$defaultAction);			
			}
			else
			{
				throw new \YKG\base\exceptions\NotFoundControllerException($tmp[0], 1);
				
			}

		}
		elseif(sizeof($tmp) == 3)
		{
			self::setMCA($tmp[0], $tmp[1], $tmp[2]);
		}


	}





	// public  function getRouter()
	// {
	// 	$router = isset($_GET['r'])?$_GET['r']:'site/index';

	// 	echo $router;

	// }
}