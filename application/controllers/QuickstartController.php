<?php
namespace app\controllers;

use YKG\base\Controller;
use YKG\helpers\Util;
use app\models\Category;
use app\models\Post;

class QuickstartController extends Controller
{
	public $layout = '//layouts/blog';


	public function accessRules()
	{
		return [
			[
				'allow',
				'actions'=>['index', 'login','register'],
				'users'=>['*']
			],
			[
				'allow', 
				'actions'=>['admin','logout'],
				'users'=>['@']
			]
		];
	}
	
	public function actionIndex()
	{
		$dataProvider  = Post::find('all',['order'=>'id desc']);

		$this->render('index',[
			'dataProvider'=>$dataProvider
		]);
	}

	public function actionView()
	{

		$model  = Post::find($_GET['id']);

		$this->render('view',[
			'model'=>$model
		]);
	}

}
?>