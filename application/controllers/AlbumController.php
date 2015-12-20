<?php
namespace app\controllers;

use YKG\YKG;
use YKG\base\Controller;
use YKG\helpers\Util;
use app\models\Post;
use YKG\helpers\HUploader;

class AlbumController extends Controller
{

	public $layout = '//layouts/blog';

	public function actionIndex()
	{

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

	public function actionUpload()
	{
		$output_dir = "./public/uploads/";

		Util::writeToFile($_FILES, 'a+');

		if(isset($_FILES["myfile"]))
		{
			$ret = array();

			$error =$_FILES["myfile"]["error"];
			//You need to handle  both cases
			//If Any browser does not support serializing of multiple files using FormData() 
			if(!is_array($_FILES["myfile"]["name"])) //single file
			{
		 	 	$fileName = $_FILES["myfile"]["name"];
		 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
		    		$ret[]= $fileName;
			}
			else  //Multiple files, file[]
			{
			  $fileCount = count($_FILES["myfile"]["name"]);
			  for($i=0; $i < $fileCount; $i++)
			  {
			  	$fileName = $_FILES["myfile"]["name"][$i];
				move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
			  	$ret[]= $fileName;
			  }
			
			}
		    Util::writeToFile(json_encode($ret),'a+');
		 }


		// $uploader = new HUploader('editormd-image-file',['allowFiles'=>['.jpg','.png','.gif'],'maxSize'=>10,'savePath'=>'/public/uploads/']);



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