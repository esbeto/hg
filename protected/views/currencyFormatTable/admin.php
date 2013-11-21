<?php
$this->breadcrumbs=array(
	'Formato de Moneda'=>array('index'),
	'Administrar',
);
?>

<h1>Administrar Formatos de Moneda</h1>
<div class="portlet box blue">
 <div class="portlet-title"> Formatos de Moneda
 </div>
<?php echo CHtml::link('Agregar +', array('currencyFormatTable/create'), array('class'=>'btn green'))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'currency-format-table-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('currencyFormatTable/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'ID',
		'class'=>'IndexColumn',
		),
		'currency_format_name',
		'currency_format',
	),
)); ?>
</div>
