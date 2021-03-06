<?php
$this->breadcrumbs=array(
	'Document Category'=>array('admin'),
	$model->doc_category_name,
);
?>

<h1>View Document Category <?php //echo $model->doc_category_id; ?></h1>

<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->doc_category_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->doc_category_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'doc_category_id',
		'doc_category_name',
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array('name'=>'creation_date',
			'value'=>date_format(new DateTime($model->creation_date), 'd-m-Y'),
		),

	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
</div>
