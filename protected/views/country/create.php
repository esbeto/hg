<?php
$this->breadcrumbs=array(
	'País'=>array('admin'),
	'Agregar',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar País</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
