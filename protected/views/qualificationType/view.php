<?php
$this->breadcrumbs=array(
	'Course Category'=>array('admin'),
	$model->qualification_type_name,
);

?>

<h1>View Course Category <?php //echo $model->qualification_type_id; ?></h1>

<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->qualification_type_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->qualification_type_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'qualification_type_name',
		array(
		'name'=>'qualification_type_desc',
		'type'=>'raw',
		),
		array(
		  'name'=>'qualification_type_created_by',
		  'value'=>User::model()->findByPk($model->qualification_type_created_by)->user_organization_email_id,
		),
		'qualification_type_creation_date',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
