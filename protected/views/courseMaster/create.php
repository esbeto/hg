<?php
$this->breadcrumbs=array(
	'Clases'=>array('index'),
	'Agregar',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Clase</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
