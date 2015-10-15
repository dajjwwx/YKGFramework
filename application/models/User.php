<?php
namespace app\models;

class User extends \ActiveRecord\Model 
{
	// static $table_name = 'user';
	
	static $has_many = [
		['book']
	];
}

?>