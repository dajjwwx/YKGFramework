<?php
namespace YKG\helpers;

use \YKG\YKG;
use \YKG\helpers\uri\Uri;

use \YKG\helpers\Util;

class HHtml
{
	public static $name;

	public static function tag($name, $htmlOptions=[])
	{
		self::$name = $name;

		$html = '<'.self::$name;
		foreach ($htmlOptions as $key => $value) {
			$html .= ' '.$key.'="'.$value.'" ';
		}
		$html .=(self::$name == 'br'||'hr'||'img'||'input') ?'/>':'';

		return $html;
	}

	public static function endTag()
	{
		return '</'.self::$name.'>';
	}

	private static function input($type, $name, $htmlOptions=[])
	{
		$html = '';

		$htmlOptions = array_merge(['name'=>$name, 'type'=>$type], $htmlOptions);

		$html .= self::tag('input', $htmlOptions);

		return $html;		
	}

	public static function password($name, $htmlOptions=[])
	{
		return self::input('password', $htmlOptions);
	}

	public static function text($name, $htmlOptions=[])
	{
		return self::input('text', $name, $htmlOptions);
	}

	public static function radio($name, $check=false, $htmlOptions=[])
	{
		$html = '';

		$htmlOptions = array_merge([ 'type'=>'checkbox','checked'=>$check==true?'checked':''], $htmlOptions);

		$html .= self::input('radio', $name, $htmlOptions);

		return $html;
	}

	public static function checkbox($name, $check=false, $htmlOptions=[])
	{

		$html = '';

		$htmlOptions = array_merge(['name'=>$name, 'type'=>'checkbox','checked'=>$check==true?'checked':''], $htmlOptions);

		// $html = self::tag('label',array('for'=>$name)).self::endTag();

		$html .= self::tag('input', $htmlOptions);

		return $html;
	}

	public static function dropDownList($name, $data, $htmlOptions=[])
	{
		$html = $option = '';
		$htmlOptions = array_merge(['name'=>$name], $htmlOptions);

		foreach ($data as $key => $value) {
			$option.= '<option value="'.$key.'">'.$value.'</option>';
		}

		$html .= self::tag('select', $htmlOptions).$option.self::endTag();

		return $html;
	}

	public static function img($src, $htmlOptions=[])
	{
		$htmlOptions = array_merge(['src'=>$src], $htmlOptions);
		return self::tag('img', $htmlOptions);
	}

	public static function link($text, $params=[], $htmlOptions=[])
	{

		$router = array_shift($params);

		$href = YKG::app()->uri->create($router, $params);

		$htmlOptions = array_merge(['href'=>$href], $htmlOptions);

		return self::tag('a ', $htmlOptions).$text.self::endTag();
	}
}