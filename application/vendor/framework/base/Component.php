<?php
/**
 *在这里我们先定义一些基本的方法
 *1.Use the Request Component we can type this <code>\YKG\YKG::app()->request->getControllerId()</code>
 *2.
 */
namespace YKG\base;

abstract class Component
{
	protected static $m = [];	//Register

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
		elseif(isset(self::$m[$name]))	//\\YKG\YKG::app()->name;
		{
			return self::$m[$name];
		}
		elseif(isset(self::$m['components'][$name]))
		{
			$class = new self::$m['components'][$name]['class'];
			$params = self::$m['components'][$name];
			foreach ($params as $key => $value) {
				$class->$key = $value;
			}
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
		$this->$name = $value;
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
