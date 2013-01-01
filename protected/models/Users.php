<?php

/**
 * This is the model class for table "openid_users".
 *
 * The followings are the available columns in table 'openid_users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $superuser
 * @property integer $status
 */
class Users extends CActiveRecord
{
        public  $comfirm_password;
        public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'openid_users';
	}

        public function beforeSave() {
            if ($this->isNewRecord){
                $this->password = Yii::app()->getModule('user')->encrypting($this->password);
                $this->status = 1;
                $this->createtime = time();
            }else{
                $this->lastvisit = time();
            }
            return parent::beforeSave();
        }        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, comfirm_password, verifyCode', 'required'),
			array('username', 'length', 'min'=>7 , 'max'=>50),
			array('password, email', 'length','min'=>7 , 'max'=>150),
                        array('email' , 'email'),
                        array('verifyCode', 'captcha'),
                        array('comfirm_password' , 'compare',  'compareAttribute'=>'password'),
                        array('username','unique','className'=>'Users', 'attributeName'=>'username',),
                        array('email','unique','className'=>'Users', 'attributeName'=>'email'),   
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, email', 'safe', 'on'=>'search'),
		);
	}

        public function actions(){
            return array(
            // captcha action renders the CAPTCHA image displayed on the user registration page
                'captcha'=>array(
                    'class'=>'CCaptchaAction',
                    'backColor'=>0xFFFFFF,
                ),
            );
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
            return array(
                'companies'=>array(self::HAS_ONE, 'Companies', 'user_id'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'createtime' => 'Createtime',
			'lastvisit' => 'Lastvisit',
			'superuser' => 'Superuser',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('lastvisit',$this->lastvisit);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}