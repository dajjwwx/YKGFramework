<?php
namespace YKG;

class YKGLoader
{

	protected static function getClassPath($class)
	{
		// self::pre($class);

		$class = explode('\\', $class);

		if($class[0] == 'app')
		{
			$class[0] = 'application';
			$class = implode('\\', $class);
			$filename = dirname(dirname(dirname(dirname(__FILE__)))).'/'.str_replace('\\', '/', $class).'.php';
		}
		elseif($class[0] == 'YKG')
		{
			array_shift($class);	
			$class = implode('\\', $class);		
			$filename = dirname(__FILE__).'/'.str_replace('\\', '/', $class).'.php';
		}
				

		return $filename;
	}

	/**
	 * Loading Sytem Files
	 */
	public static function load($class)
	{
		$filename = self::getClassPath($class);
		

		if(file_exists($filename)){
			include_once $filename;
			// echo "找到了，$filename ~\n";
		}
		else
		{
			// echo "客官，我们努力找到了，$filename 没有哦:~\n";
		}
	}

}

spl_autoload_register(array('\YKG\YKGLoader','load'));
?>
