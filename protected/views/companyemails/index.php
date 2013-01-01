<?php
/* @var $this CompanyemailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Companyemails',
);

$this->menu=array(
	array('label'=>'Create Companyemails', 'url'=>array('create')),
	array('label'=>'Manage Companyemails', 'url'=>array('admin')),
);
?>

<h1>Companyemails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
