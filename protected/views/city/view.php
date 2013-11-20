<?php
$this->breadcrumbs=array(
	'Ciudad'=>array('admin'),
	$model->city_name,
);
?>

<h1>Vista Ciudad </h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->city_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->city_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'city_id',
		'city_name',
		//'country_id',
		//'state_id',
//		'$data->state_id'.
               array(
		    'name'=>'state_id',
		    'value'=>State::model()->findByPk($model->state_id)->state_name,
        	),

		array(
            	    'name'=>'country_id',
            	    'value'=>Country::model()->findByPk($model->country_id)->name,
        	),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
