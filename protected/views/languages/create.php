<?php
$this->breadcrumbs=array(
	'Idiomas'=>array('admin'),
	'Agregar',
);

$this->menu=array(
	//array('label'=>'List Languages', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Idioma</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
