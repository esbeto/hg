<h1>Vista de Clase </h1>
<div class="operation">
<?php echo CHtml::link('Regresar', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Editar', array('update' ,'id'=>$model->course_master_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Eliminar', array('delete' ,'id'=>$model->course_master_id), array('class'=>'btndelete','onclick'=>"return confirm('Eliminar el registro?');"));?>
</div>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Ver Detalles
 </div>

<table id="yw0" class="custom-view">
  <tbody>
    <tr class="odd">
     <td class="col2">
         <span class="detail-label">Clase:</span>
         <span class="detail-value"><?php echo $model->course_name; ?></span>
     </td>
     <td class="col2">
         <span class="detail-label">Categoría:</span>
         <span class="detail-value"><?php echo $model->relCat->qualification_type_name; ?></span>
     </td>
    </tr>
    <tr class="even">
      <td class="col2">
         <span class="detail-label">Nivel:</span>
         <span class="detail-value"><?php echo $model->course_level; ?></span>
      </td>
      <td class="col2">
         <span class="detail-label">Horas Requeridas:</span>
         <span class="detail-value"><?php echo $model->course_completion_hours; ?></span>
       </td>
     </tr>
     <tr class="odd">
        <td class="col2">
           <span class="detail-label">Clave:</span>
           <span class="detail-value"><?php echo $model->course_code; ?></span>
        </td>
        <td class="col2">
           <span class="detail-label">Costo del Curso:</span>
           <span class="detail-value"><?php echo $model->concated; ?></span></td>
    </tr>
    <tr class="even">
       <td class="col2 detail-area">
          <span class="detail-label">Descripción:</span>
          <span class="detail-value"><?php echo $model->course_desc; ?></span>
        </td>
</tr></tbody></table>


</div>

<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
          'Unidades del Curso' =>$this->renderPartial("application.views.courseUnitTable.admin", array('unit'=>$unit), $this),
         // 'Course Lessons' =>$this->renderPartial("application.views.unitDetailTable.admin", array('lesson'=>$lesson), $this),

        ),
        'options'=>array(
            'collapsible'=>true,
        ),
	'htmlOptions'=>array('class'=>'profile-tab', 'style'=>'float: left; width: 700px;'),
    ));
?>

