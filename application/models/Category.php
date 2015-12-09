<?php
namespace app\models;
use \YKG\helpers\HHtml;

class Category extends \ActiveRecord\Model 
{ 

	public $deep;

	const TREE_VIEW_CHECK = 'check';		//带checkbox显示分类
	const TREE_VIEW_LINK = 'link';			//以链接形式显示分类

	// static $belongs_to = [
	// 	['user']
	// ];

	public static function getCategoryModels()
	{
		$model = self::find('all');	

		return $model;
	}

		/**
	 * *******************************************************************
	 * @todo 递归显示所有分类
	 * *******************************************************************
	 * @param array $array
	 * @param  $pid
	 * @param  $y
	 * @param array $tdata
	 * @return array
	 */
	public static function getChildrenObject($array,$pid=0,$y=0,&$tdata=array())
	{
		foreach ($array as $value)
		{
			if($value->pid == $pid)
			{
				$n = $y + 1;
				$value->deep = $n;
				if($n > 1)
				{
					$value->name = $value->name;
				}
				$tdata[]=$value;
				self::getChildrenObject($array,$value->id,$n,$tdata);//这里递归调用，不明白递归的朋友，去找几个简单的递归例子熟悉下	
			}
		}
		return $tdata;
	}

	public static function dropDownList()
	{
		$result = [];
		

		$data = self::getCategoryModels();
		$list = self::getChildrenObject($data);

		foreach ($list as $item) {
			$nbsp = '';
			for($i=0;$i<$item->deep;$i++)
			{
				$nbsp .= '--';
			}

			$result[$item->id] = $nbsp.$item->name;
		}

		return $result;

		


	}


	public static function checkTree($options=array('treeview'=>self::TREE_VIEW_CHECK,'name'=>'checkItem'),$htmlOptions=array('class'=>'categories checkCategories'))
	{
		
		$list = self::getCategoryModels();
		$list = self::generateCheckTree($list,  0, $options, $htmlOptions );
	
		return $list;
	}
	
	/**
	 * ***************************************************************************
	 * @uses	见方法self::generateCheckTreeByType($type);
	 * *****************************************************************************
	 * 根据Category显示
	 * @param array $arr
	 * @param int $pid
	 * @param string $name
	 * @param array $htmlOptions
	 * @param boolean $check //是否生成带checkbox的列表
	 * @param string $html
	 * @return string
	 */
	public static function generateCheckTree($arr , $pid = 0,  $options = array('treeview'=>self::TREE_VIEW_CHECK,'name'=>'checkItem'), $htmlOptions=array() ,  &$html = "") {
	
		return self::generateTree($arr,$pid,$options,$htmlOptions,$html);
	
	}
	
	/**
	 * **********************************************************************************
	 * 此方法移到CategoryModel
	 * ***********************************************************************************
	 * 生成分类Tree显示
	 * **********************************************************************************
	 * options参数使用说明：
	 * 1. 'treeview' == self::TREE_VIEW_CHECK即返回带checkbox的分类显示;
	 * 使用：$options = array('treeview'=>self::TREE_VIEW_CHECK)
	 * 2.'treeview' == self::TREE_VIEW_LINK即返回以链接形式显示分类;
	 * 		若treeview == self::TREE_VIEW_LINK则还需要添加一个参数link
	 * 使用：$options = array('treeview'=>self::TREE_VIEW_LINK,'link'=>'blog/list') *
	 *
	 * *************************************************************************************
	 * @param array $arr
	 * @param number $pid
	 * @param string $name
	 * @param array $options //使用说明见options使用说明
	 * @param array $htmlOptions
	 * @param string $html
	 * @return string
	 */
	private static function generateTree($arr , $pid = 0,  $options = array('treeview'=>self::TREE_VIEW_CHECK,'name'=>"checkItem"), $htmlOptions=array() ,  &$html = "")
	{
		$result = self::getChildrenObject($arr , $pid);
	
		$html = "<ul ";
		foreach($htmlOptions as $key => $value){
			$html .= $key . '="'. $value. '"';
		}
		$html .= ">";
	
		foreach($result as $val){
			if ($val->pid == $pid) {
				$html .= "<li>";
				//生成带checkbox的列表
				if($options['treeview'] == self::TREE_VIEW_CHECK){
					$html .= HHtml::checkbox($options['name'], false, array('value'=>$val->id, 'id'=>$options['name'].'_'.$val->id,'title'=>$val->name));
				}
				$html .= '&nbsp;&nbsp;';
				//生成带link的列表
				if ($options['treeview'] == self::TREE_VIEW_LINK) {
					$html .= HHtml::link($val->name.'('.$val->id.')',array($options['link'],'id'=>$val->id));
				} else {
					$html .= $val->name.'('.$val->id.')';
				}
	
				$result2 = self::getChildrenObject($arr, $val->id);
					
				//var_dump($result);
					
				if($result2){
					$html .= '<i></i>';
					$html .= self::generateCheckTree($arr, $val->id,$options, $htmlOptions);
				}
				$html .= "</li>";
			}
		}
			
		$html .= "</ul>";
		return $html;
	}
}

?>