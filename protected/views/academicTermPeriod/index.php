<?php
$this->breadcrumbs=array(
	'Períodos de Término Académico',
);

$this->menu=array(
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Crear')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Administrar')),
);
?>

<h1>Períodos de Término Académico</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
