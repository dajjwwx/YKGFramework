<?php
namespace app\models\form;

use \YKG\YKG;
use \app\models\User;
class Login
{
	public $username;
	public $password;

	public function validate()
	{
		$model = User::find(array('name'=>$this->username));

		if($model->password == $model->generatePassword($this->password, $model->salt))
		{
			YKG::app()->user->register($model->id, $model->name);
			return true;
		}
		else
		{
			return false;
		}


		// if($model)
		// {
		// 	YKG::app()->session->add('user',[
		// 		'id'=>$model->id,
		// 		'name'=>$model->username;
		// 	]);
		// }
	}
}