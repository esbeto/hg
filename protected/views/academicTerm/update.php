<?php
$this->breadcrumbs=array(
	'Semestre'=>array('index'),
	//$model->academic_term_name=>array('view','id'=>$model->academic_term_id),
	$model->academic_term_name=>array(),
	'Editar',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Agregar')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->academic_term_id),'linkOptions'=>array('class'=>'View','title'=>'Ver')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Administrar')),
);
?>

<h1>Editar Semestre <?php //echo $model->academic_term_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
