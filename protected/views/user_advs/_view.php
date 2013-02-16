<?php $data =  (object) $data; ?>
<div class="view">

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->advs_id), array('view', 'id'=>$data->advs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_title')); ?>:</b>
	<?php echo CHtml::encode($data->advs_title); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_group')); ?>:</b>
	<?php echo CHtml::encode($data->advs_group); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_sub_group')); ?>:</b>
	<?php echo CHtml::encode($data->advs_sub_group); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_country')); ?>:</b>
	<?php echo CHtml::encode($data->advs_country); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_exact_location')); ?>:</b>
	<?php echo CHtml::encode($data->advs_exact_location); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_item_price')); ?>:</b>
	<?php echo CHtml::encode($data->advs_item_price); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('advs_desc')); ?>:</b>
	<?php echo CHtml::encode($data->advs_desc); ?>
	<br />

    <img src="<?php print $model->getImgPath($data->advs_id, 'advs_pic', 'med'); ?>" />
	<br />

</div>
