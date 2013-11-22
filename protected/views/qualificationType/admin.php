<?php
$this->breadcrumbs=array(
	'Categorías de Clases'=>array('index'),
	'Administrar',
);
?>

<h1>Administrar Categorías</h1>

<div class="portlet box blue">


 <div class="portlet-title"> Categorías
 </div>

<?php echo CHtml::link('Agregar +', array('qualificationType/create'), array('class'=>'btn green'))?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qualification-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('qualificationType/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'ID',
		'class'=>'IndexColumn',
		),

//		'qualification_type_id',
		'qualification_type_name',
/*		'qualification_type_desc',
		'qualification_type_created_by',
		'qualification_type_creation_date', */
	),
)); ?>
</div>
