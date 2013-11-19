<?php

/**
 * This is the model class for table "employee_certificate_details_table".
 *
 * The followings are the available columns in table 'employee_certificate_details_table':
 * @property integer $employee_certificate_details_table_id
 * @property integer $employee_certificate_details_table_emp_id
 * @property integer $employee_certificate_type_id
 * @property integer $employee_certificate_created_by
 * @property string $employee_certificate_creation_date
 * @property integer $employee_certificate_org_id
 */
class EmployeeCertificateDetailsTable extends CActiveRecord
{
	public $employee_first_name,$certificate_title;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeCertificateDetailsTable the static model class
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
		return 'employee_certificate_details_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_certificate_details_table_emp_id, employee_certificate_type_id, employee_certificate_created_by, employee_certificate_creation_date, employee_certificate_org_id', 'required','message'=>''),
			array('employee_certificate_details_table_emp_id, employee_certificate_type_id, employee_certificate_created_by, employee_certificate_org_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_certificate_details_table_id, employee_certificate_details_table_emp_id, employee_certificate_type_id, employee_certificate_created_by, employee_certificate_creation_date, employee_certificate_org_id,employee_first_name,certificate_title', 'safe', 'on'=>'search'),
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
			'cer_employee_id' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' => 't.employee_certificate_details_table_emp_id = employee_info_transaction_id'),
			'emp_certificate_name' => array(self::BELONGS_TO, 'Certificate','employee_certificate_type_id'),	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_certificate_details_table_id' => 'Employee Certificate Details Table',
			'employee_certificate_details_table_emp_id' => 'Employee Name',
			'employee_certificate_type_id' => 'Certificate Type',
			'employee_certificate_created_by' => 'Created By',
			'employee_certificate_creation_date' => 'Creation Date',
			'employee_certificate_org_id' => 'Organization',
			'employee_first_name'=>'First Name',
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

		$criteria->condition = 'employee_certificate_org_id = :employee_certificate_org_id';
	        $criteria->params = array(':employee_certificate_org_id' => Yii::app()->user->getState('org_id'));

		$criteria->with = array('cer_employee_id');
		$criteria->compare('cer_employee_id.employee_first_name',$this->employee_first_name,true);
		//$criteria->compare('emp_certificate_name.certificate_title',$this->certificate_title,true);

		$criteria->join = 'JOIN employee_transaction et ON employee_certificate_details_table_emp_id = et.employee_transaction_id JOIN employee_designation emp_des ON et.employee_transaction_designation_id = emp_des.employee_designation_id';
		$criteria->compare('employee_certificate_details_table_id',$this->employee_certificate_details_table_id);
		$criteria->compare('employee_certificate_details_table_emp_id',$this->employee_certificate_details_table_emp_id);
		$criteria->compare('employee_certificate_type_id',$this->employee_certificate_type_id);
		$criteria->compare('employee_certificate_created_by',$this->employee_certificate_created_by);
		$criteria->compare('employee_certificate_creation_date',$this->employee_certificate_creation_date,true);
		$criteria->compare('employee_certificate_org_id',$this->employee_certificate_org_id);
		$EmployeeCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'emp_des.employee_designation_level ASC',
				),
		));
		   $_SESSION['EmployeeCertificateDetailsTable_records']=$EmployeeCertificateDetailsTable_records;
	return $EmployeeCertificateDetailsTable_records;
	}
	public function Employeesearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition = 'employee_certificate_details_table_emp_id = :employee_certificate_details_table_emp_id';
			$criteria->params = array(':employee_certificate_details_table_emp_id' => $_REQUEST['id']);
		
		
		$criteria->with = array('cer_employee_id');
		$criteria->compare('cer_employee_id.employee_first_name',$this->employee_first_name,true);
		//$criteria->compare('emp_certificate_name.certificate_title',$this->certificate_title,true);

		$criteria->compare('employee_certificate_details_table_id',$this->employee_certificate_details_table_id);
		$criteria->compare('employee_certificate_details_table_emp_id',$this->employee_certificate_details_table_emp_id);
		$criteria->compare('employee_certificate_type_id',$this->employee_certificate_type_id);
		$criteria->compare('employee_certificate_created_by',$this->employee_certificate_created_by);
		$criteria->compare('employee_certificate_creation_date',$this->employee_certificate_creation_date,true);
		$criteria->compare('employee_certificate_org_id',$this->employee_certificate_org_id);
		$EmployeeCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['EmployeeCertificateDetailsTable_records']=$EmployeeCertificateDetailsTable_records;
	return $EmployeeCertificateDetailsTable_records;
	}

}
