<?php
/* @var $this CompanyemailsController */
/* @var $model Companyemails */

$this->breadcrumbs=array(
	'Companyemails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Companyemails', 'url'=>array('index')),
	array('label'=>'Create Companyemails', 'url'=>array('create')),
	array('label'=>'View Companyemails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Companyemails', 'url'=>array('admin')),
);
?>

<h1>Update Companyemails <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>