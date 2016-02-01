<?php
return [

	'components'=>[

		'request'=>[
			'class'=>'\\YKG\base\Request'	
		],
		'uri'=>[
			'class'=>'\\YKG\helpers\uri\Uri'
		],
		'session'=>[
			'class'=>'\\YKG\helpers\HSession'
		],
		'user'=>[
			'class'=>'\\YKG\helpers\auth\HWebUser'
		],
		'message'=>[
			'class'=>'\\YKG\components\Messages'
		]
	]

];