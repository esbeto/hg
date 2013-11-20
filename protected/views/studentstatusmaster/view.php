<?php
$this->breadcrumbs=array(
	'Student Status'=>array('admin'),
	$model->status_name,
);
?>

<h1>View Student Status <?php //echo $model->id; ?></h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'status_name',

		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		//'creation_date',
		array(
                'name'=>'creation_date',
                'type'=>'raw',
                'value'=>($model->creation_date == 0000-00-00) ? 'No Especificado' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization',
			'value'=>Organization::model()->findByPk($model->organization_id)->organization_name,
			'filter' => false,
		),*/
		//'organization_id',
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
