<?php
namespace app\models;

class Book extends \ActiveRecord\Model 
{ 
	static $belongs_to = [
		['user', 'class_name'=>'User']
	];
}

?>