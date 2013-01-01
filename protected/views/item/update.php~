<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id=>array('view','id'=>$model->item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List item', 'url'=>array('index')),
	array('label'=>'Create item', 'url'=>array('create')),
	array('label'=>'View item', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'Manage item', 'url'=>array('admin')),
);
?>

<h1>Update item <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_u_form', array('model'=>$model, 'status' => $status)); ?>
