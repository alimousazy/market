<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-advs-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true,
    )

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'advs_exact_location'); ?>
		<?php echo $form->textField($model,'advs_exact_location',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'advs_exact_location'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'advs_status'); ?>
		<?php echo $form->dropDownList($model,'advs_status',$model->get_status_list()); ?>
		<?php echo $form->error($model,'advs_status'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
