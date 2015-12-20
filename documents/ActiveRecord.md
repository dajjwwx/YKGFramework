#如何使用ActiveRcord操作数据

YKG Framework借助开源 ORM php-activerecord来实现MVC的模型的建立，下面就在框架中如何使用Model进行说明及介绍

##数据库配置
在config/main.php中找到组件中db配置
```php
		'db'=>[
			'modelDirectory'=>__APP__.'/models',
			'connections'=>[
			    	'development' => 'mysql://root:blueidea@127.0.0.1/ykg',
			    	// 'sinaapp'=>'mysql://'.SAE_MYSQL_USER.':'.SAE_MYSQL_PASS.'@'.SAE_MYSQL_HOST_M.'/app_ykgframework',
			    	// 'production' => 'mysql://root:blueidea@127.0.0.1/ykg'
			],
			'class'=>'\YKG\base\Model',
		],
```
##初步使用

1.在数据库中新建books数据表
2.在application/models中新建Book.php

```php
namespace app\models;
class Book extends \ActiveRecord\Model { }
```

