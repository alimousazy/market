<?php
$this->breadcrumbs=array(
	'User Advs',
);

$this->menu=array(
	array('label'=>'Create user_advs', 'url'=>array('create')),
	array('label'=>'Manage user_advs', 'url'=>array('admin')),
);
?>

<h1>User Advs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'viewData' => array('model' => $model)
)); ?>
