<?php
namespace app\controllers;

use \YKG\base\Controller;
use \app\models\Book;
use \app\models\User;
use \YKG\helpers\Util;


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

		echo \YKG\YKG::app()->getName();

		// $a = array('username'=>'zhangsan','age'=>200);  
		// $b = array(5,8,9,array(1,2,3,array(7,10)));  
		// $c = array('username'=>'lisi',100,'user'=>array('sex'=>1,'age'=>20));  
		// $d = array('user' => array('sex'=>0));  
		// $e = \YKG\helpers\HArray::multiMerge($a,$b,$c,$d);  

		// Util::dump($e);

		// echo \YKG\YKG::app()->request->getHostName();

		$book = Book::find(1);

		echo $book->name;

		echo $book->user->name;

		// $user = User::find(1);

		// echo $user->name;

		// echo $user->book->name;

		// foreach($user->book as $book)
		// {
		// 	// echo $book->user->name;

		// 	Util::dump($book->user);
		// }

		// \YKG\helpers\Util::dump($user->book);
	}
}
?>