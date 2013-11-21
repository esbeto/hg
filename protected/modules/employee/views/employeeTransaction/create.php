<?php
$this->breadcrumbs=array(
	'Empleado'=>array('admin'),
	'Agregar',
);
?>

<h1> Agregar Empleado </h1>

<?php echo $this->renderPartial('create_form', array('model'=>$model,'info'=>$info,'user'=>$user)); ?>
