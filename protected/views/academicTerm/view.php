<?php
$this->breadcrumbs=array(
	'Semestre'=>array('admin'),
	$model->academic_term_name,
);
?>

<h1>Vista Semestre <?php //echo $model->academic_term_id; ?></h1>

<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->academic_term_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->academic_term_id), array('class'=>'btndelete','onclick'=>"return confirm('Desea eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('application.extensions.DetailView4Col', array(
	'data'=>$model,
	'attributes'=>array(
		//'academic_term_id',
		'academic_term_name',
		array(
                'name'=>'academic_term_start_date',
                'type'=>'raw',
                'value'=>($model->academic_term_start_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_term_start_date), 'd-m-Y'),
	        ),
		array(
                'name'=>'academic_term_end_date',
                'type'=>'raw',
                'value'=>($model->academic_term_end_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->academic_term_end_date), 'd-m-Y'),
	        ),
//		'academic_term_period_id',
		array('name'=>'academic_term_period_id',
			'value'=>AcademicTermPeriod::model()->findByPk($model->academic_term_period_id)->academic_term_period,
		),
		array(
			'name'=>'current_sem',
			'value'=>($model->current_sem == 1) ?  "Sí" : "No",
		),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
