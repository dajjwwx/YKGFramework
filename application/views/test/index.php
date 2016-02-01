Test/index

<?php	
	$arr1 = [
		'name'=>'Array1',
		'test'=>'TestComponents',
		'params'=>[
			'param1'=>'param1_Value',
			'param2'=>'param2_Value',
			'param3'=>'param3_Value',
			'param4'=>'param4_Value',
			'param5'=>'param5_Value',
			'param6'=>'param6_Value',
		]
	];

	$arr2 = [
		'name'=>'Array2',
		'params'=>[
			'param1'=>'Array2_param1_Value',
			'param2'=>'Array2_param2_Value',
			'param3'=>'Array2_param3_Value',
			'param4'=>'Array2_param4_Value',
			'param5'=>'Array2_param5_Value',
		]
	];

	$arr = array_merge_recursive($arr1, $arr2);

	print_r($arr);

?>