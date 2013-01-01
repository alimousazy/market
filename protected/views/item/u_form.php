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
		<?php echo $form->labelEx($model,'item_total_time'); ?>
		<?php echo $form->dropDownList($model, 'item_total_time', $model->getAuctionDays()); ?>
		<?php echo $form->error($model,'item_total_time'); ?>
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
