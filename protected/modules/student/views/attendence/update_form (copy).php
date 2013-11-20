
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('not-select-attendece'); ?>
	</div>


	<!--<div class="row">
		<?php echo $form->labelEx($model,'st_id'); ?>
		<?php echo $form->textField($model,'st_id'); ?>
		<?php echo $form->error($model,'st_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attendence'); ?>
		<?php echo $form->textField($model,'attendence',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'attendence'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'shift_id'); ?>
		<?php //echo $form->textField($model,'shift_id'); ?>
		<?php //echo $form->dropDownList($model,'shift_id', CHtml::listData(Shift::model()->findAll(), 'shift_id', 'shift_type'));?>
		<?php echo $form->dropDownList($model,'shift_id',Shift::items(), array('empty' => '---------------Select-------------','tabindex'=>1)); ?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'shift_id'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'sem_id'); ?>
		<?php //echo $form->textField($model,'sem_id'); ?>
		<?php //echo $form->dropDownList($model,'sem_id', CHtml::listData(AcademicTermPeriod::model()->findAll(), 'academic_terms_period_id', 'academic_terms_period_name'));?>
		<?php echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(), array('empty' => '---------------Select-------------','tabindex'=>2)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_id'); ?>
	</div>
-->




	<div class="row">
	<div>
        <?php echo $form->labelEx($model,'sem_id'); ?>
        <?php //echo $form->dropDownList($model,'student_academic_term_period_tran_id',AcademicTermPeriod::items(), array('empty' => '-----------Select---------','tabindex'=>17)); ?>
	<?php
			echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(),
			array(
			'prompt' => '---------------Select-------------','tabindex'=>21,
			'ajax' => array(
			'type'=>'POST',
			'url'=>CController::createUrl('Attendence/getItemName'),
			'update'=>'#Attendence_sem_name_id', //selector to update

			)));

			?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'sem_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sem_name_id'); ?>
	        <?php //echo $form->dropDownList($model,'student_academic_term_name_id',array()); ?>
		<?php

			if(isset($model->sem_name_id))
				echo $form->dropDownList($model,'sem_name_id', CHtml::listData(AcademicTerm::model()->findAll(array('condition'=>'academic_term_id='.$model->sem_name_id)), 'academic_term_id', 'academic_term_name'));
			else
				echo $form->dropDownList($model,'sem_name_id',array('prompt' => '---------------Select-------------'),array('tabindex'=>22));
		?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>


    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'branch_id'); ?>
		<?php //echo $form->textField($model,'branch_id'); ?>
		<?php //echo $form->dropDownList($model,'branch_id', CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'));?>
		<?php echo $form->dropDownList($model,'branch_id',Branch::items(), array('empty' => '---------------Select-------------','tabindex'=>3)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'div_id'); ?>
		<?php //echo $form->textField($model,'div_id'); ?>
		<?php //echo $form->dropDownList($model,'div_id', CHtml::listData(Division::model()->findAll(), 'division_id', 'division_name'));?>
		<?php echo $form->dropDownList($model,'div_id',Division::items(), array('empty' => '---------------Select-------------','tabindex'=>4)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'div_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_id'); ?>
		<?php //echo $form->textField($model,'sub_id'); ?>
		<?php //echo $form->dropDownList($model,'sub_id', CHtml::listData(SubjectMaster::model()->findAll(), 'subject_master_id', 'subject_master_name'));?>
		<?php echo $form->dropDownList($model,'sub_id',SubjectMaster::items(), array('empty' => '---------------Select-------------','tabindex'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sub_id'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'batch_id'); ?>
        <?php //echo $form->textField($model,'batch_id'); ?>
        <?php //echo $form->dropDownList($model,'batch_id', CHtml::listData(Batch::model()->findAll(), 'batch_id', 'batch_name'));?>
        <?php echo $form->dropDownList($model,'batch_id',Batch::items(), array('empty' => '---------------Select-------------','tabindex'=>19)); ?><span class="status">&nbsp;</span>
        <?php echo $form->error($model,'batch_id'); ?>
    </div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'timetable_id'); ?>
		<?php echo $form->textField($model,'timetable_id'); ?>
		<?php echo $form->error($model,'timetable_id'); ?>
	</div> -->
<?php // var_dump($row1); ?>
	  <div class="row">
	  <?php
		$date = date('Y/m/d');
		echo $form->labelEx($model,'attendence_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',
		    array(
			'model'=>$model,
			'attribute'=>'attendence_date',
			'language' => 'en',

			'options' => array(
			    'dateFormat'=>'yy-mm-dd',
			    'changeMonth' => 'true',
			    'changeYear' => 'true',
			    'duration'=>'fast',
			    'showAnim' =>'slide',
			),
			'htmlOptions'=>array('tabindex'=>4,
			'style'=>'height:18px;
			    padding-left: 4px;width:168px;',
			'value'=> date('Y-m-d'),

			)
		    )
		);

	?>
	<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'attendence_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::button('Search', array('class'=>'submit','submit' => array('updatecreate'))); ?>
	</div>

<?php $this->endWidget(); ?>

<?php if(!empty($row1)) { ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>


<?php
			$count = 0;
			$count = count($row1);

			for($i=0;$i<count($row1);$i++)
			{
			   //$stud_id = $row1[$i]['st_id'];
			     $attendence = $row1[$i]['attendence'];
			     $date = $row1[$i]['attendence_date'];

			   $name_lable = StudentInfo::model()->findByPk($row1[$i]['st_id'])->student_first_name;
			   $branch_name = Branch::model()->findByPk($row1[$i]['branch_id'])->branch_name;
			   $academic_name = AcademicTerm::model()->findByPk($row1[$i]['sem_name_id'])->academic_term_name;
			   $academic_term = AcademicTermPeriod::model()->findByPk($row1[$i]['sem_id'])->academic_term_period;
			   $subject_name = SubjectMaster::model()->findByPk($row1[$i]['sub_id'])->subject_master_name;
//			   $attendence = model()->attendence;

//			echo $name_lable;
//			echo $branch_name;
//			echo $academic_name;
//			echo $academic_term;
//			echo $subject_name;
//			echo $attendence;
//			echo $date;


?>
		<div class="row">
			<?php echo $form->labelEx($model,$name_lable); ?>		   				<?php echo $form->labelEx($model,$branch_name); ?>
			<?php echo $form->labelEx($model,$academic_name); ?>
			<?php echo $form->labelEx($model,$academic_term); ?>
			<?php echo $form->labelEx($model,$subject_name); ?>
			<?php echo $form->labelEx($model,$attendence); ?>
			<?php echo $form->labelEx($model,$date); ?>
			<?php //echo $form->checkBox($model, 'st_id[]', array('value'=>$stud_id, 'uncheckValue'=>null,'checked'=>'checked')); ?>
                        <?php //echo CHtml::activeCheckBox($model,'stud_id[]'.$i,array('checked'=>false,'value'=>$stud_id,'uncheckValue' => null)); ?>
			<?php echo $form->error($model,'stud_id'); ?>
		</div>

<?php
}

?>
<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::button('save', array('class'=>'submit','submit' => array('updatesave'))); ?>
	</div>
<?php $this->endWidget(); ?>

</div>

<?php } ?>
