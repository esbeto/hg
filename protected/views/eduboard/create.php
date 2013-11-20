<?php
$this->breadcrumbs=array(
	'Consejo de Educación'=>array('admin'),
	'Agregar',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Consejo de Educación</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
