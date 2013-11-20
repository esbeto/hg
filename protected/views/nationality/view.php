<?php
$this->breadcrumbs=array(
	'Nacionalidad'=>array('admin'),
	$model->nationality_name,
);
?>

<h1>Vista Nacionalidad </h1>

<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->nationality_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->nationality_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'nationality_id',
		'nationality_name',
//		'nationality_organization_id',
//		'nationality_created_by',
		array('name'=>'nationality_created_by',
			'value'=>User::model()->findByPk($model->nationality_created_by)->user_organization_email_id,
		),

		//'nationality_created_date',
		array(
                'name'=>'nationality_created_date',
                'type'=>'raw',
                'value'=>($model->nationality_created_date == 0000-00-00) ? 'No Especificado' : date_format(new DateTime($model->nationality_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->nationality_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
