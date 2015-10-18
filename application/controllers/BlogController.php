<?php
namespace app\controllers;

use YKG\base\Controller;
use YKG\helpers\Util;

class BlogController extends Controller
{
	public $layout = '//layouts/blog';

	public function actionIndex()
	{
		$this->render('index',array(

		));
	}

	public function actionPublish()
	{
		$this->layout = '//layouts/main';

		if(isset($_POST['test-editormd-markdown-doc']))
		{
			 header("Content-Type:text/html; charset=utf-8");

			 if (isset($_POST['submit'])) {
			        echo "<pre>";
			        echo htmlspecialchars($_POST["test-editormd-markdown-doc"]);
			        echo "<br/><br/>";
			        echo htmlspecialchars($_POST["test-editormd-html-code"]);
			        echo "</pre>";
			 }
		}

		Util::dump($_POST);

		$this->render('publish');
	}

}