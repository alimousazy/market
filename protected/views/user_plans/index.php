<?php
$this->breadcrumbs=array(
	'User Plans',
);

$this->menu=array(
	array('label'=>'Create user_plans', 'url'=>array('create')),
	array('label'=>'Manage user_plans', 'url'=>array('admin')),
);
?>

<h1>User Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
