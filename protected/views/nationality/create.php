<?php
$this->breadcrumbs=array(
	'Nacionalidad'=>array('admin'),
	'Agregar',
);

$this->menu=array(
//	array('label'=>'List Nationality', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Agregar Nacionalidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
