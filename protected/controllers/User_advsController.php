<?php

class User_advsController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'connect'),
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
    public function actionConnect()
    {

        $return = array();
        $id = (int) $_POST['u_id'];
        $user_id =  Yii::app()->user->getId();
        $connect_for_advs = connect_for_advs::model()->findAllByAttributes(array
            (
                "user_id" => $user_id,
                "advs_id" => $id
            ));
        if(!empty($connect_for_advs))
        {
            $return['msg'] = "Your request already sent to the owner";
        }
        else if(!($model = $this->loadModel()))
        {
            $return['msg'] = "Error:- Please try again later";
        }
        else
        {
            $bayer_email  = User::model()->findbyPk($user_id)->email;
            $seller_email = User::model()->findbyPk($model->user_id)->email;
            $connect_for_advs = new connect_for_advs();
            $connect_for_advs->user_id = $user_id;
            $connect_for_advs->advs_id = $id;
            $connect_for_advs->sendEmail($bayer_email, $seller_email);
            if($connect_for_advs->save())
            {
                $return['msg'] = "Operation Done Successfully.";
            }
            else
            {
                $return['msg'] = "Error Happend, Please try agina later.";
            }
        }
        print json_encode($return);
        return true;
    }
	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
        $user_id =  Yii::app()->user->getId();
        $model = $this->loadModel();
        if($model->advs_status == "banned" 
            && $user_id != $model->user_id )
        {
            throw new CHttpException(404,'The requested page does not exist.');
        }
		$this->render('view',array(
			'model'=> $model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new user_advs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['user_advs']))
		{
            $map = array();
            $list = $model->handleImageUpload($_FILES['user_advs'], 1);
            $model->setValidIMG($list);
            foreach($list as $key=>$value)
            {
                if($value != "")
                {
                    $map[] = $model->img_map[$key];
                }
            }
            $_POST['user_advs']['advs_pic']   = join($map, ",");
            $_POST['user_advs']['advs_time']  = time();
            $_POST['user_advs']['user_id']  =  Yii::app()->user->getId(); 
			$model->attributes = $_POST['user_advs'];
            $model->user_id =  Yii::app()->user->getId();
			if($model->save())
            {
                $model->saveFile($list);
				$this->redirect(array('view','id'=>$model->advs_id));
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
		$model             = $this->loadModel();
        $user_id           = Yii::app()->user->getId(); 
        if($model->user_id != $user_id 
            && Yii::app()->user->name != "admin")
        {
			throw new CHttpException(403,'Not Authrized');
        } 
        if(Yii::app()->user->name != "admin")
        {
            $list = $model->get_status_list();
            unset($list['banned']);
            $model->set_status_list($list);
        }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['user_advs']))
		{
			$model->attributes=$_POST['user_advs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->advs_id));
		}

		$this->render('update',array(
			'model'=>$model,
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
        $mItem         = new user_advs();
		$this->render('index',array('dataProvider'=> $mItem->getRandomItem(), 'model' => $mItem));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new user_advs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['user_advs']))
			$model->attributes=$_GET['user_advs'];

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
				$this->_model=user_advs::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-advs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
