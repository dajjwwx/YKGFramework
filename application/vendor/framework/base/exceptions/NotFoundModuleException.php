<?php
namespace YKG\base\exceptions;

class NotFoundModuleException extends \Exception
{
	protected $message = 'Not Found Module';

	public function __construct($message, $code)
	{
		parent::__construct($message,$code);
	}

	function __toString()
	{
		return __CLASS__.":[{$this->code}]:Not Found Module".ucfirst($this->getTraceAsString())";
	}
}