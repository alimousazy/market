<?php
$this->breadcrumbs=array(
	'User Advs'=>array('index'),
	$model->advs_id=>array('view','id'=>$model->advs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List user_advs', 'url'=>array('index')),
	array('label'=>'Create user_advs', 'url'=>array('create')),
	array('label'=>'View user_advs', 'url'=>array('view', 'id'=>$model->advs_id)),
	array('label'=>'Manage user_advs', 'url'=>array('admin')),
);
?>

<h1>Update user_advs <?php echo $model->advs_id; ?></h1>

<?php echo $this->renderPartial('_u_form', array('model'=>$model)); ?>
