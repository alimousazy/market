<?php

/**
 * This is the model class for table "pay_for_item".
 *
 * The followings are the available columns in table 'pay_for_item':
 * @property integer $item_id
 * @property integer $user_id
 * @property double $price
 */
class pay_for_item extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return pay_for_item the static model class
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
		return 'pay_for_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_id, user_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('item_id, user_id, price', 'safe', 'on'=>'search'),
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
			'item_id' => 'Item',
			'user_id' => 'User',
			'price' => 'Price',
		);
	}
	/**
	 * Retrieves the last price paid for item 
     * @param int item id 
	 * @return int last paid price
	 */
    public function get_last_price($item_id)
    {
        $price        = 0;
        $record       = $this->get_last((int) $item_id, 1);
        if(isset($record[0]))
        {
            $price = $record[0]->price; 
        }
        return $price;
    }
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
     * @param int item id 
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function get_last($item_id, $limit)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('item_id', $item_id);
        $criteria->order = "price desc";
        $criteria->limit = $limit;
        $arecord =  new CActiveDataProvider('pay_for_item', array(
			'criteria'=>$criteria,
		));
		return $arecord->getData();
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

		$criteria->compare('item_id',$this->item_id);

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('price',$this->price);

		return new CActiveDataProvider('pay_for_item', array(
			'criteria'=>$criteria,
		));
	}
}
