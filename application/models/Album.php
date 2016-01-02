<?php
namespace app\models;

class Album extends \ActiveRecord\Model 
{ 
	static $belongs_to = [
		['user', 'class_name'=>'User'],
		['category']
	];
}

?>