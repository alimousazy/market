<?php
/* @var $this BranchesController */
/* @var $model Branches */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Branches', 'url'=>array('index')),
	array('label'=>'Create Branches', 'url'=>array('create')),
	array('label'=>'Update Branches', 'url'=>array('update', 'id'=>$model->branch_id)),
	array('label'=>'Delete Branches', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->branch_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Branches', 'url'=>array('admin')),
);
?>

<h1>View Branches #<?php echo $model->branch_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'branch_id',
		'company_id',
		'name',
		'description',
	),
)); ?>
