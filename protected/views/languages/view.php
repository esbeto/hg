<?php
$this->breadcrumbs=array(
	'Idiomas'=>array('admin'),
	$model->languages_name,
);

?>

<h1>Vista Idioma  <?php //echo $model->languages_id; ?></h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->languages_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->languages_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'languages_id',
		'languages_name',
		//'languages_organization_id',
		//'languages_created_by',
		array('name'=>'languages_created_by',
			'value'=>User::model()->findByPk($model->languages_created_by)->user_organization_email_id,
		),
		//'languages_created_date',
		array(
                'name'=>'languages_created_date',
                'type'=>'raw',
                'value'=>($model->languages_created_date == 0000-00-00) ? 'No Especificado' : date_format(new DateTime($model->languages_created_date), 'd-m-Y'),
	        ),
		/*
		array('name'=>'Organization:',
			'value'=>Organization::model()->findByPk($model->languages_organization_id)->organization_name,
			'filter' => false,

		),*/
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
