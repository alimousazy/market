<?php
/* @var $this CompaniesController */
/* @var $model Companies */
/* @var $form CActiveForm */
?>
<?php
$cs=Yii::app()->clientScript;
// Add CSs
$cs->registerCSSFile('/app/assets/cr5673uu/default.css');
$this->widget('application.extensions.swfupload.CSwfUpload', array(
    'jsHandlerUrl'=>'/app/assets/cr5673uu/handlers.js', //Relative path
    'postParams'=>array(),
    'config'=>array(
        'use_query_string'=>true,
        'upload_url'=>'http://localhost/app/index.php/companies/upload', //Use $this->createUrl method or define yourself
        'file_size_limit'=>'2 MB',
        'file_types'=>'*.jpg;*.png;*.gif;*.flv',
        'file_types_description'=>'Image Files',
        'file_upload_limit'=>0,
        'file_queue_error_handler'=>'js:fileQueueError',
        'file_dialog_complete_handler'=>'js:fileDialogComplete',
        'upload_progress_handler'=>'js:uploadProgress',
        'upload_error_handler'=>'js:uploadError',
        'upload_success_handler'=>'js:uploadSuccess',
        'upload_complete_handler'=>'js:uploadComplete',
        'custom_settings'=>array('upload_target'=>'divFileProgressContainer'),
        'button_placeholder_id'=>'swfupload',
        'button_width'=>170,
        'button_height'=>20,
        'button_text'=>'<span class="button">'.Yii::t('messageFile', 'Upload video').' (Max 2 MB)</span>',
        'button_text_style'=>'.button { font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size: 11pt; text-align: center; }',
        'button_text_top_padding'=>0,
        'button_text_left_padding'=>0,
        'button_window_mode'=>'js:SWFUpload.WINDOW_MODE.TRANSPARENT',
        'button_cursor'=>'js:SWFUpload.CURSOR.HAND',
        ),
    )
);
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companies-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
        ),    
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <?php
               $models = Users::model()->findAll(array('order' => 'id'));
               $list = CHtml::listData($models, 'id', 'username');
               echo CHtml::dropDownList('Companies[user_id]', $model, $list,array('empty' => '--Select a username--'));
               echo $form->error($model,'user_id');
               ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_url'); ?>
		<?php echo $form->textField($model,'web_url',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'web_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textField($model,'photos'); ?>
		<?php echo $form->error($model,'photos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'videos'); ?>
		<?php echo $form->textField($model,'videos'); ?>
		<?php echo $form->error($model,'videos'); ?>
	</div>
        <div class="row">
                <?php echo $form->labelEx($model,'image'); ?>
                <?php echo CHtml::activeFileField($model, 'image'); ?>
                <?php echo $form->error($model,'image'); ?>
        </div>
        <br/>
   <div class="row">
    <div id="divFileProgressContainer"></div>
    <div class="swfupload"><span id="swfupload"></span></div>
    </div>        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->