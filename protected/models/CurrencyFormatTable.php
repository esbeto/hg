<?php

/**
 * This is the model class for table "currency_format_table".
 *
 * The followings are the available columns in table 'currency_format_table':
 * @property integer $currency_format_id
 * @property string $currency_format
 */
class CurrencyFormatTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurrencyFormatTable the static model class
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
		return 'currency_format_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('currency_format_name, currency_format', 'required' , 'message'=>''),
			array('currency_format', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('currency_format_id, currency_format_name, currency_format', 'safe', 'on'=>'search'),
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
			'currency_format_id' => 'Currency Format',
			'currency_format' => 'Format',
			'currency_format_name' => 'Name',
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

		$criteria->compare('currency_format_id',$this->currency_format_id);
		$criteria->compare('currency_format_name',$this->currency_format_name);
		$criteria->compare('currency_format',$this->currency_format,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
