<?php
$this->breadcrumbs=array(
	'User Plans'=>array('index'),
	$model->plan_id=>array('view','id'=>$model->plan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List user_plans', 'url'=>array('index')),
	array('label'=>'Create user_plans', 'url'=>array('create')),
	array('label'=>'View user_plans', 'url'=>array('view', 'id'=>$model->plan_id)),
	array('label'=>'Manage user_plans', 'url'=>array('admin')),
);
?>

<h1>Update user_plans <?php echo $model->plan_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>