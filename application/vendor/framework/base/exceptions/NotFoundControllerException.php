<?php
namespace YKG\base\exceptions;

class NotFoundControllerException extends \Exception
{

	public function __construct($message, $code)
	{
		parent::__construct($message,$code);
	}

	function __toString()
	{
		return __CLASS__.":[{$this->code}]:Not Found ". ucfirst($this->message).'Controller';
	}
}