<?php
$this->breadcrumbs=array(
	'Semestre'=>array('admin'),
	'Agregar',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Administrar')),
);
?>

<h1>Agregar Semestre</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
