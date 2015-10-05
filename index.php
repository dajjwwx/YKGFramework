<?php
error_reporting(E_ALL|E_STRICT);

// header('Content-type:text/html;charset=utf-8');

define('ROOT', dirname(__FILE__));

$_SERVER['HTTP_HOST'] = 'www.ykgframework.com';
$_SERVER['REQUEST_URI'] = '/index.php?r=site/index&id=1';
$_SERVER['QUERY_STRING'] = 'r=site/index&id=1';

$app = dirname(__FILE__).'/application/vendor/framework/YKG.php';

require_once $app;

\YKG\YKG::app();


// $data =  \YKG\helpers\Curl::vget('http://www.ykgframework.com/index.php?r=default/index&id=2&dd=todo');
// $data =  \YKG\helpers\Curl::vget('http://www.ykgframework.com/index.php?r=default/index&id=2&dd=todo');
// \YKG\helpers\Util::dump($data);