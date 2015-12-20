<?php
namespace app\models;

class User extends \ActiveRecord\Model 
{

	// static $table_name = 'user';
	
	static $has_many = [
		['book'],
		['posts']
	];

	private function generateSalt()
	{
		return substr(md5(time()), 0, 4);
	}

	public static function generatePassword($password, $salt)
	{
		return sha1($salt.$password);
	}


	public  function validatePassword($password, $salt)
	{
		echo "new:".$this->generatePassword($password,$salt);
		echo "old:".$this->password;
		return $this->generatePassword() === $this->password;
	}



	public function login()
	{

	}
}

?>