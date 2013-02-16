<?php
$this->breadcrumbs=array(
	'User Advs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List user_advs', 'url'=>array('index')),
	array('label'=>'Manage user_advs', 'url'=>array('admin')),
);
?>

<h1>Create user_advs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>