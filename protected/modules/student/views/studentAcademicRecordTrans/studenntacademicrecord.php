<?php
$this->breadcrumbs=array(
	'Lista de Alumnos'=>array('update', 'id'=>$_REQUEST['id']),
	'Récord Académico',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Récord Académico
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Perfil Personal', array('updateprofiletab1', 'id'=>$_REQUEST['id'])); ?></li>
  <!--
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
-->
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Info de Dirección', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>

<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Récord Académico', array('studentacademicrecord', 'id'=>$_REQUEST['id'])); ?></li>
   <!--
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Document', array('Studentdocs', 'id'=>$_REQUEST['id'])); ?></li>
-->
</ul>

<div class="ui-tabs-panel form">

<?php
    echo CHtml::link('Agregar +',array('studentAcademicRecordTrans/create', 'id'=>$_REQUEST['id']),array('class'=>'btn green'));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-academic-record-trans-grid',
	'dataProvider'=>$stud_qua->mysearch(),
	//'filter'=>$model,
	'enableSorting'=>false,
	'nullDisplay'=>'N/A',
	'columns'=>array(

		array(
		'header'=>'ID',
		'class'=>'IndexColumn',
		),

		array('name' => 'student_academic_record_trans_qualification_id',
	              'value' => '$data->Rel_student_qualification->qualification_name',
                     ),
		array('name' => 'student_academic_record_trans_eduboard_id',
			'value' => '$data->Rel_student_eduboard->eduboard_name',
                     ),
		array('name' => 'student_academic_record_trans_record_trans_year_id',
			'value' => '$data->student_academic_record_trans_record_trans_year_id',
                     ),
		array('name' => 'theory_mark_obtained',
			'value' => '$data->theory_mark_obtained',
                     ),
		array('name' => 'theory_mark_max',
			'value' => '$data->theory_mark_max',
                     ),
		array('name' => 'theory_percentage',
			'value' => '$data->theory_percentage',
                     ),
		array('name' => 'practical_mark_obtained',
			'value' => '$data->practical_mark_obtained',
                     ),
		array('name' => 'practical_mark_max',
			'value' => '$data->practical_mark_max',
                     ),
		array('name' => 'practical_percentage',
			'value' => '$data->practical_percentage',
                     ),


	),
	'pager'=>array(
		'class'=>'AjaxList',
		'maxButtonCount'=>$stud_qua->count(),
		'header'=>''
	    ),

));

?>
</div>
</div>
</div>

