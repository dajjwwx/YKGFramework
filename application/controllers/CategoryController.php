<?php
namespace app\controllers;

use \YKG\YKG;
use \YKG\base\Controller;
use \YKG\helpers\Util;
use \app\models\Category;

class CategoryController extends Controller
{

	public $layout = '//layouts/blog';

	public function actionCreate()
	{

		if(isset($_POST['Category']))
		{

			$model = new Category($_POST['Category']);
			$model->uid = YKG::app()->user->id;

			if($model->save())
			{
				Util::dump($model->attributes);
			}
			else
			{
				Util::dump($model->errors);
			}		

		}

		$this->render('create');
	}
}