<?php 
namespace YKG\base;

class Map
{

	/**
	 * @var array internal data storage
	 */
	private $_d=array();
	/**
	 * @var boolean whether this list is read-only
	 */
	private $_r=false;

	/**
	 * Adds an item into the map.
	 * Note, if the specified key already exists, the old value will be overwritten.
	 * @param mixed $key key
	 * @param mixed $value value
	 * @throws CException if the map is read-only
	 */
	public function add($key,$value)
	{
		if(!$this->_r)
		{
			if($key===null)
				$this->_d[]=$value;
			else
				$this->_d[$key]=$value;
		}
		else
			throw new Exception(Yii::t('yii','The map is read only.'));
	}

	public function mergeWith($data,$recursive=true)
	{
		if(is_array($data) || $data instanceof Traversable)
		{
			if($data instanceof Map)
				$data=$data->_d;
			if($recursive)
			{
				if($data instanceof Traversable)
				{
					$d=array();
					foreach($data as $key=>$value)
						$d[$key]=$value;
					$this->_d=self::mergeArray($this->_d,$d);
				}
				else
					$this->_d=self::mergeArray($this->_d,$data);
			}
			else
			{
				foreach($data as $key=>$value)
					$this->add($key,$value);
			}
		}
		elseif($data!==null)
			throw new CException(Yii::t('yii','Map data must be an array or an object implementing Traversable.'));
	}
}

?>
