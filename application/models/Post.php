<?php
namespace app\models;
use YKG\helpers\HHtml;

class Post extends \ActiveRecord\Model 
{

	// static $table_name = 'user';
	
	static $has_many = [
	];

	static $belongs_to = [
		['user'], 
		['category']
	];

	public static function getTagsLink($tag)
	{
		// $tags = ['test','php','java'];
		$tags = explode(',', $tag);

		array_walk($tags, function(&$item, $key){
			$item = HHtml::link($item, ['blog/tag','name'=>$item]);
		});

		// print_r($tags);

		return implode('&nbsp;&nbsp;', $tags);
	}

	public static function link()
	{
		
	}


}

?>