<?php
/* @var $this CompaniesController */
/* @var $model Companies */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Companies', 'url'=>array('index')),
	array('label'=>'Create Companies', 'url'=>array('create')),
	array('label'=>'Update Companies', 'url'=>array('update', 'id'=>$model->company_id)),
	array('label'=>'Delete Companies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->company_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Companies', 'url'=>array('admin')),
);
?>

<h1>Companies #<?php echo $model->name; ?></h1>
<?php echo CHtml::image('/image.php?f='.$model->photos.'-'.$model->company_id, 'image', array('class' => 'banner'));?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'company_id',
		'user_id',
		'name',
		'web_url',
		'description',
		'photos',
		'videos',
	),
));
?>
<h1>View services </h1>
<?php
 if( $model->user  ) {
        $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->user,
        ));
 }
 ?>
<h1>View branches </h1>
<?php
  if( $model->branches  ) {
        $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->branches[0],
        'attributes'=>array(
		'name',
		'description',
	)    
        ));
  }
?>
<h1>View Emails </h1>
<?php
  if( $model->emails  ) {
        $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->emails[0],
        'attributes'=>array(
		'email',
	)    
        ));
  }
?>
