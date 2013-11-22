<?php
$this->breadcrumbs=array(
	'Récord Académico'=>array('/student/studentTransaction/studentacademicrecord', 'id'=>$_REQUEST['id']),
	'Agregar',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
