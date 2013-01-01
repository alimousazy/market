<?php
$this->breadcrumbs=array(
	'User Plans'=>array('index'),
	$model->plan_id,
);

$this->menu=array(
	array('label'=>'List user_plans', 'url'=>array('index')),
	array('label'=>'Create user_plans', 'url'=>array('create')),
	array('label'=>'Update user_plans', 'url'=>array('update', 'id'=>$model->plan_id)),
	array('label'=>'Delete user_plans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->plan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage user_plans', 'url'=>array('admin')),
);
?>

<h1>View user_plans #<?php echo $model->plan_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'plan_id',
		'plan_type',
		'plan_start',
		'plan_end',
	),
)); ?>
