<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Matrícula:','student_enroll_no'); ?>
		<?php echo $info->student_enroll_no;?>
	</div>

	<div class="row-column2">
		<?php echo CHtml::label('Fecha de Admisión:','student_adm_date'); ?>
		<?php if($info->student_adm_date != NULL)
		echo date('d-m-Y',strtotime($info->student_adm_date));?>
	</div>
</div>

<div class="row">
	<?php echo CHtml::label('Nombre:','name'); ?>
	<?php echo $info->title." ".$info->student_first_name." ".$info->student_last_name;?>
</div>


<div class="row">
	<div class="row-column1">
		<?php echo CHtml::label('Sexo:','student_gender'); ?>
		<?php echo $info->student_gender;?>
	</div>

	<div class="row-column3">
        <?php echo CHtml::label('Fecha de Nacimiento:','student_dob'); ?>
		<?php if($info->student_dob != NULL)
		echo date('d-m-Y',strtotime($info->student_dob));?>
	</div>
</div>

  <div class="row">
	<div class="row-left">
		<?php echo CHtml::label('Email:','student_email_id_1'); ?>
		<?php echo $info->student_email_id_1; ?>
	</div>
	<div class="row-column2">
		<?php echo CHtml::label('Teléfono:','student_mobile_no'); ?>
		<?php echo $info->student_mobile_no;?>
	</div>
  </div>

<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Grupo Sanguíneo:','student_bloodgroup'); ?>
        <?php echo $info->student_bloodgroup; ?>
	</div>

	<div class="row-column3">
        <?php echo CHtml::label('Nacionalidad:','student_transaction_nationality_id'); ?>
        <?php if($model->student_transaction_nationality_id!=null)
		echo $model->Rel_Nationality->nationality_name;
	?>
	</div>

</div>

<div class="row">
	<div class="row-column1">
        <?php echo CHtml::label('Año Académico:','student_academic_term_period_tran_id'); ?>
       <?php echo $model->Rel_student_academic_terms_period_name->academic_term_period;?>
	</div>

	<div class="row-column2">
		<?php echo CHtml::label('Semestre:','student_academic_term_name_id'); ?>

		<?php
		if(isset($model->student_academic_term_name_id)) {
		 $term = "Sem-".$model->Rel_student_academic_terms_name->academic_term_name;
		echo $term;
		}
		?>
	</div>
</div>

<div class="row">
	<div class="row-left">
        <?php echo CHtml::label('Idioma Hablado:','languages_known1'); ?>
        <?php
		$knwLang = "";
		if($lang->languages_known1)
		$knwLang =  $lang->Rel_Langs1->languages_name;
		if($lang->languages_known2)
		$knwLang .= ", ".$lang->Rel_Langs2->languages_name;
		echo $knwLang;
	?>

	</div>
</div>

  <div class="row last">
	<div class="row-column3">
		<?php echo CHtml::label('Clase:','student_transaction_course_id'); ?>
		<?php
		    echo !empty($model->student_transaction_course_id) ? $model->relCourse->course_name : 'N/A';

		?>
	</div>
</div>

