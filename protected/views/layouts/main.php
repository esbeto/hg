<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/rudrasoftech_favicon.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/newstyle.css" media="print,screen" />


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-latest.js"></script>



<script type="text/javascript">
$(document).ready(function() {

	$('.changeForm').click(function(){
		$(this).parent().addClass('current-active').siblings().removeClass('current-active');
		newSrc = $(this).attr('href');
		$('#content-frame').attr('src', newSrc);
		return false;
	});
});
/*
var timer = 0;
function set_interval() {
  timer = setInterval("auto_logout()", 300000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    timer = setInterval("auto_logout()", 300000);
  }
}

function auto_logout() {
  window.location = "<?php echo Yii::app()->baseUrl.'/site/logout'; ?>";
}
*/
</script>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="page-header-fixed">
<div class="header navbar navbar-inverse navbar-fixed-top">
	<div id="logo" class="navbar-inner">
	<div id="site-name">
	<?php
		$org = Organization::model()->findAll();
		echo $org[0]['organization_name'];
	?>
	</div>

		<li class="dropdown user">

		<?php $user = User::model()->findByPk(Yii::app()->user->id)->user_type;
			if($user == 'admin')
			   $username = 'admin';
			else if($user == 'student') {
			   $username = StudentInfo::model()->findByPk(StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id))->student_transaction_student_id)->student_first_name;
			}
			else  {
			  $username = EmployeeInfo::model()->findByPk(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id))->employee_transaction_employee_id)->employee_first_name;
			}

		?>
		<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
		<?php

		$checkUser = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id));

		if($checkUser) {
		    $avtar = StudentPhotos::model()->findByPk($checkUser->student_transaction_student_photos_id)->student_photos_path;
		    echo CHtml::image(Yii::app()->baseUrl.'/college_data/stud_images/'.$avtar, 'Student', array('height'=>29,'width'=>'29'));
		}
		else {
		  $checkUser = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id));
		  if($checkUser) {
		    $avtar = EmployeePhotos::model()->findByPk($checkUser->employee_transaction_emp_photos_id)->employee_photos_path;
		    echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$avtar, 'Student', array('height'=>29,'width'=>'29'));
		  }
		  else{
		    	echo '<img src="'.Yii::app()->baseUrl.'/images/no_image_icon.jpg" alt="" height=29 width=29>';
		  }
		}

		?>

		<span class="username"><?php echo $username; ?></span>
		<i class="icon-angle-down"></i>
		</a>
		<ul class="dropdown-menu" style="display:none;">
			<li class="sub-menu"><a href="<?php echo Yii::app()->baseUrl;?>/dashboard/dashboard" class="changeForm"><i class="icon-user"></i> Panel de Control</a></li>
			<!-- <li class="sub-menu"><a href="<?php echo Yii::app()->baseUrl;?>/mailbox" class="changeForm"><i class="icon-envelope"></i> Mensajes</a></li> -->
			<li><i class="icon-key"></i><?php echo CHtml::link('Salir', 'logout')?></li>
		</ul>
	</li>
    </div>

</div>

<div class="page-container">

<div class="page-sidebar nav-collapse collapse"> <!-- left sidebar start -->
<ul id="accordion" class="page-sidebar-menu">
	<?php if(Yii::app()->user->checkAccess('Configuration')) { ?>
	<i class="icon-cog"></i><li>Configuración <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Año Académico', array('/academicTermPeriod/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Semestre', array('/academicTerm/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Departamento', array('/department/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Designación', array('/employeeDesignation/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Nacionalidad', array('/nationality/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('País', array('/country/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Estado / Provincia', array('/state/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Ciudad', array('/city/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Idiomas', array('/languages/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Consejo de Educación', array('/eduboard/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Calificaciones', array('/qualification/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Estado del Alumno', array('/studentstatusmaster/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Moneda', array('/currencyFormatTable/admin'), array('class'=>'changeForm')); ?></li>

	</ul>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Employee.EmployeeTransaction.Admin')) { ?>
	<i class="icon-user"></i><li>Empleados <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Administrar Empleados', array('/employee/employeeTransaction/admin'), array('class'=>'changeForm')); ?></li>
	</ul>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('Student.StudentTransaction.Admin')) { ?>
	<i class="icon-male"></i><li>Alumnos <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Alumnos Registrados', array('/student/studentTransaction/admin'), array('class'=>'changeForm')); ?></li>
	</ul>
	<?php } ?>
	<i class="icon-user"></i><li>Clases <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Administrar Clases', array('courseMaster/admin'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Categorías de Clases', array('qualificationType/admin'), array('class'=>'changeForm')); ?></li>
	</ul>
	<i class="icon-user"></i>
	<li>Juegos <i class="icon-angle-down"></i></li>
	<ul>
		<li><?php echo CHtml::link('Lista de Juegos', array('page', 'view'=>'juegos'), array('class'=>'changeForm')); ?></li>
	</ul>
	<!--
	<i class="icon-user"></i><li>Messages <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Mail', array('/mailbox'), array('class'=>'changeForm')); ?></li>
	</ul>
	-->
	<?php if(Yii::app()->user->checkAccess('Organization.Admin')) { ?>
	<i class="icon-th"></i><li>Panel de Control <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Administrar Instituto', array('/organization/view', 'id'=>1), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Administración de Usuarios', array('/rights'), array('class'=>'changeForm')); ?></li>
	</ul>
	<?php } ?>
	<?php /* if(Yii::app()->user->checkAccess('Document')) { ?>
	<i class="icon-file-alt"></i><li>Documentos <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Categorías', array('/documentCategoryMaster/admin'), array('class'=>'changeForm')); ?></li>

	</ul>
	<?php } */ ?>
	<?php if(Yii::app()->user->checkAccess('Resetlogin')) { ?>
	<i class="icon-repeat"></i><li>Restaurar Login <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Alumno', array('/user/resetstudloginid'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Empleado', array('/user/resetemploginid'), array('class'=>'changeForm')); ?></li>
	</ul>
	<?php } ?>
	<?php /* if(Yii::app()->user->checkAccess('Report')) { ?>
	<i class="icon-bar-chart"></i><li>Reportes <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Alumno', array('/report/StudInfoReport'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Empleado', array('/report/EmployeeInfoReport'), array('class'=>'changeForm')); ?></li>
	</ul>
	<?php } */ ?>
	<?php if(Yii::app()->user->checkAccess('Resetpassword')) { ?>
	<i class="icon-user-md"></i><li>Restaurar Contraseña <i class="icon-angle-down"></i> </li>
	<ul>
		<li><?php echo CHtml::link('Alumno', array('/user/resetstudpassword'), array('class'=>'changeForm')); ?></li>
		<li><?php echo CHtml::link('Empleado', array('/user/resetemppassword'), array('class'=>'changeForm')); ?></li>

	</ul>
	<?php } ?>
	<?php if(Yii::app()->user->checkAccess('LoginUser.login_user')) { ?>
	<i class="icon-h-sign"></i><li><?php echo CHtml::link('Historial de Acceso', array('/loginUser/login_user'), array('class'=>'changeForm', 'style'=>'padding:0; color: #FFF;')); ?> </li><ul><li></li></ul>
	<?php } ?>
	<?php /* if(Yii::app()->user->checkAccess('Student.StudentPaidFeesDetails.admin')) { ?>
	<i class="icon-inr"></i><li><?php echo CHtml::link('Cuotas', array('/student/studentPaidFeesDetails/admin'), array('class'=>'changeForm', 'style'=>'padding:0; color: #FFF;')); ?> </li><ul><li></li></ul>
	<?php } */ ?>

</ul>

</div> <!-- Left sidebar complete -->

<div class="page-content">
<iframe name="content-frame" id="content-frame" frameborder=0 src="<?php echo Yii::app()->baseUrl; ?>/dashboard/dashboard" width=900 scrolling=auto onload="scroll(0,0);"> </iframe>
<?php //echo $content; ?>
</div><!-- page -->
</div><!-- content -->
<div class="footer">
	© 2013 FIME UANL
</div>

<script>
$("#accordion > li").click(function(){
$(this).addClass('active').siblings().removeClass('active');
$("li.active > span:first").addClass("open").siblings().removeClass('active');
$(".selected").remove();
$(this).append( "<span class='selected'></span>" );
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

//$('#accordion > ul:eq(0)').show();

</script>
