<?php
$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'Create item', 'url'=>array('create')),
	array('label'=>'Manage item', 'url'=>array('admin')),
);
?>

<h1>Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'viewData' => array('model' => $model)
)); ?>
