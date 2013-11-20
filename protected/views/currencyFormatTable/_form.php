<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Llenar Detalles
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-format-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_format_name'); ?>
		<?php echo $form->textField($model,'currency_format_name',array('size'=>10,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'currency_format_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_format'); ?>
		<?php echo $form->textField($model,'currency_format',array('size'=>10,'maxlength'=>10)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'currency_format'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancelar', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- form -->
