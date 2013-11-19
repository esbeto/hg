<?php

/**
 * This is the model class for table "course_master".
 *
 * The followings are the available columns in table 'course_master':
 * @property integer $course_master_id
 * @property string $course_name
 * @property integer $course_category_id
 * @property integer $course_level
 * @property integer $course_completion_hours
 * @property string $course_code
 * @property integer $course_cost
 * @property string $course_desc
 * @property integer $course_created_by
 * @property string $course_creation_date
 */
class CourseMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseMaster the static model class
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
		return 'course_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_name, course_category_id, course_level, course_completion_hours, course_code, course_cost, course_desc, course_created_by, course_creation_date', 'required', 'message'=>''),
			array('course_category_id, course_level, course_completion_hours, course_cost, course_created_by', 'numerical', 'integerOnly'=>true),
			array('course_name', 'length', 'max'=>100),
			array('course_code', 'length', 'max'=>25),
			array('course_desc', 'length', 'max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_master_id, course_name, course_category_id, course_level, course_completion_hours, course_code, course_cost, course_desc, course_created_by, course_creation_date', 'safe', 'on'=>'search'),
		);
	}

	public function primaryKey()
	{
	    return 'course_master_id';
	}

	public function getConcated()
	{
	      $fmt = CurrencyFormatTable::model()->findAll();
	      return $this->course_cost." ".$fmt[0]['currency_format'];
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'relCat'=>array(self::BELONGS_TO, 'QualificationType', 'course_category_id'),
			'Rel_user'=>array(self::BELONGS_TO, 'User', 'course_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_master_id' => 'Course Master',
			'course_name' => 'Course Name',
			'course_category_id' => 'Course Category',
			'course_level' => 'Course Level',
			'course_completion_hours' => 'Course Completion Hours',
			'course_code' => 'Course Code',
			'course_cost' => 'Course Cost',
			'course_desc' => 'Course Description',
			'course_created_by' => 'Course Created By',
			'course_creation_date' => 'Course Creation Date',
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

		$criteria->compare('course_master_id',$this->course_master_id);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('course_category_id',$this->course_category_id);
		$criteria->compare('course_level',$this->course_level);
		$criteria->compare('course_completion_hours',$this->course_completion_hours);
		$criteria->compare('course_code',$this->course_code,true);
		$criteria->compare('course_cost',$this->course_cost);
		$criteria->compare('course_desc',$this->course_desc,true);
		$criteria->compare('course_created_by',$this->course_created_by);
		$criteria->compare('course_creation_date',$this->course_creation_date,true);
		$course_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['course_records']=$course_data;
		return $course_data;
		
	}
}
