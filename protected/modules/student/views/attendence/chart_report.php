<script>
$(document).ready(function(){
    $('select').change(function() {
        $(this).parents('form').submit();
    });
});
</script>
<?php
$this->breadcrumbs=array(
	'Chart Report',
);
/*
$this->menu=array(
	array('label'=>'', 'url'=>array('studentwise_report'),'linkOptions'=>array('class'=>'Create','title'=>'Studentwise Report')),
);*/
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendence-form',
	'enableAjaxValidation'=>true,

)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'sem_id'); ?>
		<?php echo $form->dropDownList($model,'sem_id',AcademicTermPeriod::items(), array('empty' => 'Select Year','tabindex'=>1)); ?>

	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->



