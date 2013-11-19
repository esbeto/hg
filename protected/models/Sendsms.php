<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Sendsms extends CFormModel
{
	public $phone_no;
	public $message;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
		
			// phone_no and message are required
			array('phone_no, message', 'required','message'=>''),
			array('phone_no','numerical', 'integerOnly'=>true ,'message'=>''),
			array('phone_no', 'length', 'max'=>12),

		
		
		);
	}

	/**
	 * Declares attribute labels.
	 */

}
