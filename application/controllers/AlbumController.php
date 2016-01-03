<?php
namespace app\controllers;

use YKG\YKG;
use YKG\base\Controller;
use YKG\helpers\Util;
use app\models\Post;
use app\models\File;
use app\models\Album;
use app\models\Category;
use YKG\helpers\HUploader;

class AlbumController extends Controller
{

	public $layout = '//layouts/album';

	public function actionIndex()
	{

		$data = Album::find('all');

		$this->render('index',[
			'data'=>$data
		]);
	}

	public function actionView()
	{

		$models = File::find('all',[
			'conditions'=>[
				'album_id'=>$_GET['id']
			],
			'order'=>'id DESC'
		]);

		$this->render('view', [
			'models'=>$models
		]);
	}

	public function actionImpress()
	{
		$this->layout = '//layouts/test';



		$this->render('impress');		
	}

	public function actionCreate()
	{

		// $_POST['Album'] = [
		// 	'description'=>'description',
		// 	'name'=>'Album',
		// 	'category_id'=>1,
		// 	'user_id'=>1
		// ];

		if(isset($_POST['Album']['name']))
		{
			$model = new Album($_POST['Album']);
			$model->user_id = YKG::app()->user->getId();

			if($model->save())
			{
				Util::dump($model);
				sleep(5);
				$this->redirect('album/upload',['id'=>$model->id]);
			}
		}

		$this->render('create');
	}


	public function actionTest()
	{

		Util::dump($_POST);
		Util::dump($_FILES);

		// if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 20000))
		// {
		  if ($_FILES["file"]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		    }
		  else
		    {
		    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		    echo "Type: " . $_FILES["file"]["type"] . "<br />";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

		    if (file_exists("upload/" . $_FILES["file"]["name"]))
		      {
		      echo $_FILES["file"]["name"] . " already exists. ";
		      }
		    else
		      {
		      move_uploaded_file($_FILES["file"]["tmp_name"],
		      "upload/" . $_FILES["file"]["name"]);
		      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		      }
		    }
		  // }
		// else
		//   {
		//   echo "Invalid file";
		//   }	
	}

	public function actionTT()
	{
		$tt = [
			'category_id' => 2,
		    'status' => 0,
		    'allow_comment' => 1,
		    'hits' => 0,
		    'islocal' => 1,
		    'server' => 'local',
		    'oriname'=>'4512324224184.jpg',
		    'name' => '14512324224184.jpg',
		    'filetype' => 21,
		    'user_id' => 1,
		    'publish' => 1451232422,
		    'size' => 2361864,
		    'extension' => '.jpg',
		    'mine' =>'image/jpeg',
		];

				 		$model = new File($tt);	 		

		 		if($model->save())
		 		{
		 			// $this->redirect('album/view',['id'=>$model->id]);
		 		}
		 		else
		 		{
		 			Util::writeToFile($model->errors);
		 		}
	}

	public function actionUpload()
	{
		$this->layout = '//layouts/album';
		$output_dir = "./public/uploads/";

		if(isset($_FILES["album"]))
		{
			$ret = array();

			$error =$_FILES["album"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData() 
			if(!is_array($_FILES["album"]["name"])) //single file
			{
		 	 // 	$fileName = $_FILES["album"]["name"];
		 		// if(move_uploaded_file($_FILES["album"]["tmp_name"],$output_dir.$fileName))
		 		// {

		 		// }
		 		$uploader = new HUploader('album',['allowFiles'=>['.jpg','.png','.gif'],'maxSize'=>100000,'savePath'=>'./public/uploads/']);

		 		$info = $uploader->getFileInfo();
		 		// Util::dump($info);

		 		$attributes = [
		 			'album_id'=>intval($_GET['id']),
		 			'status'=>0,
		 			'allow_comment'=>true,
		 			'hits'=>0,
		 			'oriname'=>$info['originalName'],
		 			'islocal'=>true,
		 			'server'=>'local',
		 			'name'=>$info['name'],
		 			'filetype'=>Category::CATEGORY_TYPE_ALBUM,
		 			'user_id'=>YKG::app()->user->getId(),
		 			'publish'=>time(),
		 			'size'=>$info['size'],
		 			'extension'=>$info['type'],
		 			'mine'=>$info['mine'],
		 		];
		 		Util::writeToFile($attributes,'a+');	

		 		$model = new File($attributes);	 		

		 		if($model->save())
		 		{
		 			// $this->redirect('album/view',['id'=>$model->id]);
		 		}
		 		else
		 		{
		 			Util::writeToFile($model->errors);
		 		}


		    		$ret[]= $info['name'];
			}
			else  //Multiple files, file[]
			{
			  	$fileCount = count($_FILES["album"]["name"]);
			  	for($i=0; $i < $fileCount; $i++)
			  	{
			  		$fileName = $_FILES["album"]["name"][$i];
					move_uploaded_file($_FILES["album"]["tmp_name"][$i],$output_dir.$fileName);
			  		$ret[]= $fileName;
			  	}
			
			}
		 }


		$uploader = new HUploader('album',['allowFiles'=>['.jpg','.png','.gif'],'maxSize'=>100000,'savePath'=>'./public/uploads/']);



		// Util::writeToFile($uploader);

		// $file = $_FILES['editormd-image-file'];
		// $tmp = $file['tmp_name'];
		// $name = $file['name'];

		// $destination = './public/uploads/'.$name;

		// Util::writeToFile($destination, 'a+');

		// move_uploaded_file($tmp, $destination);




		// echo json_encode([
		// 	'success'=>1,
		// 	'message'=>'上传成功～',
		// 	'url'=>'/public/uploads/'.$name
		// ]);	

		$this->render('album/upload');
	}
}
?>