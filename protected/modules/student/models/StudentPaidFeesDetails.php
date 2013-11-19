<?php

/**
 * This is the model class for table "student_paid_fees_details".
 *
 * The followings are the available columns in table 'student_paid_fees_details':
 * @property integer $student_paid_fees_id
 * @property integer $student_paid_student_id
 * @property integer $student_paid_course_id
 * @property integer $student_paid_amount
 * @property string $student_paid_date
 * @property integer $student_paid_to
 */
class StudentPaidFeesDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentPaidFeesDetails the static model class
	 */
	public $student_first_name;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_paid_fees_details';
	}

	public function getConcated()
	{
	      $fmt = CurrencyFormatTable::model()->findAll();
	      return $this->student_paid_amount." ".$fmt[0]['currency_format'];
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_paid_student_id, student_paid_course_id, student_paid_amount, student_paid_date, student_paid_to', 'required', 'message'=>''),
			array('student_paid_student_id, student_paid_course_id, student_paid_amount, student_paid_to', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_paid_fees_id, student_paid_student_id, student_paid_course_id, student_paid_amount, student_paid_date, student_paid_to, student_first_name', 'safe', 'on'=>'search'),
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
		  'relCourse' => array(self::BELONGS_TO, 'CourseMaster', 'student_paid_course_id'),
		  'relStudent' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 'student_paid_student_id=student_info_transaction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_paid_fees_id' => 'Student Paid Fees',
			'student_paid_student_id' => 'Student',
			'student_paid_course_id' => 'Register in Course',
			'student_paid_amount' => 'Amount',
			'student_paid_date' => 'Paid Date',
			'student_paid_to' => 'Student Paid To',
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
		$criteria->with = array('relStudent');

		$criteria->compare('student_paid_fees_id',$this->student_paid_fees_id);
		$criteria->compare('relStudent.student_first_name',$this->student_first_name, true);
		$criteria->compare('student_paid_student_id',$this->student_paid_student_id);
		$criteria->compare('student_paid_course_id',$this->student_paid_course_id);
		$criteria->compare('student_paid_amount',$this->student_paid_amount);
		$criteria->compare('student_paid_date',$this->student_paid_date,true);
		$criteria->compare('student_paid_to',$this->student_paid_to);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function studPaidFees()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'student_paid_student_id = :stud_id';
	        $criteria->params = array(':stud_id' => $_REQUEST['id']);

		$criteria->compare('student_paid_fees_id',$this->student_paid_fees_id);
		$criteria->compare('student_paid_student_id',$this->student_paid_student_id);
		$criteria->compare('student_paid_course_id',$this->student_paid_course_id);
		$criteria->compare('student_paid_amount',$this->student_paid_amount);
		$criteria->compare('student_paid_date',$this->student_paid_date,true);
		$criteria->compare('student_paid_to',$this->student_paid_to);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
