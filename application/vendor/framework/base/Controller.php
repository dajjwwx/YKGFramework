<?php
namespace YKG\base;

use \YKG\YKG;

class Controller
{
	private $_id;
	private $_action_id;

	private static $page_partial_content = '';
	private static $layout_partial_content = [];

	public $layout = '//layouts/base';
	public $breadcrumbs = [];	//导航条

	private $layouts_list = [];

	private static $content_tag = '<ykg:content></ykg:content>';

	private $html;

	/***
	 * accessRules
	 * [
	 *	['allow','actions'=>[],'users'=>['*']],
	 *	['allow','actions'=>[],'users'=>['@']],
	 *	['allow','actions'=>[],'users'=>['admin']],
	 *	['deny','actions'=>[],'users'=>'*']	
	 * ]
	 */
	public function accessRules()
	{
		return [];
	}

	public function __construct()
	{
		$this->_id = Request::getControllerId();
		$this->_action_id = Request::getActionId();
	}

	public function beforeAction()
	{
		$accessRules = $this->accessRules();

		$isGuest = YKG::app()->user->isGuest();
		$name = YKG::app()->user->getName();

		if($accessRules)
		{
			foreach ($accessRules as $item) {
				if($item[0] == 'allow' && in_array($this->_action_id, $item['actions'])&& $item['users'][0] == '*')
				{

				}
				elseif($item[0] == 'allow' && in_array($this->_action_id, $item['actions']) && $item['users'][0] == '@')
				{
					if($isGuest)
						throw new \Exception("No permission to access this action", 1);				
				}
				elseif($item[0] == 'allow' && in_array($this->_action_id, $item['actions']) && in_array($name, $item['users']))
				{
					throw new \Exception("No permission to access this action", 1);
				}
				elseif($item[0] == 'deny' && in_array($this->_action_id, $item['actions']) && in_array($name, $item['users']))
				{
					throw new \Exception("No permission to access this action", 1);
				}
				// else
				// {
				// 	throw new \Exception("Error Processing Request", 1);				
				// }
			}
		}
	}
	public function run()
	{
				
	}



	public static function replaceContent($buffer)
	{
 		return (str_replace(self::$content_tag, self::$page_partial_content, $buffer));
	}

	public function beginContent($layout)
	{
		// print_r(explode('/', $layout));

		$layout = $this->getLayoutPath($layout);

		// echo $layout;

		$this->layouts_list[] = $layout; 

		ob_start();
		require($layout);
		self::$layout_partial_content[] =  ob_get_clean();

	}

	public function endContent()
	{

	}

	public function getLayoutPath($layout)
	{
		$pos = strpos($layout, '/layout');

		if($pos == 0)
		{
			$view = __APP__.'/views/'.$layout.'.php';
		}
		elseif($pos ==1)
		{
			$view = __APP__.'/views/'.substr($layout, 1).'.php';
		}

		return $view;
	}


	private function getPath($module, $viewPath)
	{
		if($module == "")
		{
			$path = __APP__.'/views/'.$viewPath.'.php';
		}
		else
		{
			$path = __APP__.'/modules/'.$module.'/views/'.$viewPath.'.php';
		}

		return $path;
	}

	public function getViewPath($viewPath)
	{
		$module = Request::getModuleId();
		$controller = Request::getControllerId();
		$action = Request::getActionId();

		$vp = explode('/', $viewPath);

		if(sizeof($vp) == 1)
		{
			$viewPath = $controller.'/'.$viewPath;
			$file = $this->getPath($module, $viewPath);
		}
		elseif(sizeof($vp) == 2)
		{
			$file = $this->getPath($module, $viewPath);		
		}
		elseif(sizeof($vp) == 3)
		{
			$module = $vp[0];
			$viewPath = $vp[1].'/'.$vp[2];
			$file = $this->getPath($module, $viewPath);
		}
		return $file;
	}

	private function constructLayout()
	{
		$content = self::$layout_partial_content[0];

		for($i = 1; $i < sizeof(self::$layout_partial_content);$i++)
		{
			$content = str_replace(self::$content_tag, self::$layout_partial_content[$i], $content);
		}
		return $content;
	}

	private function constructView($viewPath,$params=[])
	{
		$layout = $this->getLayoutPath($this->layout);
		if(is_array($params))
		{
			extract($params);
		}
		
		$view = $this->getViewPath($viewPath);

		ob_start();
		ob_implicit_flush(false);
		require($view);
		self::$page_partial_content =  ob_get_clean();


		// echo self::$page_partial_content;
		ob_start();
		// ob_start('\\YKG\\base\\Controller::replaceContent');
		require($layout);
		// self::$page_partial_content =  ob_get_clean();
		$layout_content = ob_get_clean();

		self::$page_partial_content = str_replace(self::$content_tag, self::$page_partial_content, $layout_content);
	}


	public function render($viewPath,$params=[])
	{
		$this->constructView($viewPath,$params);
		$content = $this->constructLayout();

		ob_start('\\YKG\\base\\Controller::replaceContent');

		echo $content; //Merge view and layout

		ob_get_flush();
		
	}

	public function renderPartial($viewPath, $params = [])
	{
		if(is_array($params))
		{
			extract($params);
		}

		$pos = strpos($viewPath, '/layout');

		if($pos == -1)
		{
			$view = $this->getViewPath($viewPath);
		}
		else
		{
			$view = $this->getLayoutPath($viewPath);	
		}			

		require($view);
	}

	public function redirect($router, $params)
	{
		header('Location:'.YKG::app()->uri->create($router, $params));
	}
}
?>