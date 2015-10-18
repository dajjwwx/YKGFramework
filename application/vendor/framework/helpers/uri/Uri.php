<?php 
namespace YKG\helpers\uri;

class Uri
{

	public function create($router, $params=[])
	{

		return '/?r='.$router.($params?'&':'').http_build_query($params);
	}
}
?>