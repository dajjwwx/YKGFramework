<?php
/**
 *	Session 
 */

namespace YKG\helpers;

class HSession
{
	public $session;

	public function __construct()
	{
		 $this->session = &$_SESSION;
	}

	public function add($name,$value)
	{
		if(!isset($this->session[$name]))
		{
			$this->session[$name] = $value;
		}
		
	}

	public function update($name, $value)
	{
		if(isset($this->session[$name]))
		{
			$this->session[$name] = $value;
		}
	}





	public function get($name)
	{
		if(isset($this->session[$name]))
		{
			return $this->session[$name];
		}
		
	}

	public function delete($name)
	{
		unset($this->session[$name]);
	}

}