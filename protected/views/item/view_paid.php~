<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
	array('label'=>'List item', 'url'=>array('index')),
	array('label'=>'Create item', 'url'=>array('create')),
	array('label'=>'Update item', 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>'Delete item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage item', 'url'=>array('admin')),
);
?>
<?php  print $message ; ?>
<h1>View item #<?php echo $model->item_id; ?></h1>
<div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'item_name',
		'item_desc',
        array(
           'label' => 'last paid price',
           'type'  => 'raw',
            'value' => $price
        ),
        array(
           'label' => 'Item direct price',
           'type'  => 'raw',
           'value' => $model->item_direct_sale_price , 
        ),
        array(
           'label' => 'Item group',
           'type'  => 'raw',
            'value' => $model->getItemGroups()[$model->item_group]
        ),
        array(
           'label' => 'Image',
           'type'  => 'raw',
           'value' => "<img src='" . $model->getImgPath($model->item_id, 'main_item_pic', 'med') . "' />" ,
       ),
       array(
           'label' => 'Accept Paid Price', 
           'type'  => 'raw', 
           'value' => '<a href="' . YII::app()->createUrl('item/acceptPaid?id=' . $model->item_id ). '">Accept<a>',
       ),
	),
)); ?>

</div>
