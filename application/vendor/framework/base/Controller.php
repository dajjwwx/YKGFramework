<?php
namespace YKG\base;

class Controller
{
	private $_id;
	private $_action_id;

	private static $page_partial_content = '';
	private static $layout_partial_content = [];

	public $layout = '//layouts/base';

	private $layouts_list = [];

	private static $content_tag = '<ykg:content></ykg:content>';

	private $html;

	public function __construct()
	{
		$this->_id = Request::getControllerId();
		$this->_action_id = Request::getActionId();
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
			$view = ROOT.'/application/views'.$layout.'.php';
		}
		elseif($pos ==1)
		{
			$view = ROOT.'/application/views'.substr($layout, 1).'.php';
		}

		return $view;
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
		extract($params);
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
		$tt = ob_get_clean();

		self::$page_partial_content = str_replace(self::$content_tag, self::$page_partial_content, $tt);
	}


	public function render($viewPath,$params=[])
	{
		$this->constructView($viewPath,$params);
		$content = $this->constructLayout();

		ob_start('\\YKG\\base\\Controller::replaceContent');

		echo $content; //Merge view and layout

		ob_get_flush();
		




	}
}
?>