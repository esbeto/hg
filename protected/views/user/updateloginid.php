<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	//$model->user_id=>array('view','id'=>$model->user_id),
	$model->user_organization_email_id=>array(),
	'Update',
);

$this->menu=array(
//	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->user_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Student Loginid  <?php //echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_formloginid', array('model'=>$model)); ?>
