<?php
$this->breadcrumbs=array(
	'Formato de Moneda'=>array('admin'),
	$model->currency_format_name,
);

?>
<h1>Vista Formato de Moneda</h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->currency_format_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->currency_format_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>


<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'currency_format_name',
		'currency_format',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
