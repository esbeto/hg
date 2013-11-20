<?php
$this->breadcrumbs=array(
	'Ciudad'=>array('admin'),
	'Agregar',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Ciudad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
