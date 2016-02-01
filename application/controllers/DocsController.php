<?php
namespace app\controllers;

use \YKG\YKG;
use \YKG\base\Controller;
use app\models\Post;

class DocsController extends Controller
{
	public $layout = '//layouts/blog';

	public function actionIndex()
	{

		// $models = Post::find('all');
		$model = new Post();
		$model->user_id = 1;//YKG::app()->user->getId();
		$model->category_id = 1;
		$model->title = "Hello world";

		$model->content = "#I've a dream to sing a song";
		$model->publish = time();
		$model->modify = time();
		$model->tags = 'Dream';

		$model->save();




		$this->render('index');
	}
}