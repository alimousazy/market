<?php
/* @var $this CompanyemailsController */
/* @var $model Companyemails */

$this->breadcrumbs=array(
	'Companyemails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Companyemails', 'url'=>array('index')),
	array('label'=>'Manage Companyemails', 'url'=>array('admin')),
);
?>

<h1>Create Companyemails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>