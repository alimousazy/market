<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'advs_title'); ?>
		<?php echo $form->textField($model,'advs_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_group'); ?>
		<?php echo $form->textField($model,'advs_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_sub_group'); ?>
		<?php echo $form->textField($model,'advs_sub_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_country'); ?>
		<?php echo $form->textField($model,'advs_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_exact_location'); ?>
		<?php echo $form->textField($model,'advs_exact_location',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_item_price'); ?>
		<?php echo $form->textField($model,'advs_item_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_desc'); ?>
		<?php echo $form->textField($model,'advs_desc',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_pic'); ?>
		<?php echo $form->textField($model,'advs_pic',array('size'=>60,'maxlength'=>400)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advs_id'); ?>
		<?php echo $form->textField($model,'advs_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->