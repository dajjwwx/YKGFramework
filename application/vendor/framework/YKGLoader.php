<?php
namespace YKG;

class YKGLoader
{

	protected static function getClassPath($class)
	{
		// self::pre($class);

		$filename = $class;

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


	public static function  activerecord_autoload($class_name)
	{
		$path = \ActiveRecord\Config::instance()->get_model_directory();
		$root = realpath(isset($path) ? $path : '.');

		if (($namespaces = \ActiveRecord\get_namespaces($class_name)))
		{
			$class_name = array_pop($namespaces);
			$directories = array();

			foreach ($namespaces as $directory)
				$directories[] = $directory;

			$root .= DIRECTORY_SEPARATOR . implode($directories, DIRECTORY_SEPARATOR);
		}

		$file = "$root/$class_name.php";

		if (file_exists($file))
			require $file;
	}

}

require __DIR__.'/base/activerecord/Singleton.php';
require __DIR__.'/base/activerecord/Config.php';
require __DIR__.'/base/activerecord/Utils.php';
require __DIR__.'/base/activerecord/DateTime.php';
require __DIR__.'/base/activerecord/Model.php';
require __DIR__.'/base/activerecord/Table.php';
require __DIR__.'/base/activerecord/ConnectionManager.php';
require __DIR__.'/base/activerecord/Connection.php';
require __DIR__.'/base/activerecord/SQLBuilder.php';
require __DIR__.'/base/activerecord/Reflections.php';
require __DIR__.'/base/activerecord/Inflector.php';
require __DIR__.'/base/activerecord/CallBack.php';
require __DIR__.'/base/activerecord/Exceptions.php';
require __DIR__.'/base/activerecord/Cache.php';

spl_autoload_register(array('\YKG\YKGLoader','load'));
spl_autoload_register(array('\YKG\YKGLoader','activerecord_autoload'), false, true);
?>
