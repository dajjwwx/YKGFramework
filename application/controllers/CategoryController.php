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
			$model->user_id = YKG::app()->user->id;
			$model->catetype = Category::CATEGORY_TYPE_POST;

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