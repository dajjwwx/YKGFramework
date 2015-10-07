<?php
namespace app\controllers;

use YKG\base\Controller;


class BlogController extends Controller
{
	public $layout = '//layouts/main';

	public function actionIndex()
	{
		$this->render('index',array(

		));
	}

}