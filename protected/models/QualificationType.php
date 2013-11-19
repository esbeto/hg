<?php

/**
 * This is the model class for table "qualification_type".
 *
 * The followings are the available columns in table 'qualification_type':
 * @property integer $qualification_type_id
 * @property string $qualification_type_name
 * @property string $qualification_type_desc
 * @property integer $qualification_type_created_by
 * @property string $qualification_type_creation_date
 */
class QualificationType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return QualificationType the static model class
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
		return 'qualification_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qualification_type_name, qualification_type_desc, qualification_type_created_by, qualification_type_creation_date', 'required', 'message'=>''),
			array('qualification_type_created_by', 'numerical', 'integerOnly'=>true),
			array('qualification_type_name', 'length', 'max'=>100),
			array('qualification_type_desc', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qualification_type_id, qualification_type_name, qualification_type_desc, qualification_type_created_by, qualification_type_creation_date', 'safe', 'on'=>'search'),
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
			'qualification_type_id' => 'Qualification Type',
			'qualification_type_name' => 'Type Name',
			'qualification_type_desc' => 'Description',
			'qualification_type_created_by' => 'Created By',
			'qualification_type_creation_date' => 'Creation Date',
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

		$criteria->compare('qualification_type_id',$this->qualification_type_id);
		$criteria->compare('qualification_type_name',$this->qualification_type_name,true);
		$criteria->compare('qualification_type_desc',$this->qualification_type_desc,true);
		$criteria->compare('qualification_type_created_by',$this->qualification_type_created_by);
		$criteria->compare('qualification_type_creation_date',$this->qualification_type_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
