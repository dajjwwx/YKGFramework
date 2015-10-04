<?php
$ykg = dirname(__FILE__).'/application/vendor/framework/YKG.php';
require_once($ykg);

$data =  \YKG\helpers\Curl::vget('http://www.ykgframework.com/index.php?r=default/index&id=2&dd=todo');
// $data =  \YKG\helpers\Curl::vpost('http://www.ykgframework.com/index.php',array('id'=>'test'));
\YKG\helpers\Util::dump($data);

?>