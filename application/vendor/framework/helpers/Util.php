<?php
namespace YKG\helpers;

class Util
{
	public static function dump($param)
	{
		echo "<pre>";
		var_dump($param);
		echo "</pre>";
	}

		/**
	 * 
	 * @param string $content
	 * @param string $mode
	 * @param string $filename
	 * @param string $separate
	 */
	public static function writeToFile($content, $mode="w+", $line=__LINE__, $curfile=__FILE__, $filename = './public/log.txt',$separator = "\r\n")
	{

//  		$content = array(
//  			'Create Date'=>date('y/m/d h:i:s'),
//  			'Compare Url'=>Yii::app()->request->url,
//  			'Content'=>$content
// 		);
 		
// 		$content = implode("\t\t", $content);
 
		if (!file_exists($filename)) {
			HFile::createDir(dirname($filename));
		}
		
		$content = print_r($content,true);

		$file = fopen($filename, $mode);
        
        if(flock($file, LOCK_EX))
        {
        	$template = '[Datetime]'.date('y-m-d h:i:s')."\t".'[File]'.$curfile.'('.$line.')'.$separator.
					        	$content.$separator;
        	
            fwrite($file, $template);
            flock($file, LOCK_UN);
        }
        else
        {
            echo "Error locking file!";
        }
        
		
		fclose($file);	
	}
}