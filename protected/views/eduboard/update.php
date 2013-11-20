<?php
$this->breadcrumbs=array(
	'Consejo de Educación'=>array('admin'),
	//$model->eduboard_name=>array('view','id'=>$model->eduboard_id),
	$model->eduboard_name=>array(),
	'Editar',
);

$this->menu=array(

	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
//	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->eduboard_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Editar Consejo de Educación <?php //echo $model->eduboard_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
