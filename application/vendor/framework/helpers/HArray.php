<?php
namespace YKG\helpers;

class HArray
{
	/**  
	 * 对多个数组进行递归合并 返回新的数组 
	 * 如果多个数组中有相同的键则会覆盖 
	 *@use	$a = array('username'=>'zhangsan','age'=>200);  
	 * 		$b = array(5,8,9,array(1,2,3,array(7,10)));  
	 *		$c = array('username'=>'lisi',100,'user'=>array('sex'=>1,'age'=>20));  
	 *		$d = array('user' => array('sex'=>0));  
	 *		$e = multimerge($a,$b,$c,$d);  
  	 *
	 * @return type Array 
	 */  
	static function multiMerge()  
	{  
	    	$arrs = func_get_args();  
	    	$merged = array();  
	    	while ($arrs) {
	        	$array = array_shift($arrs);  
	        	if (!$array) { continue; }  
	        	foreach ($array as $key => $value)
	        	{
	          		if (is_string($key)) {  
	                		if (is_array($value) && array_key_exists($key, $merged) && is_array($merged[$key])) {  
	                 			$merged[$key] = call_user_func_array(array('\YKG\helpers\HArray', 'multiMerge'), array($merged[$key], $value));  
			                } else {  
			                 	$merged[$key] = $value;  
			                }  
		            	} else {  
		                	$merged[] = $value;  
		           	}  
	        	}  
	    	}  
	   	return $merged;  
	} 
}