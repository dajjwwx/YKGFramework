<?php
return [
	'name'=>'YKG Framework',

	'language'=>'zh_cn',

	'components'=>[
		'db'=>[
			'modelDirectory'=>__APP__.'/models',
			'connections'=>[
			    	'development' => 'mysql://root:blueidea@127.0.0.1/ykg',
			    	// 'sinaapp'=>'mysql://'.SAE_MYSQL_USER.':'.SAE_MYSQL_PASS.'@'.SAE_MYSQL_HOST_M.'/app_ykgframework',
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