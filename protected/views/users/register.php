<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Registration</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableAjaxValidation'=>true,
    'focus'=>array($model,'username')
)); ?>
 
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username') ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
 
    <div class="row">
        <?php echo $form->label($model,'password'); ?>
        <?php echo $form->passwordField($model,'password') ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
     <div class="row">
        <?php echo $form->label($model,'comfirm_password'); ?>
        <?php echo $form->passwordField($model,'comfirm_password') ?>
         <?php echo $form->error($model, 'comfirm_password'); ?>
    </div>
     <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email') ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="captcha">
        <?php $this->widget('CCaptcha'); ?>
    </div>
    <div class="row">
        <?php echo $form->textField($model,'verifyCode'); ?>
        <?php echo $form->error($model, 'verifyCode'); ?>
    </div>
    <div class="row submit">
        <?php echo CHtml::submitButton('Register'); ?>
    </div>
    <?php $this->widget('application.modules.hybridauth.widgets.renderProviders'); ?>
<?php $this->endWidget(); ?>
</div><!-- form -->