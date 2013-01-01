<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-form',
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
		<?php echo $form->labelEx($model,'item_name'); ?>
		<?php echo $form->textField($model,'item_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'item_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_group'); ?>
		<?php echo $form->dropDownList($model, 'item_group', $model->getItemGroups()); ?>
		<?php echo $form->error($model,'item_group'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_item_pic'); ?>
		<?php echo $form->fileField($model,'main_item_pic'); ?>
		<?php echo $form->error($model,'main_item_pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'left_item_pic'); ?>
		<?php echo $form->fileField($model,'left_item_pic'); ?>
		<?php echo $form->error($model,'left_item_pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'right_item_pic'); ?>
		<?php echo $form->fileField($model,'right_item_pic'); ?>
		<?php echo $form->error($model,'right_item_pic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top_item_pic'); ?>
		<?php echo $form->fileField($model,'top_item_pic'); ?>
		<?php echo $form->error($model,'top_item_pic'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'item_price_currency'); ?>
		<?php echo $form->dropDownList($model, 'item_price_currency', $model->getCurrencyList()); ?>
		<?php echo $form->error($model,'item_price_currency'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'item_total_time'); ?>
		<?php echo $form->dropDownList($model, 'item_total_time', $model->getAuctionDays()); ?>
		<?php echo $form->error($model,'item_total_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_desc'); ?>
		<?php echo $form->textArea($model,'item_desc'); ?>
		<?php echo $form->error($model,'item_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_init_price'); ?>
		<?php echo $form->textField($model,'item_init_price'); ?>
		<?php echo $form->error($model,'item_init_price'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'item_lowest_rise'); ?>
        <input type="button" class="button decrese-button" id="lowest-decrese-button" value="-" />
		<?php echo $form->textField($model,'item_lowest_rise'); ?>
        <input type="button" class="button rise-button" id="lowest-rise-button" value="+" />
		<?php echo $form->error($model,'item_lowest_rise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_height_rise'); ?>
        <input type="button" class="button decrese-button" id="heighst-decrese-button" value="-" />
		<?php echo $form->textField($model,'item_height_rise'); ?>
        <input type="button" class="button rise-button" id="heighst-rise-button" value="+" />
		<?php echo $form->error($model,'item_height_rise'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'item_lowest_price'); ?>
		<?php echo $form->textField($model,'item_lowest_price'); ?>
		<?php echo $form->error($model,'item_lowest_price'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'item_direct_sale_price'); ?>
		<?php echo $form->textField($model,'item_direct_sale_price'); ?>
		<?php echo $form->error($model,'item_direct_sale_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
dec = function (num, inc_value, min, max) {
  num = $.trim(num)  == ""? 0 : num;
  num =  parseInt(num);
  if(num != num)
  {
      num = 0;
  }
  if(num > 100)
  {
      num = 100; 
  }
  num -= inc_value; 
  if(num < 0 )
  {
      num = 0;
  }

  return Math.abs(num);
}
inc = function (num, inc_value, min, max) {
  num = $.trim(num)  == ""? 0 : num;
  num =  parseInt(num);
  if(num != num)
  {
      num = 0;
  }
  num += inc_value; 
  if(num < 0 )
  {
      num = 0;
  }
  if(num > 100)
  {
      num = 100; 
  }
  return Math.abs(num);
}
$("#heighst-decrese-button").click( function () {
  var price = $("#item_item_height_rise").val(); 
  $("#item_item_height_rise").val(dec(price, 10, 0, 100) + "%");
});

$("#heighst-rise-button").click( function () {
  var price = $("#item_item_height_rise").val(); 
  $("#item_item_height_rise").val(inc(price, 10, 0, 100) + "%");
});

$("#lowest-decrese-button").click( function () {
  var lowest_prize = $("#item_item_lowest_rise").val(); 
  $("#item_item_lowest_rise").val(dec(lowest_prize, 10, 0, 100) + "%");
});

$("#lowest-rise-button").click( function () {
  var lowest_prize = $("#item_item_lowest_rise").val(); 
  $("#item_item_lowest_rise").val(inc(lowest_prize, 10, 0, 100) + "%");
});

</script>

</div><!-- form -->
