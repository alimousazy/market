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
		<?php echo $form->labelEx($model,'advs_title'); ?>
		<?php echo $form->textField($model,'advs_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'advs_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_group'); ?>
        <?php echo $form->dropDownList($model,'advs_group', $model->get_advs_group() ); ?>
		<?php echo $form->error($model,'advs_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_sub_group'); ?>
        <?php echo $form->dropDownList($model,'advs_sub_group', $model->get_advs_sub_group() ); ?>
		<?php echo $form->error($model,'advs_sub_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_country'); ?>
        <?php echo $form->dropDownList($model,'advs_country', array("jo" => "jordan")); ?>
		<?php echo $form->error($model,'advs_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_exact_location'); ?>
		<?php echo $form->textField($model,'advs_exact_location',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'advs_exact_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_item_price'); ?>
		<?php echo $form->textField($model,'advs_item_price'); ?>
		<?php echo $form->error($model,'advs_item_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_desc'); ?>
		<?php echo $form->textField($model,'advs_desc',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'advs_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advs_pic'); ?>
		<?php echo $form->fileField($model,'advs_pic'); ?>
		<?php echo $form->error($model,'advs_pic'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
