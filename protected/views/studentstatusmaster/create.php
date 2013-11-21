<?php
$this->breadcrumbs=array(
	'Estado del Alumno'=>array('admin'),
	'Agregar',
);

$this->menu=array(
	//array('label'=>'List Studentstatusmaster', 'url'=>array('index')),
	//array('label'=>'Manage Studentstatusmaster', 'url'=>array('admin')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Estado de Alumno</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
