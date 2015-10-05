<?php
namespace YKG\base\exceptions;

class NotFoundActionException extends \Exception
{

	public function __construct($message, $code)
	{
		parent::__construct($message,$code);
	}

	function __toString()
	{
		return __CLASS__.":[{$this->code}]:Not Found action"ucfirst($this->message);
	}
}