<?php
/* @var $this CompanyemailsController */
/* @var $model Companyemails */

$this->breadcrumbs=array(
	'Companyemails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Companyemails', 'url'=>array('index')),
	array('label'=>'Create Companyemails', 'url'=>array('create')),
	array('label'=>'Update Companyemails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Companyemails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Companyemails', 'url'=>array('admin')),
);
?>

<h1>View Companyemails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_id',
		'email',
	),
)); ?>
