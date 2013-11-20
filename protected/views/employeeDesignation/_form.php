<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Llenar Detalles
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-designation-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_designation_name'); ?>
		<?php echo $form->textField($model,'employee_designation_name',array('size'=>25,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_designation_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'employee_designation_level'); ?>
		<?php echo $form->textField($model,'employee_designation_level',array('size'=>5,'maxlength'=>5)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_designation_level'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

