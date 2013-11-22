<?php
$this->breadcrumbs=array(
	'Alumno'=>array('admin'),
	'Perfil',
);
?>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('updateprofiletab1' ,'id'=>$model->student_transaction_id), array('class'=>'btnupdate'));?>
</div>

<div class="portlet box green">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>
<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
	'headerTemplate'=>'<li><a href="{url}" title="{title}">{title}</a></li>',
        'tabs'=>array(
          'Perfil Personal' =>$this->renderPartial("tabs/view_tab1", array('lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
          /*'Guardian Info'=>$this->renderPartial("tabs/view_tab2", array('model' => $model, 'info'=>$info), $this), */
          'Info de Dirección'=>$this->renderPartial("tabs/view_tab4", array('address'=>$address, 'lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
	 'Récord Académico'=>$this->renderPartial("viewAcademicRecord", array('stud_qua'=>$stud_qua), $this),
	/*'Documents'=>$this->renderPartial("viewDocs", array('studentdocstrans'=>$studentdocstrans), $this), */
        ),



	'htmlOptions'=>array('class'=>'profile-tab'),
    ));
?>
<div class="profile-picture">
<?php $pic = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id)->student_photos_path;
   echo CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$pic, 'student', array('width'=>200,'height'=>200));
?>
</div>
</div>
