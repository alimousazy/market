<?php

/**
 * This is the model class for table "tbl_companies".
 *
 * The followings are the available columns in table 'tbl_companies':
 * @property integer $company_id
 * @property integer $user_id
 * @property string $name
 * @property string $web_url
 * @property string $description
 * @property integer $photos
 * @property integer $videos
 *
 * The followings are the available model relations:
 * @property OpenidUsers $user
 * @property Services[] $services
 */
class Companies extends CActiveRecord
{
        public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Companies the static model class
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
		return 'tbl_companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, name, web_url, description', 'required'),
			array('user_id, photos, videos', 'numerical', 'integerOnly'=>true),
			array('name, web_url', 'length', 'max'=>150),
                        array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_id, user_id, name, web_url, description, photos, videos', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'services' => array(self::HAS_MANY, 'Services', 'company_id'),
                        'branches' => array(self::HAS_MANY, 'Branches', 'company_id'),
                        'emails' => array(self::HAS_MANY, 'Companyemails', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'company_id' => 'Company',
			'user_id' => 'User',
			'name' => 'Name',
			'web_url' => 'Web Url',
			'description' => 'Description',
			'photos' => 'Photos',
			'videos' => 'Videos',
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

		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('web_url',$this->web_url,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('photos',$this->photos);
		$criteria->compare('videos',$this->videos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}