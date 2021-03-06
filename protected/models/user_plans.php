<?php

/**
 * This is the model class for table "user_plans".
 *
 * The followings are the available columns in table 'user_plans':
 * @property integer $plan_id
 * @property string $plan_type
 * @property double $plan_start
 * @property double $plan_end
 */
class user_plans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return user_plans the static model class
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
		return 'user_plans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plan_start, plan_end', 'numerical'),
			array('plan_type', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('plan_id, plan_type, plan_start, plan_end', 'safe', 'on'=>'search'),
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
			'plan_id' => 'Plan',
			'plan_type' => 'Plan Type',
			'plan_start' => 'Plan Start',
			'plan_end' => 'Plan End',
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

		$criteria->compare('plan_id',$this->plan_id);

		$criteria->compare('plan_type',$this->plan_type,true);

		$criteria->compare('plan_start',$this->plan_start);

		$criteria->compare('plan_end',$this->plan_end);

		return new CActiveDataProvider('user_plans', array(
			'criteria'=>$criteria,
		));
	}
}
