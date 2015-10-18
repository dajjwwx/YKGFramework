<?php
namespace app\models\form;

use \YKG\YKG;

class Login
{
	private $username;
	private $password;

	public function validate()
	{
		$model = User::find(array('username'=>$this->username, 'password'=>$this->password));

		if($model)
		{
			YKG::app()->session->add('user',[
				'id'=>$model->id,
				'name'=>$model->username;
			]);
		}
	}
}