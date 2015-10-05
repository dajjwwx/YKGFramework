<?php
namespace app\controllers;

use \YKG\base\Controller;

class SiteController extends Controller
{
	public function  actionIndex()
	{
		echo "actionIndex";

		$this->render('index',[
			'data'=>'hello world'
		]);
	}

	public function actionTest()
	{
		echo "actionTest";
	}
}
?>