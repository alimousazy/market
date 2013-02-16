<?php
$this->breadcrumbs=array(
	'User Advs'=>array('index'),
	$model->advs_id,
);
?>
<div id="advs-error"> </div>
<?php
$this->menu=array(
	array('label'=>'List user_advs', 'url'=>array('index')),
	array('label'=>'Create user_advs', 'url'=>array('create')),
	array('label'=>'Update user_advs', 'url'=>array('update', 'id'=>$model->advs_id)),
	array('label'=>'Delete user_advs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->advs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage user_advs', 'url'=>array('admin')),
);
?>

<h1>View user_advs #<?php echo $model->advs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'advs_title',
        array('label'=> 'Adv Group', 'type' => 'raw', 'value' => $model->get_advs_group()[$model->advs_group]),
        array('label'=> 'Adv Sub Group', 'type' => 'raw', 'value' => $model->get_advs_sub_group()[$model->advs_sub_group]),
        array('label'=> 'Connect', 'type' => 'raw', 'value' => '<input type="button" value="connect" id="connect_owner" />'),
		'advs_country',
		'advs_exact_location',
		'advs_item_price',
		'advs_desc',
		'advs_pic',
		'advs_id',
	),
)); ?>
<script type="text/javascript">
$('#connect_owner').click(function () {
    $.ajax(
        {
            "url"  : "<?php print YII::app()->createUrl('user_advs/connect/' . $model->advs_id ); ?>",
            "data" : {"u_id" : "<?php print $model->advs_id ?>"},
            "type" : "POST",
            "success" : function (data, status)
            {
                item = jQuery.parseJSON(data);
                if(item.msg)
                {
                    $("#advs-error").html(item.msg);
                }
            }
        });
});  
</script>
