<?php

class ItemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';



	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
        private $validIMG;


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', 
				'actions'=>array('view', 'create','update','pay', 'viewPaid', 'acceptPaid', 'manage', 'directbuy'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /*
     * pay money for an item
     */
    public function actionPay()
    {
        $price = 0;
        $model = $this->loadModel();
        $price = $model->item_init_price;  
        $data  = array();
        $pay_for_item = new pay_for_item();
        $record       = $pay_for_item->get_last((int) $_GET['id'], 1);
        if(isset($record[0]))
        {
            $price = $record[0]->price; 
        }
        if($price != 0 && isset($_POST['i_p']))
        {
            if($_POST['i_p'] < $price + $model->item_lowest_rise
            ||  $_POST['i_p'] > $price + $model->item_height_rise 
            )
            {
                $data['error'] = "Rise should be between " . ( $price +   $model->item_lowest_rise) . " and " . ( $price + $model->item_height_rise);
            }
            if(!isset($data['error']))
            {
                $pay_for_item->item_id = $model->item_id;
 //               $pay_for_item->user_id = Yii::app()->user->getId();
                $pay_for_item->user_id = 11;
                $pay_for_item->price   = $_POST['i_p'] ;
                if($pay_for_item->save())
                {
                    $data['success'] = "Succes";
                }
            }
        }
        else
        {
            $data['error'] = "not_found";
        }
        $this->renderPartial("_pay", array('data' => json_encode($data)));
    }
    /*
     *direct buy for an item
     */
    public function actionDirectbuy()
    {
        $model        = $this->loadModel();
        $pay_for_item = new pay_for_item();
        $pay_for_item->item_id = $model->item_id;
//               $pay_for_item->user_id = Yii::app()->user->getId();
        $pay_for_item->user_id = 11;
        $pay_for_item->price   = $model->item_direct_sale_price;
        if($pay_for_item->save())
        {
            $model->status = "finish";
            $model->saveAttributes(array("status" => "finish"));
        }
        $cs           = YII::app()->getClientScript();
        $cs->registerScriptFile("http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js");
		$this->render('view',array(
			'model' => $model,
            'price' => $model->item_direct_sale_price,
            'message' => "Done Successfully"
		));
    } 
	/**
	 *Accept payment
	 */
	public function actionAcceptPaid()
	{
        $model        = $this->loadModel();
        $cs            = YII::app()->getClientScript();
        $cs->registerScriptFile("http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js");
        $cs           = YII::app()->getClientScript();
        $price        = $model->item_init_price ;
        $lastPayment  = new pay_for_item();
        $finish_date   = $model->item_date_created  + ($model->item_total_time * 24 * 60 * 60);
        $elapsed_days  = 0 ;
        $elapsed_sec  = $finish_date - time();
        if($elapsed_sec > 0 )
        {
            $elapsed_days = floor($elapsed_sec / (60 * 60 * 24)) + 1;
        }
        if($p = $lastPayment->get_last_price($_GET['id']))
        {
            $price = $p;
        }
        $model->saveAttributes(array("status" => "finish"));
		$this->render('view',array(
			'model' => $model,
            'price' => $price,
            'elapsed_days' => $elapsed_days,
            'message' => "Email Have been sent to the bayer"
		));
	}
	/**
	 * Displays a particular model.
	 */
	public function actionViewPaid()
	{
        $model        = $this->loadModel();
        $cs           = YII::app()->getClientScript();
        $price        = $model->item_init_price ;
        $lastPayment  = new pay_for_item();
        if($p = $lastPayment->get_last_price($_GET['id']))
        {
            $price = $p;
        }
		$this->render('view_paid',array(
			'model' => $model,
            'price' => $price,
            'message' => ""
		));
	}
    
   
	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
        $model         = $this->loadModel();
        $cs            = YII::app()->getClientScript();
        $cs->registerScriptFile("http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js");
        $price         = $model->item_init_price ;
        $finish_date   = $model->item_date_created  + ($model->item_total_time * 24 * 60 * 60);
        $elapsed_days  = 0 ;
        $elapsed_sec  = $finish_date - time();
        if($elapsed_sec > 0 )
        {
            $elapsed_days = floor($elapsed_sec / (60 * 60 * 24)) + 1;
        }
        $lastPayment   = new pay_for_item();
        if($p = $lastPayment->get_last_price($_GET['id']))
        {
            $price = $p;
        }
		$this->render('view',array(
			'model' => $model,
            'elapsed_days' => $elapsed_days,
            'price' => $price,
            'message' => ""
		));
	}
    
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new item;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['item']))
		{
            $map    = array();    
            $list = $model->handleImageUpload($_FILES['item'], 4);
            $model->setValidIMG($list);
            foreach($list as $key=>$value)
            {
                if($value != "")
                {
                    $map[] = $model->img_map[$key];
                }
            }
			$model->attributes = $_POST['item'];
            if(strpos($model->item_lowest_rise, "%") !== false)
            {
                $model->item_lowest_rise = $model->item_init_price * $model->item_lowest_rise / 100;
            }
            if(strpos($model->item_height_rise, "%") !== false)
            {
                $model->item_height_rise = $model->item_height_rise * $model->item_init_price / 100;
            }
            $model->item_pic   = join($map, ",");
            $model->item_date_created = time();
			if($model->save())
            {
                $model->saveFile($list);
				$this->redirect(array('view','id'=>$model->item_id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model    = $this->loadModel();
        $status   = $model->getStatus();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['item']))
		{
			$model->attributes = $_POST['item'];
            $model['status'] = 'active';
            if(isset($status[$_POST['item']['status']]))
            {
                $model['status'] = $_POST['item']['status'];
            }
			if($model->save())
				$this->redirect(array('view','id'=>$model->item_id));
		}
        if(Yii::app()->user->name != "admin")
        {
            unset($status['in-active']);
        }
		$this->render('update',array(
			'model'=>$model,
            'status' => $status
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $mItem         = new item();
		$this->render('index',array('dataProvider'=> $mItem->getRandomItem(), 'model' => $mItem));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$model=new item('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['item']))
			$model->attributes=$_GET['item'];
        $model->user_id = 11;
		$this->render('manage',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new item('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['item']))
			$model->attributes=$_GET['item'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=item::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
