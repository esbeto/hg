<?php
$this->breadcrumbs=array(
	'Año Académico'=>array('admin'),
	'Agregar',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Administrar')),
);
?>

<h1>Agregar Año Académico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
