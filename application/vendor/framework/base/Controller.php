<?php
namespace YKG\base;

class Controller
{
	private $_id;
	private $_action_id;

	private static $page_partial_content;

	public $layout;

	public function __construct()
	{
		$this->_id = Request::getControllerId();
		$this->_action_id = Request::getActionId();
	}
	public function run()
	{
				
	}

	private function getPath($module, $viewPath)
	{
		if($module == "")
		{
			$path = ROOT.'/application/views/'.$viewPath.'.php';
		}
		else
		{
			$path = ROOT.'/application/modules/'.$module.'/views/'.$viewPath.'.php';
		}

		return $path;


	}

	public static function replaceContent($buffer)
	{
 		return (str_replace('<code>Content</code>', self::$page_partial_content, $buffer));
	}

	public function beginContent($layout)
	{
		ob_start();
		ob_implicit_flush(false);

		require(ROOT.'/application/views/layouts/main.php');
	}

	public function endContent()
	{
		ob_get_flush();
	}


	public function render($viewPath,$params=[])
	{



		// \YKG\helpers\Util::dump($params);

		extract($params);

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

		// require($file);

		ob_start();
		ob_implicit_flush(false);
		require($file);
		self::$page_partial_content =  ob_get_clean();

		ob_start('\\YKG\\base\\Controller::replaceContent');
		require $this->layout;
		ob_get_flush();
		




	}
}
?>