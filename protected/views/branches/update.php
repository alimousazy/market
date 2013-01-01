<?php
/* @var $this BranchesController */
/* @var $model Branches */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->name=>array('view','id'=>$model->branch_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Branches', 'url'=>array('index')),
	array('label'=>'Create Branches', 'url'=>array('create')),
	array('label'=>'View Branches', 'url'=>array('view', 'id'=>$model->branch_id)),
	array('label'=>'Manage Branches', 'url'=>array('admin')),
);
?>

<h1>Update Branches <?php echo $model->branch_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>