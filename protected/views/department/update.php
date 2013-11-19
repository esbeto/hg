<?php
$this->breadcrumbs=array(
    'Departamentos'=>array('admin'),
	//$model->department_name=>array('view','id'=>$model->department_id),
	$model->department_name=>array(),
	'Editar',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Crear')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->department_id),'linkOptions'=>array('class'=>'View','title'=>'Ver')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Administrar')),
);
?>

<h1>Editar Departamento  <?php //echo $model->department_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
