<?php
/**
 * @usage:YKG::app()->m->t('app.common','Login')
 */
namespace YKG\components;
use YKG\YKG;
use YKG\base\Component;

class Messages extends Component
{
	public function t($file, $message)
	{
		$array =  $this->getMessageFile($file);

		return $array[$message];
	}

	public function getMessageFile($file)
	{
		$module = YKG::app()->request->getModuleId();

		$language = YKG::app()->language;

		$path = '/messages/'.$language.'/'.$file.'.php';

		if($module != '')
		{
			$filename = __APP__.'/modules/'.$module.$path;
		}
		else
		{
			$filename = __APP__.$path;
		}

		// echo $filename;

		if(file_exists($filename))
		{
			return require($filename);
		}

		
	}
}