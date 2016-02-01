<?php
namespace app\models;

class File extends \ActiveRecord\Model 
{
	const FILE_TYPE_BLOG = 10;

	// static $table_name = 'user';
	
	static $belongs_to = [
		['user'],
		['album']
	];


}

?>