<?php
/**
 *	Session 
 */

namespace YKG\helpers;

class HSession
{
	public $session;
	public $expire = 3600*24;

	public function __construct()
	{
		$this->startSession($this->expire);
		 $this->session = &$_SESSION;
	}

	public function startSession($expire = 0)
	{
		if ($expire == 0) {
			$expire = ini_get('session.gc_maxlifetime');
		} else {
			ini_set('session.gc_maxlifetime', $expire);
		}
		 
		if (empty($_COOKIE['PHPSESSID'])) {
			session_set_cookie_params($expire);
			if(!session_id()) session_start();
		} else {
			if(!session_id()) session_start();
			setcookie('PHPSESSID', session_id(), time() + $expire);
		}
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