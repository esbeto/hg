<?php
$this->breadcrumbs=array(
	'Ciudad'=>array('admin'),
	'Administrar',
);

?>

<h1>Administrar Ciudades</h1>

<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/CityExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/CityExportToExcel'), array('class'=>'btnblue'));?>
</div>

<div class="portlet box blue">
 <div class="portlet-title"> Ciudad
 </div>

<?php echo CHtml::link('Agregar +', array('city/create'), array('class'=>'btn green'))?>


<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'city-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('city/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'ID',
		'class'=>'IndexColumn',
		),
		'city_name',
	    	array(
		    'name'=>'state_id',
		    'value'=>'State::item($data->state_id)',
	    	    'filter'=>  State::items(),
		),
	),

	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>
</div>
