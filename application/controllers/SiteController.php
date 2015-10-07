<?php
namespace app\controllers;

use \YKG\base\Controller;

class SiteController extends Controller
{
	public $layout = '//layouts/main';

	public function  actionIndex()
	{

		$this->render('site/index',[
			'data'=>'Hello world~~A22222222ctionIndex',
			'm'=>$_SERVER
		]);
	}

	public function actionTest()
	{
		echo "actionTest";
	}
}
?>