<?php
namespace app\models;

class Post extends \ActiveRecord\Model 
{

	// static $table_name = 'user';
	
	static $has_many = [
	];

	static $belongs_to = [
		['user'],
		['category']
	];


}

?>