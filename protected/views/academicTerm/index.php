<?php
$this->breadcrumbs=array(
	'Término Académico',
);

$this->menu=array(
//	array('label'=>'Create AcademicTerm', 'url'=>array('create')),
	array('label'=>'Manage AcademicTerm', 'url'=>array('admin')),
);
?>

<h1>Término Académico</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
