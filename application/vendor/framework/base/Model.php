<?php
namespace YKG\base;

class Model extends Component
{

	protected $model_directory;
	protected $connections;

	public function registerORM()
	{
		\ActiveRecord\Config::initialize(function($cfg)
		{
		    $cfg->set_model_directory($this->modelDirectory);
		    $cfg->set_connections($this->connections);
		});
	}
}