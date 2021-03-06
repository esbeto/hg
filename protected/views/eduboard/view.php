<?php
$this->breadcrumbs=array(
	'Consejo de Educación'=>array('admin'),
	$model->eduboard_name,
);

?>

<h1>Vista Consejo de Educación <?php //echo $model->eduboard_id; ?></h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->eduboard_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->eduboard_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'eduboard_id',
		'eduboard_name',
//		'eduboard_organization_id',
//		'eduboard_created_by',
		array('name'=>'eduboard_created_by',
			'value'=>User::model()->findByPk($model->eduboard_created_by)->user_organization_email_id,
		),

		//'eduboard_created_date',
		array(
                'name'=>'eduboard_created_date',
                'type'=>'raw',
                'value'=>($model->eduboard_created_date == 0000-00-00) ? 'No Especificado' : date_format(new DateTime($model->eduboard_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->eduboard_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
