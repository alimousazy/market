<?php
$this->breadcrumbs=array(
	'User Plans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List user_plans', 'url'=>array('index')),
	array('label'=>'Manage user_plans', 'url'=>array('admin')),
);
?>

<h1>Create user_plans</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>