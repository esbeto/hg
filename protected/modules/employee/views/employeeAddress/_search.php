<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'employee_address_id'); ?>
		<?php echo $form->textField($model,'employee_address_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_line1'); ?>
		<?php echo $form->textField($model,'employee_address_c_line1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_line2'); ?>
		<?php echo $form->textField($model,'employee_address_c_line2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_city'); ?>
		<?php echo $form->textField($model,'employee_address_c_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_pincode'); ?>
		<?php echo $form->textField($model,'employee_address_c_pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_state'); ?>
		<?php echo $form->textField($model,'employee_address_c_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_c_country'); ?>
		<?php echo $form->textField($model,'employee_address_c_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_line1'); ?>
		<?php echo $form->textField($model,'employee_address_p_line1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_line2'); ?>
		<?php echo $form->textField($model,'employee_address_p_line2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_city'); ?>
		<?php echo $form->textField($model,'employee_address_p_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_pincode'); ?>
		<?php echo $form->textField($model,'employee_address_p_pincode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_state'); ?>
		<?php echo $form->textField($model,'employee_address_p_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_p_country'); ?>
		<?php echo $form->textField($model,'employee_address_p_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_phone'); ?>
		<?php echo $form->textField($model,'employee_address_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_address_mobile'); ?>
		<?php echo $form->textField($model,'employee_address_mobile'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
