<?php
$this->breadcrumbs=array(
	'Formato de Moneda'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Formato de Moneda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
