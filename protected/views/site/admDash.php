<?php
$model = CourseMaster::model()->findAll(array(
    "order" => "course_master_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box blue" style="width: 50%; clear: left; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Cursos Publicados
 </div>
<?php if(!empty($model)) { ?>
<table class="course-details">
<tr>
<th>Nombre</th>
<th>Nivel</th>
<th>Clave</th>
<th>Costo</th>
</tr>
<?php
  foreach($model as $list) {
	echo '<tr>';
	echo '<td>'.$list['course_name'].'</td>';
	echo '<td>'.$list['course_level'].'</td>';
	echo '<td>'.$list['course_code'].'</td>';
	echo '<td>'.$list['course_cost'].'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">No course availabel</span>';
?>
</div>

<?php
$recStud = StudentTransaction::model()->findAll(array(
    "order" => "student_transaction_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box green" style="width: 47%; margin-left: 25px; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Último Alumno Registrado
 </div>
<?php if(!empty($recStud)) { ?>
<table class="course-details">
<tr>
<th style="width:140px;">Nombre</th>
<th style="width:140px;">Clase</th>
<th style="width:140px;">Fecha de Admisión</th>
</tr>
<?php
  foreach($recStud as $list) {
	$info = StudentInfo::model()->findByPk($list['student_transaction_student_id']);
	echo '<tr>';
	echo '<td>'.$info->student_first_name.'</td>';
	echo '<td>'.CourseMaster::model()->findByPk($list['student_transaction_course_id'])->course_name.'</td>';
	echo '<td>'.$info->student_adm_date.'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">Student not Exist</span>';
?>
</div>

<?php
$studCount = array();
$courses = Yii::app()->db->createCommand()
    ->select('count(*) as studCount, student_transaction_course_id, course_name ')
    ->from('student_transaction')
    ->join('course_master ','course_master_id=student_transaction_course_id')
    ->group('student_transaction_course_id')
    ->queryAll();
foreach($courses as $course)
 $studCount[] = array($course['course_name'], (int)$course['studCount']);

?>
<div class="portlet box green" style="width: 50%; margin-top: 20px; overflow: hidden;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Alumnos por Materias
 </div>
<?php $this->Widget('application.extensions.highcharts.HighchartsWidget',
array(
'options'=>array(
   'title'=>array('text'=>'Alumno'),
   'colors'=> array('#F64A16', '#0ECDFD', '#FFF000'),
'credits' => array('enabled' => true),
'exporting' => array('enabled' => true),
'plotOptions'=> array(
	'pie'=> array(
		'allowPointSelect'=>true,'cursor'=>'pointer',
		'dataLabels'=>array('enabled'=>false),
		'showInLegend'=>true
         )
),
'series' => array(
	array(
		'type'=>'pie',                                                             			'name'=>'Enrolled Students',
                'data' => $studCount,
	)
      )
  )
 )
);
?>
</div>
<?php

$stud = Yii::app()->db->createCommand()
    ->select('count(*) as studCount ')
    ->from('student_transaction')
    ->queryRow();

$paidStud = Yii::app()->db->createCommand()
    ->select('count(distinct(student_paid_student_id)) as paidCount ')
    ->from('student_paid_fees_details')
    ->queryRow();
$unPaid  = $stud['studCount'] - $paidStud['paidCount'];
?>

<div class="portlet box blue" style="margin-top: 20px; overflow: hidden; width: 47%; margin-left: 25px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Historial de Pagos
 </div>
<?php
$this->Widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('type'=>'column'),
       'colors'=> array('#C7E718', '#DB901B'),
      'title' => array('text' => 'Detalles'),
 	'xAxis' => array(
    	'categories'=> array('Pagado / Sin Pagar')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Pagado')
      ),
      'series' => array(
         array('name' => 'Pagado', 'data' => array((int)$paidStud['paidCount'])),
         array('name' => 'Sin Pagar', 'data' => array((int)$unPaid))
      )
   )
));
?>

</div>
