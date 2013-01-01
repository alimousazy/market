<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
	array('label'=>'List item', 'url'=>array('index')),
	array('label'=>'Create item', 'url'=>array('create')),
	array('label'=>'Update item', 'url'=>array('update', 'id'=>$model->item_id)),
	array('label'=>'Delete item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage item', 'url'=>array('admin')),
);
?>
<style type="text/css">
  .modal {
    background-color:#fff;
    display:none;
    width:350px;
    padding:15px;
    text-align:left;
    border:2px solid #333;
 
    opacity:0.8;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    -moz-box-shadow: 0 0 50px #ccc;
    -webkit-box-shadow: 0 0 50px #ccc;
  }
 
</style>

<?php  print $message ; ?>
<h1>View item #<?php echo $model->item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'item_id',
		'item_name',
		'item_desc',
        array(
           'label' => 'last paid price',
           'type'  => 'raw',
            'value' => $price
        ),
        array(
           'label' => 'Elapsed Days',
           'type'  => 'raw',
           'value' => $elapsed_days,
        ),
        array(
           'label' => 'Item direct price',
           'type'  => 'raw',
           'value' => $model->item_direct_sale_price .  
           ($model->status == 'active' ? sprintf("<a href='%s' > %s </a>", YII::app()->createUrl('item/directbuy?id=' . $model->item_id ), "direct buy" ) : "")
        ),
        array(
           'label' => 'pay',
           'type'  => 'raw', 
           'value' => "<input " . ($model->status != 'active' ? 'disabled' : '') . "  type='button' value='pay' id='pay-money' rel='#pay-money-box' />",
        ), 
        array(
           'label' => 'Item group',
           'type'  => 'raw',
            'value' => $model->getItemGroups()[$model->item_group]
        ),
        array(
           'label' => 'Image',
           'type'  => 'raw',
           'value' => "<img src='" . $model->getImgPath($model->item_id, 'main_item_pic', 'med') . "' />" ,
        )
	),
)); ?>
<div id="pay-money-box" class="modal">
    <div id="pay-error" >
    </div>
    Please enter the price
    <input type="text" value="" name="item_price" id="item-price" />
    <input type="button" value="" name="pay_price" id="pay-price" />

</div>
<script type="text/javascript">
  // select one or more elements to be overlay triggers
   $("#pay-money").overlay({
        color: '#ccc',
        top: 50
  });

    $("#direct-buy").click( function () {
        window.location = "";
    });
    $("#pay-price").click( function () {
        $.ajax(
            {
                "url"  : "<?php print YII::app()->createUrl('item/pay?id=' . $model->item_id); ?>",
                "data" : {"i_p" : $("#item-price").val()},
                "type" : "POST",
                "success" : function (data, status)
                {
                    item = jQuery.parseJSON(data);
                    if(item.error)
                    {
                        $("#pay-error").html(item.error);
                    }
                    else
                    {
                        window.location.reload();
                    }
                }
            }
        );
    });
</script>
