<?php
/* @var $this CompanyemailsController */
/* @var $model Companyemails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companyemails-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <?php
               $models = Companies::model()->findAll(array('order' => 'company_id'));
               $list = CHtml::listData($models, 'company_id', 'name');
               echo CHtml::dropDownList('Companyemails[company_id]', $model, $list,array('empty' => '--Select a company--'));
               echo $form->error($model,'company_id');
               ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->