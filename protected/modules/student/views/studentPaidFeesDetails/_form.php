<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Llenar Detalles
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-paid-fees-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_paid_amount'); ?>
		<?php echo $form->textField($model,'student_paid_amount'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_paid_amount'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- form -->

