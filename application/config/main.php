<?php
return [
	'name'=>'YKG Framework',

	'language'=>'zh_cn',

	'components'=>[
		'db'=>[
			'modelDirectory'=>__APP__.'/models',
			'connections'=>[
			    	'development' => 'mysql://root:blueidea@127.0.0.1/ykg',
			    	// 'production' => 'mysql://root:blueidea@127.0.0.1/ykg'
			],
			'class'=>'\YKG\base\Model',
		],
		'test'=>[
			'id'=>'test components',
			'class'=>'\YKG\helpers\Test'
		]
	]
];
?>