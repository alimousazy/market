<?php

/**
 * This is the model class for table "user_advs".
 *
 * The followings are the available columns in table 'user_advs':
 * @property string $advs_title
 * @property integer $advs_group
 * @property integer $advs_sub_group
 * @property integer $advs_country
 * @property string $advs_exact_location
 * @property double $advs_item_price
 * @property string $advs_desc
 * @property string $advs_pic
 * @property integer $advs_id
 */
class user_advs extends CActiveRecord
{

    const IMAGE_HEIGHT = 100;
    const IMAGE_WIDTH = 100;

    const UPLOAD_IMAGE_SIZE  = 1048576;
    public static $allowed_image_type = array("image/jpg", "image/jpeg"); // 1MB
    public $img_map = array("advs_pic"  => "top");
    public $img_sizes = array(
        "med" =>  array(200, 200),
        "large" => array(400,400),
    );

    private $status_list = array(
        "active" => "active",
        "not-active" => "non active",
        "banned" => "banned",
    );
    private $imgUpload ;
    public function loadImageUpload()
    {
        if(!isset($this->imgUpload))
        {
            $this->imgUpload = new ImageUpload(self::UPLOAD_IMAGE_SIZE,  self::$allowed_image_type,self::IMAGE_WIDTH, self::IMAGE_HEIGHT);
        }
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @return user_advs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function set_status_list($list)
    {
        $this->status_list = $list; 
    }
    public function get_status_list()
    {
        return $this->status_list;
    }
    public function get_advs_sub_group()
    {
        return array(
             "Cars",
             "Houses"
        );
    }
    /**
     * Check for uploaded image and validate if they are valid images
     *
     */
    public function handleImageUpload($file_list, $numOfImage)
    {
        $this->loadImageUpload();
        return $this->imgUpload->handleImageUpload($file_list, $numOfImage);
    }

    public function get_advs_group()
    {
        return array(
            0 => "For Sale",
            1 => "For Rent",
        );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_advs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advs_title, advs_exact_location, advs_desc', 'required'),
			array('advs_group, advs_sub_group', 'numerical', 'integerOnly'=>true),
            array('advs_group', 'in', 'range' => array_keys($this->get_advs_group())),
            array('advs_sub_group', 'in', 'range' => array_keys($this->get_advs_sub_group())),
			array('advs_item_price', 'numerical'),
			array('advs_title', 'length', 'max'=>100),
			array('advs_status', 'in', 'range' => array_keys($this->get_status_list())),
			array('advs_exact_location', 'length', 'max'=>200),
			array('advs_desc, advs_pic', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('advs_title, advs_group, advs_sub_group, advs_country, advs_exact_location, advs_item_price, advs_desc, advs_pic', 'safe', 'on'=>'search'),
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
			'advs_title' => 'Advs Title',
			'advs_group' => 'Advs Group',
			'advs_sub_group' => 'Advs Sub Group',
			'advs_country' => 'Advs Country',
			'advs_exact_location' => 'Advs Exact Location',
			'advs_item_price' => 'Advs Item Price',
			'advs_desc' => 'Advs Desc',
			'advs_pic' => 'Advs Pic',
			'advs_id' => 'Advs',
			'advs_status' => 'Status',
		);
	}
    /*
     *check if img is in valid img list 
     */
    public function isImgValid($attr, $param)
    {
        $this->loadImageUpload();
        if($this->item_id != 0)
            return true;
        if(!isset($this->imgUpload->validIMG[$attr]))
        {
            $this->addError($attr, 'Please provide valid image');
        }
        return true;
    }
    /**
     * get random items from each user groups
     */
    public function getRandomItem()
    {
        $ranges       = array();
        $user_plans   = new user_plans();
        $list = $user_plans->findAll();
        $sql_list = array();
        foreach($list as $item)
        {
            $temp = array($item->plan_start, $item->plan_end);
            $ranges[] = $temp;
        }
        $sql = "SELECT colm FROM (SELECT user_advs.*, advs_id as id  FROM user_advs INNER JOIN user_points ON user_advs.user_id = user_points.user_id WHERE points > '%s' AND points < '%s' AND advs_status = 'active' ORDER BY rand()) AS T" ;
        foreach($ranges as $item)
        {
            $sql_list[] = sprintf($sql,  $item[0], $item[1]);
        }
        $sql  = implode(" UNION ", $sql_list);
        $count = Yii::app()->db->createCommand("SELECT SUM(total) from (" . str_replace("colm", "count(*) as Total", $sql) . ") AS B")->queryScalar();
		$dataProvider = new CSqlDataProvider(str_replace("colm", "*", $sql ),
            array(
                'totalItemCount'=> $count,
                'pagination'=>array(
                    'pageSize'=> 10,
                ),
            )
         );
        return $dataProvider;
    }
    public function getImgPath($id, $position, $size_name)
    {
        $folder_name  = "/assets/user_advs_" .  $id;
        return  $folder_name . "/" . $this->img_map[$position] . "_" . $size_name . ".jpeg";
    }
    public function saveFile($list)
    {
        $this->loadImageUpload();
        $lastInsertId = Yii::app()->db->getLastInsertId(); 
        $folder_name  = "./assets/user_advs_" .  $lastInsertId;
        $this->imgUpload->setImageSize($this->img_sizes);
        $this->imgUpload->setImageMap($this->img_map);
        return $this->imgUpload->saveFile($folder_name, $list);
    }

    /*
     * setter for valid image
     */
    public function setValidIMG($validIMG)
    {
        $this->loadImageUpload();
        $this->imgUpload->setValidIMG($validIMG);
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

		$criteria->compare('advs_title',$this->advs_title,true);

		$criteria->compare('advs_group',$this->advs_group);

		$criteria->compare('advs_sub_group',$this->advs_sub_group);

		$criteria->compare('advs_country',$this->advs_country);

		$criteria->compare('advs_exact_location',$this->advs_exact_location,true);

		$criteria->compare('advs_item_price',$this->advs_item_price);

		$criteria->compare('advs_desc',$this->advs_desc,true);

		$criteria->compare('advs_pic',$this->advs_pic,true);

		$criteria->compare('advs_id',$this->advs_id);

		return new CActiveDataProvider('user_advs', array(
			'criteria'=>$criteria,
		));
	}
}
