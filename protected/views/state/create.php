<?php
$this->breadcrumbs=array(
	'Estado'=>array('admin'),
	'Agregar',
);

$this->menu=array(
	//array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Estado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
