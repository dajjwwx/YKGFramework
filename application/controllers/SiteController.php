<?php
namespace app\controllers;

use \YKG\base\Controller;

class SiteController extends Controller
{
	public $layout = ROOT.'/application/views/layouts/main.php';

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