<?php
namespace YKG\base;

class Module extends Component
{
	private $_id;

	public function __construct()
	{
		$this->_id = new Request()->getModuleId();
	}
}