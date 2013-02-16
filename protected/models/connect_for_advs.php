<?php

/**
 * This is the model class for table "connect_for_advs".
 *
 * The followings are the available columns in table 'connect_for_advs':
 * @property integer $user_id
 * @property integer $advs_id
 * @property string $p_time
 */
class connect_for_advs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return connect_for_advs the static model class
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
		return 'connect_for_advs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, advs_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, advs_id, p_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'advs_id' => 'Advs',
			'p_time' => 'P Time',
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('advs_id',$this->advs_id);

		$criteria->compare('p_time',$this->p_time,true);

		return new CActiveDataProvider('connect_for_advs', array(
			'criteria'=>$criteria,
		));
	}
    public function sendEmail($from, $to)
    {
        $message = new YiiMailMessage();
        $message->setBody('Please send me an email', 'text/html');
        $message->subject = 'My Subject';
        $message->addTo('johnDoe@domain.com');
        $message->from = Yii::app()->params['adminEmail'];
        Yii::app()->mail->send($message);
        return true;
    }
}
