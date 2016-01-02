<?php
namespace YKG\helpers\auth;

use \YKG\YKG;
use \YKG\base\Component;

class HWebUser extends Component
{
	private $_isGuest;

	private $_id;
	private $_name;

	public function getId()
	{
		return YKG::app()->session->get('__webuser__')['id'];
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function getName()
	{
		return YKG::app()->session->get('__webuser__')['name'];
	}

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function register($id, $name)
	{
		$this->setId($id);
		$this->setName($name);
		YKG::app()->session->add('__webuser__',['id'=>$this->_id,'name'=>$this->_name]);
	}

	public function isGuest()
	{
		if(!YKG::app()->session->get('__webuser__'))
		{
			return 'guest';
		}
		else
		{
			return false;
		}
	}


}
?>