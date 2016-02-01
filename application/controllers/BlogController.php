<?php
namespace app\controllers;

use YKG\YKG;
use YKG\base\Controller;
use YKG\helpers\Util;
use YKG\helpers\HUploader;
use app\models\Post;


class BlogController extends Controller
{
	public $layout = '//layouts/blog';

	public function actionIndex()
	{

		$this->render('index',array(

		));
	}

	public function actionView()
	{

		$model  = Post::find($_GET['id']);

		$this->render('view',[
			'model'=>$model
		]);
	}

	public function actionUpload()
	{

		Util::writeToFile($_FILES);
		

		if(isset($_FILES["editormd-image-file"]))
		{		
			$uploader = new HUploader('editormd-image-file',[
				'allowFiles'=>['.jpg','.png','.gif'],
				'maxSize'=>10*1024,
				'savePath'=>'./public/uploads/'
			]);
			Util::writeToFile($uploader);
			echo json_encode([
				'success'=>1,
				'message'=>'上传成功～',
				'url'=>$uploader->getFullName()
			]);
		}


	}

	public function actionPublish()
	{
		$this->layout = '//layouts/editor';

		// YKG::app()->user->setId(1);

		// $_POST['Post'] = [
		// 	'title'=>'标题',
		// 	'cid'=>2,
		// 	'tags'=>'测试'
		// ];
		// $_POST['editormd-markdown-doc'] = '测试内容';

		if(isset($_POST['editormd-markdown-doc']))
		{
			// Util::dump($_POST);
			 // if (isset($_POST['submit'])) {
				$model = new Post($_POST['Post']);

				$model->user_id = YKG::app()->user->getId();
				$model->content = $_POST['editormd-markdown-doc'];
				$model->publish = time();
				$model->modify = time();
				if($model->save())
				{
					$this->redirect('blog/view',['id'=>$model->id]);
				}
				else
				{
					Util::dump($model->errors);
				}		 	
			 // }
		}

		$this->render('publish');
	}

}