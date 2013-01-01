<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_name'); ?>
		<?php echo $form->textField($model,'item_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_group'); ?>
		<?php echo $form->textField($model,'item_group',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_init_price'); ?>
		<?php echo $form->textField($model,'item_init_price'); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'item_total_time'); ?>
		<?php echo $form->textField($model,'item_total_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_direct_sale_price'); ?>
		<?php echo $form->textField($model,'item_direct_sale_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
