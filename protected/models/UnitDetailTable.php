<?php

/**
 * This is the model class for table "unit_detail_table".
 *
 * The followings are the available columns in table 'unit_detail_table':
 * @property integer $unit_detail_id
 * @property integer $unit_detail_unit_master_id
 * @property integer $unit_detail_course_id
 * @property string $unit_detail_title
 * @property string $unit_detail_desc
 * @property integer $unit_detail_created_by
 * @property string $unit_detail_creation_date
 */
class UnitDetailTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnitDetailTable the static model class
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
		return 'unit_detail_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_detail_unit_master_id, unit_detail_course_id, unit_detail_title, unit_detail_desc, unit_detail_created_by, unit_lec_date, unit_detail_creation_date', 'required', 'message'=>''),
			array('unit_detail_unit_master_id, unit_detail_course_id, unit_detail_created_by', 'numerical', 'integerOnly'=>true),
			array('unit_detail_title', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('unit_detail_id, unit_detail_unit_master_id, unit_detail_course_id, unit_detail_title, unit_detail_desc, unit_detail_created_by, unit_detail_creation_date', 'safe', 'on'=>'search'),
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
			'unit_detail_id' => 'Unit Detail',
			'unit_detail_unit_master_id' => 'Unit Detail Unit Master',
			'unit_detail_course_id' => 'Unit Detail Course',
			'unit_detail_title' => 'Lesson Title',
			'unit_detail_desc' => 'Lesson Description',
			'unit_detail_created_by' => 'Created By',
			'unit_detail_creation_date' => 'Unit Detail Creation Date',
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

		$criteria->compare('unit_detail_id',$this->unit_detail_id);
		$criteria->compare('unit_detail_unit_master_id',$this->unit_detail_unit_master_id);
		$criteria->compare('unit_detail_course_id',$this->unit_detail_course_id);
		$criteria->compare('unit_detail_title',$this->unit_detail_title,true);
		$criteria->compare('unit_detail_desc',$this->unit_detail_desc,true);
		$criteria->compare('unit_detail_created_by',$this->unit_detail_created_by);
		$criteria->compare('unit_detail_creation_date',$this->unit_detail_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function unitwisesearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'unit_detail_course_id = :course_id';
	        $criteria->params = array(':course_id' => $_REQUEST['id']);

		$criteria->compare('unit_detail_id',$this->unit_detail_id);
		$criteria->compare('unit_detail_unit_master_id',$this->unit_detail_unit_master_id);
		$criteria->compare('unit_detail_course_id',$this->unit_detail_course_id);
		$criteria->compare('unit_detail_title',$this->unit_detail_title,true);
		$criteria->compare('unit_detail_desc',$this->unit_detail_desc,true);
		$criteria->compare('unit_detail_created_by',$this->unit_detail_created_by);
		$criteria->compare('unit_detail_creation_date',$this->unit_detail_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
