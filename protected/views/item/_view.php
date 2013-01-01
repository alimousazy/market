<div class="view">

    <?php $data = (object) $data ;?>
	<b><?php echo CHtml::encode($model->getAttributeLabel('item_name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->item_name),  array('view', 'id'=>$data->item_id)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('item_group')); ?>:</b>
	<?php echo CHtml::encode($model->getItemGroups()[$data->item_group]); ?>
	<br />

    <img src="<?php print $model->getImgPath($data->item_id, 'main_item_pic', 'med'); ?>" />
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('item_init_price')); ?>:</b>
	<?php echo CHtml::encode($data->item_init_price); ?>
	<br />


</div>
