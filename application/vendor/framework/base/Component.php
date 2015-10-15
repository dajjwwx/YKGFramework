<?php
/**
 *在这里我们先定义一些基本的方法
 *1.Use the Request Component we can type this <code>\YKG\YKG::app()->request->getControllerId()</code>
 */
namespace YKG\base;

abstract class Component
{
	public static $m = [];	//Register

	protected function __construct()
	{
		self::$m =Config::load();
	}

	public function __get($name)
	{
		$getter = 'get'.ucfirst($name);

		if(method_exists($this, $getter))
		{
			return $this->$getter();
		}
		elseif(isset(self::$m[$name]))
		{
			return self::$m[$name];
		}
		elseif(isset(self::$m['components'][$name]))
		{
			$class = new self::$m['components'][$name]['class'];

			return $class;
		}
		elseif(property_exists($this, $name))
		{
			return $this->$name;
		}
		else
		{
			return "不好意思,找不到你要的属性:".$name;
		}
	}

	public function __set($name, $value)
	{
		$this->name = $vlaue;
	}

	public function __call($func, $arg)
	{

	}

	public function __isset($name)
	{
		return isset($this->name);
	}

	public function __unset($name)
	{
		unset($this->name);
	}
}
