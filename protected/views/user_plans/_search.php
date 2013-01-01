<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'plan_id'); ?>
		<?php echo $form->textField($model,'plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_type'); ?>
		<?php echo $form->textField($model,'plan_type',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_start'); ?>
		<?php echo $form->textField($model,'plan_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plan_end'); ?>
		<?php echo $form->textField($model,'plan_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->