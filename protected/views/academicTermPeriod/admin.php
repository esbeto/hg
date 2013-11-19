<?php
$this->breadcrumbs=array(
	'Año Académico'=>array('admin'),
	'Administrar',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('academic-term-period-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Año Académico</h1>

<div class="operation">
<?php echo CHtml::link('PDF', array('exportToPDFExcel/academicTermPeriodExportToPdf'), array('class'=>'btnyellow', 'target'=>'_blank'));?>
<?php echo CHtml::link('Excel', array('exportToPDFExcel/academicTermPeriodExportToExcel'), array('class'=>'btnblue'));?>
</div>

<div class="portlet box blue">

 <div class="portlet-title"> Año Académico
 </div>

<?php echo CHtml::link('Agregar +', array('academicTermPeriod/create'), array('class'=>'btn green'))?>

<?php
$dataProvider = $model->search();
if(Yii::app()->user->getState("pageSize",@$_GET["pageSize"]))
$pageSize = Yii::app()->user->getState("pageSize",@$_GET["pageSize"]);
else
$pageSize = Yii::app()->params['pageSize'];
$dataProvider->getPagination()->setPageSize($pageSize);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'academic-term-period-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('academicTermPeriod/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",

	'columns'=>array(
		array(
		'header'=>'ID',
		'class'=>'IndexColumn',
		),

		'academic_term_period',

	),
	'pager'=>array(
		'class'=>'AjaxList',
		//'maxButtonCount'=>25,
		'maxButtonCount'=>$model->count(),
		'header'=>''
	    ),
)); ?>

</div>
