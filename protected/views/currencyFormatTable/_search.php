<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'currency_format_id'); ?>
		<?php echo $form->textField($model,'currency_format_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_format'); ?>
		<?php echo $form->textField($model,'currency_format',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->