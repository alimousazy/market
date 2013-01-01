<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-plans-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_type'); ?>
		<?php echo $form->textField($model,'plan_type',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'plan_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_start'); ?>
		<?php echo $form->textField($model,'plan_start'); ?>
		<?php echo $form->error($model,'plan_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_end'); ?>
		<?php echo $form->textField($model,'plan_end'); ?>
		<?php echo $form->error($model,'plan_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->