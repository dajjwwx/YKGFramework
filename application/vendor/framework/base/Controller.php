<?php
namespace YKG\base;

class Controller
{
	private $_id;
	private $_action_id;

	public function __construct()
	{
		$this->_id = Request::getControllerId();
		$this->_action_id = Request::getActionId();
	}
	public function run()
	{
		
	}

	public function render($viewPath,$data=[])
	{
		$module = Request::getModuleId();
		$controller = Request::getControllerId();
		$action = Request::getActionId();

		$viewpath = explode('/', $viewPath);

		if(sizeof($viewpath) == 1)
		{
			if($module == "")
			{
				$path = ROOT.'/application/views/'.$controller.'/'.$viewPath.'.php';
				include $path;
			}			
		}


	}
}
?>