<?php
	use \YKG\helpers\HHtml;
	use \app\models\Category;
	$this->breadcrumbs = array('index','dkk');

	echo HHtml::checkbox('test',true,array('value'=>1));

	// echo Category::checkTree();

?>
<?php $this->renderPartial('category/_form'); ?>
