<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->plan_id), array('view', 'id'=>$data->plan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_type')); ?>:</b>
	<?php echo CHtml::encode($data->plan_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_start')); ?>:</b>
	<?php echo CHtml::encode($data->plan_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_end')); ?>:</b>
	<?php echo CHtml::encode($data->plan_end); ?>
	<br />


</div>