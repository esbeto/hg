<?php

class CourseMasterController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$lesson = new UnitDetailTable('unitwisesearch');
		$unit = new CourseUnitTable('coursewisesearch');
		$this->render('view',array(
		  'model'=>$this->loadModel($_REQUEST['id']), 'unit'=>$unit, 'lesson'=>$lesson,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionNewCreate()
	{
		$model=new CourseMaster;

		$this->performAjaxValidation($model);
		   if(isset($_POST['CourseMaster']))
		   {
			$model->attributes=$_POST['CourseMaster'];
			$model->course_created_by = Yii::app()->user->id;
			$model->course_creation_date = new CDbExpression('NOW()');
			if($model->save()) {
			  if (Yii::app()->request->isAjaxRequest)
	                  {
		            echo CJSON::encode(array(
		                'status'=>'success', 
		                //'div'=>"Classroom successfully added"
		                ));
		            exit;               
		          }          
	     	        }
		   }

		if (Yii::app()->request->isAjaxRequest)
		{
		    echo CJSON::encode(array(
		        'status'=>'failure', 
		        'div'=>$this->renderPartial('_newform', array('model'=>$model), true)));
		    exit;               
		}
		else
		    $this->render('newCreate',array('model'=>$model,));

	}

	public function actionNewUpdate()
	{
		$model=$this->loadModel($_REQUEST['id']);

		$this->performAjaxValidation($model);
		   if(isset($_POST['CourseMaster']))
		   {
			$model->attributes=$_POST['CourseMaster'];
			$model->course_created_by = Yii::app()->user->id;
			$model->course_creation_date = new CDbExpression('NOW()');
			if($model->save()) {
			  if (Yii::app()->request->isAjaxRequest)
	                  {
		            echo CJSON::encode(array(
		                'status'=>'success', 
		                //'div'=>"Classroom successfully added"
		                ));
		            exit;               
		          }          
	     	        }
		   }

		if (Yii::app()->request->isAjaxRequest)
		{
		    echo CJSON::encode(array(
		        'status'=>'failure', 
		        'div'=>$this->renderPartial('_newUpdateform', array('model'=>$model), true)));
		    exit;               
		}
		else
		    $this->render('newUpdate',array('model'=>$model,));

	}

	public function actionCreate()
	{
		$model=new CourseMaster;

		$this->performAjaxValidation($model);

		if(isset($_POST['CourseMaster']))
		{
			$model->attributes=$_POST['CourseMaster'];
			$model->course_created_by = Yii::app()->user->id;
			$model->course_creation_date = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('view','id'=>$model->course_master_id));

	    }
		$this->render('create',array(
			'model'=>$model,
		));

		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['CourseMaster']))
		{
			$model->attributes=$_POST['CourseMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->course_master_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else if(!Yii::app()->request->isPostRequest) {
			$stud_tran = StudentTransaction::model()->findAll(array('condition'=>'student_transaction_course_id='.$id));
			if(!empty($stud_tran))
			{
				throw new CHttpException(400,'You can not delete this record because it is used in another table.');
			}
			else
			{
				$this->loadModel($id)->delete();
				CourseUnitTable::model()->deleteAll("course_unit_master_id = :courseId", array(':courseId'=>$id));
				UnitDetailTable::model()->deleteAll("unit_detail_course_id = :courseId", array(':courseId'=>$id));
		$this->redirect(array('admin'));

			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}

	public function actionMultiDel()
	{	
		$ids = implode(",", $_POST['chk']);
		$sql = "DELETE FROM course_master WHERE course_master_id IN (".$ids.")";
		$cmd = Yii::app()->db->createCommand($sql);
		$cmd->execute();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new CourseMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CourseMaster']))
			$model->attributes=$_GET['CourseMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CourseMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CourseMaster']))
			$model->attributes=$_GET['CourseMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CourseMaster::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='course-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
