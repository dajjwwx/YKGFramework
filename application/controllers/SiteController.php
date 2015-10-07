<?php
namespace app\controllers;

use \YKG\base\Controller;
use \app\models\Book;

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

	public function actionDb()
	{
		$model = Book::find(1);
		echo $model->name;
		echo $model->author;
	}

	public function actionTest()
	{
		echo "actionTest";
	}
}
?>